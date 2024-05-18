

<?php

require_once('C:/xampp/htdocs/Projet-Hawess/config.php');
 include "C:/xampp/htdocs/Projet-Hawess/model/response.php"; 
 
 include "C:/xampp/htdocs/Projet-Hawess/view/back/template/mailService.php"; 


class responseC{
function addResponse($response) {
    $sql = "INSERT INTO response (id_reclamation, message, context, timestamp)
            VALUES (:id_reclamation, :message, :context, :timestamp)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'id_reclamation' => $response->getIdReclamation(),
            'message' => $response->getMessage(),
            'context' => $response->getContext(),
            'timestamp' => $response->getTimestamp()
        ]);

        $userEmail = $this->getUserEmail($response->getIdReclamation());

        // If user email found, send email
        if ($userEmail) {
            $emailService = new EmailService();
            $emailService->sendEmail($userEmail, $response->getContext(), $response->getMessage());
        }

    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
public function updateReclamationStatus($reclamationId) {
    
    $sql = "UPDATE reclamation SET statut = 1 WHERE id_reclamation = :reclamationId";
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->bindParam(':reclamationId', $reclamationId);
    $query->execute();
}
private function getUserEmail($reclamationId) {
    $sql = "SELECT u.email
            FROM reclamation r
            JOIN user u ON r.client = u.id
            WHERE r.id_reclamation = :reclamationId";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['reclamationId' => $reclamationId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['email'])) {
            return $result['email'];
        }
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
    return null;
}
public function getResponsesByReclamationId($reclamationId) {
    $sql = "SELECT * FROM response WHERE id_reclamation = :reclamationId";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['reclamationId' => $reclamationId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        die('Error: ' . $e->getMessage());
    }
    return [];
}


}