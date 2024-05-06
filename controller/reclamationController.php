<?php
 require_once "C:/xampp/htdocs/Projet-Hawess-forum/config.php";
 include "C:/xampp/htdocs/Projet-Hawess-forum/model/Reclamation.php"; 

class reclamationC{

    // function afficherReclamation()
    // {
    //   $sql = " SELECT * FROM reclamation ORDER BY client ASC";
    //   $db = config::getConnexion();
    //   try {
    //     $liste= $db->query($sql);
    //     return $liste;
    //   } catch(Exception $e) {
    //       die('Erreur: ' .$e->getMessage());
    //   }
    // }
	function afficherReclamation($page, $perPage)
	{
		$offset = ($page - 1) * $perPage;
		$sql = "SELECT * FROM reclamation ORDER BY client ASC LIMIT $perPage OFFSET $offset";
		$countSql = "SELECT COUNT(*) AS total FROM reclamation"; // Query to count total reclamations
		$db = config::getConnexion();
		try {
			// Execute query to fetch reclamations
			$liste = $db->query($sql);
			
			// Execute query to count total reclamations
			$countResult = $db->query($countSql);
			$totalReclamations = $countResult->fetch(PDO::FETCH_ASSOC)['total'];
			
			// Return an array containing both reclamations and total count
			return array('reclamations' => $liste, 'totalReclamations' => $totalReclamations);
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
    
	function modifierReclamation($id,$statut)
    {
        $sql="update reclamation set  statut='$statut' where id_reclamation='$id'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajoutReclamation($reclamation) {
        $sql = "INSERT INTO reclamation (message, sujet, statut, client, file)
                VALUES (:message, :sujet, :statut, :client, :file)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'message' => $reclamation->getMessage(),
                'sujet' => $reclamation->getSujet(),
                'statut' => $reclamation->getStatut(),
                'client' => $reclamation->getClient(),
                'file' => $reclamation->getFile() // Assuming the file path is passed here
            ]);
        } catch(Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerRelamation($id_reclamation){
			$sql="DELETE FROM reclamation WHERE id_reclamation= :id_reclamation";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_reclamation',$id_reclamation);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
    function modifierRecamation($reclamation,$id_reclamation){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						message = :message,
						sujet = :sujet, 
						statut = :statut,
						client = :client
						
					WHERE id_reclamation = :id_reclamationt'
				);
				$query->execute([
					'message' => $reclamation->getMessage(),
					'sujet' => $reclamation->getSujet(),
					'statut' => $reclamation->getStatut(),
					'client' => $reclamation->getClient(),
					     'id_reclamation' => $id_reclamation
                  
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		

		function recupererReclamation($id_reclamation){
			$sql="SELECT * from reclamation where	id_reclamation=$id_reclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererReclamation1($id_reclamation){
			$sql="SELECT * from reclamation where id_reclamation=$id_reclamation";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$reclamation = $query->fetch(PDO::FETCH_OBJ);
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		public function getReclamationCountByStatus() {
			$db = config::getConnexion();
			try {
				// Query to count reclamations by status
				$sql = "SELECT statut, COUNT(*) as count FROM reclamation GROUP BY statut";
				$stmt = $db->prepare($sql);
				$stmt->execute();
				// Fetch the result as an associative array
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as &$item) {
					$item['statut'] = ($item['statut'] == 1) ? 'En cour de traitement' : 'En attente';
				}
				return $result;
			} catch(PDOException $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}

		function afficherReclamationByClientIdAndStatus($clientId)
{
    $sql = "SELECT * FROM reclamation WHERE client = :client  ORDER BY client ASC";
    $db = config::getConnexion();
    try {
        // Prepare and execute query to fetch reclamations
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':client', $clientId, PDO::PARAM_INT);
        
        $stmt->execute();
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Return the list of reclamations
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}
	
	
}

  