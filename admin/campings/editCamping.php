<?php
require('../../controllers/CampingController.php');

$campingC = new CampingController();
if( isset($_POST['idCamping']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['adresse']) && isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['place']) && isset($_POST['prix']) && isset($_POST['image'])){
    $camping = new Camping($_POST['titre'],$_POST['description'],$_POST['adresse'],$_POST['date_debut'],$_POST['date_fin'],$_POST['prix'],$_POST['place'],$_POST['image']);
    $campingC->updateCamping($_POST['idCamping'],$camping);
    header('Location: campingBack.php');
}
else if(isset($_GET['id']))
$camping = $campingC->getCamping($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HAWESS</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        
        <ul class="nav">
          
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="campingBack.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Liste des campings</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Campings </h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Modifier un camping</h4>
                    <form id="myForm" class="forms-sample" action="editCamping.php" method="post">
                    <input hidden type="text" class="form-control" name="idCamping" value="<?php echo $camping['idCamping']; ?>">
                      <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" value="<?php echo $camping['titre']; ?>">
                        <span id="errorTitre"></span>
                      </div>
                      <div class="form-group">
                        <label for="Description">Descrition</label>
                        <textarea class="form-control" id="description" name="description" rows="4"><?php echo $camping['description']; ?></textarea>
                        <span id="errorDescription"></span>
                      </div>
                      <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?php echo $camping['adresse']; ?>">
                        <span id="errorAdresse"></span>
                      </div>
                      <div class="form-group">
                        <label for="date_debut">Date Debut</label>
                        <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?php echo $camping['date_debut']; ?>">
                        <span id="errorDateDebut"></span>
                      </div>
                      <div class="form-group">
                        <label for="date_fin">Date Fin</label>
                        <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?php echo $camping['date_fin']; ?>">
                        <span id="errorDateFin"></span>
                      </div>
                      <div class="form-group">
                        <label for="place">Nombre de place</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Nombre de place" value="<?php echo $camping['place']; ?>">
                        <span id="errorNbrPlace"></span>
                      </div>
                      <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?php echo $camping['prix']; ?>">
                        <span id="errorPrix"></span>
                      </div>
                      <div class="form-group">
                        <label>Ajouter une image</label>
                        <input type="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" id="image" name="image" class="form-control file-upload-info" placeholder="Upload Image" value="<?php echo $camping['image']; ?>">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                        <span id="errorImage"></span>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                    </form>
                    <script>
                      // Contrôle de saisie
                      let myForm = document.getElementById('myForm');
                      myForm.addEventListener('submit', function (e) {
                          let titre = document.getElementById('titre');
                          let description = document.getElementById('description');
                          let adresse = document.getElementById('adresse');
                          let dateDebut = document.getElementById('date_debut');
                          let dateFin = document.getElementById('date_fin');
                          let place = document.getElementById('place');
                          let prix = document.getElementById('prix');
                          let image = document.getElementById('image');
                          // Réinitialisation des messages d'erreur
                          resetErrorMessages();
                          let isValid = true;
                          // Vérification du champ titre
                          if (titre.value.trim() === '') {
                              setError('errorTitre', "Le champ titre est obligatoire");
                              isValid = false;
                          }
                          // Vérification du champ description
                          if (description.value.trim().length < 20) {
                              setError('errorDescription', "Le champ description doit contenir au moins 20 caractères");
                              isValid = false;
                          }
                          // Vérification du champ adresse
                          if (adresse.value.trim() === '') {
                              setError('errorAdresse', "Le champ adresse est obligatoire");
                              isValid = false;
                          }
                          // Vérification des dates
                          let startDate = new Date(dateDebut.value);
                          let endDate = new Date(dateFin.value);
                          let currentDate = new Date();
                          if (startDate >= endDate) {
                              setError('errorDateFin', "La date de fin doit être postérieure à la date de début");
                              isValid = false;
                          }

                          if (startDate <= currentDate) {
                              setError('errorDateDebut', "La date de début doit être ultérieure à la date actuelle");
                              isValid = false;
                          }

                          // Vérification du nombre de place
                          if (!/^[0-9]+$/.test(place.value) || parseInt(place.value) <= 0) {
                              setError('errorNbrPlace', "Le champ nombre de place doit contenir uniquement des chiffres et être supérieur à 0");
                              isValid = false;
                          }

                          // Vérification du champ prix
                          if (!/^\d*\.?\d*$/.test(prix.value)) {
                              setError('errorPrix', "Le champ prix doit contenir uniquement des chiffres ou des décimales");
                              isValid = false;
                          }

                          // Vérification du champ image
                          if (image.value.trim() === '') {
                              setError('errorImage', "Le champ image est obligatoire");
                              isValid = false;
                          }

                          // Si le formulaire n'est pas valide, on empêche sa soumission
                          if (!isValid) {
                              e.preventDefault();
                          }
                      });

                      // Fonction pour afficher les messages d'erreur
                      function setError(id, errorMessage) {
                          let errorElement = document.getElementById(id);
                          errorElement.innerHTML = errorMessage;
                          errorElement.style.color = 'red';
                      }

                      // Fonction pour réinitialiser les messages d'erreur
                      function resetErrorMessages() {
                          let errorElements = document.querySelectorAll('[id^="error"]');
                          errorElements.forEach(function (element) {
                              element.innerHTML = '';
                          });
                      }
                  </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © HAWESS 2024</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>