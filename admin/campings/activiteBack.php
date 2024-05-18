<?php
require ('../../controllers/ActivitesController.php');

$actC = new ActivitesController();
if (isset($_POST['idCamping']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['heure_debut']) && isset($_POST['heure_fin']) && isset($_POST['place']) && isset($_POST['image'])) {
  $activite = new Activite($_POST['titre'], $_POST['description'], $_POST['heure_debut'], $_POST['heure_fin'], $_POST['place'], $_POST['image'], $_POST['idCamping']);
  $actC->addActivities($activite);
  header('Location: activiteBack.php?idCamping=' . $_POST['idCamping']);
}
$activities = $actC->joinCamping($_GET['idCamping']);
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
          <a class="nav-link" href="../dashboard.php">
            <span class="menu-icon">
              <i class="mdi mdi-arrow-left"></i>
            </span>
            <span class="menu-title">Liste campings</span>
          </a>
        </li>

      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Activités </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter une activité</h4>
                  <form id="myForm" class="forms-sample" action="activiteBack.php" method="post">
                    <input type="text" name="idCamping" value="<?php echo $_GET['idCamping']; ?>" hidden>
                    <div class="form-group">
                      <label for="titre">Titre</label>
                      <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
                      <span id="errorTitre"></span>
                    </div>
                    <div class="form-group">
                      <label for="Descrition">Descrition</label>
                      <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                      <span id="errorDescription"></span>
                    </div>
                    <div class="form-group">
                      <label for="heure_debut">Heure Début</label>
                      <input type="time" class="form-control" id="heure_debut" name="heure_debut">
                      <span id="errorHeureDebut"></span>
                    </div>
                    <div class="form-group">
                      <label for="heure_fin">Heure Fin</label>
                      <input type="time" class="form-control" id="heure_fin" name="heure_fin">
                      <span id="errorHeureFin"></span>
                    </div>
                    <div class="form-group">
                      <label for="place">Nombre de place</label>
                      <input type="text" class="form-control" id="place" name="place" placeholder="Nombre de place">
                      <span id="errorNbrPlace"></span>
                    </div>
                    <div class="form-group">
                      <label>Ajouter une image</label>
                      <input type="file" id="image" name="image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                      <span id="errorImage"></span>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                  </form>
                  <script>
                    let myForm = document.getElementById('myForm');
                    myForm.addEventListener('submit', function (e) {
                      resetErrorMessages();

                      let titre = document.getElementById('titre');
                      let description = document.getElementById('description');
                      let heureDebut = document.getElementById('heure_debut');
                      let heureFin = document.getElementById('heure_fin');
                      let place = document.getElementById('place');
                      let image = document.getElementById('image');

                      let isValid = true;

                      if (titre.value.trim() === '') {
                        setError('errorTitre', "Le champ titre est obligatoire");
                        isValid = false;
                      }

                      if (description.value.trim().length < 20) {
                        setError('errorDescription', "Le champ description doit contenir au moins 20 caractères");
                        isValid = false;
                      }

                      if (heureDebut.value >= heureFin.value) {
                        setError('errorHeureFin', "L'heure de fin doit être postérieure à l'heure de début");
                        isValid = false;
                      }

                      if (!/^\d+$/.test(place.value) || parseInt(place.value) <= 0) {
                        setError('errorNbrPlace', "Le champ nombre de place doit contenir uniquement des chiffres positifs");
                        isValid = false;
                      }

                      let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                      if (!allowedExtensions.exec(image.value)) {
                        setError('errorImage', "Le fichier doit être une image de type JPG, JPEG, PNG ou GIF");
                        isValid = false;
                      }

                      if (!isValid) {
                        e.preventDefault();
                      }
                    });

                    function setError(id, errorMessage) {
                      let errorElement = document.getElementById(id);
                      errorElement.innerHTML = errorMessage;
                      errorElement.style.color = 'red';
                    }

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
            <!--- affichage -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des activités</h4>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#ID</th>
                          <th>Titre</th>
                          <th>Description</th>
                          <th>Heure Début</th>
                          <th>Heure Fin</th>
                          <th>Nombre de place</th>
                          <th>Image</th>
                          <th>Camping</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (!empty($activities)) {
                          foreach ($activities as $activite) { ?>
                            <tr>
                              <td><?php echo $activite['idActivite']; ?></td>
                              <td><?php echo $activite['titre']; ?></td>
                              <td><?php echo $activite['description']; ?></td>
                              <td><?php echo $activite['heure_debut']; ?></td>
                              <td><?php echo $activite['heure_fin']; ?></td>
                              <td><?php echo $activite['place']; ?></td>
                              <td><img src="../../images/<?php echo $activite['image']; ?>"
                                  style="width: 60px; height: 60px;"></td>
                              <td><?php echo $activite['ctitre']; ?></td>
                              <td><a class="btn btn-primary mr-2"
                                  href="editActivite.php?id=<?php echo $activite['idActivite']; ?>">Modifier</a> <button
                                  class="btn btn-primary mr-2"
                                  onclick="confirmDelete(<?php echo $activite['idActivite']; ?>, <?php echo $_GET['idCamping']; ?>,'deleteActivite.php')">Supprimer</button>
                              </td>
                            </tr>
                          <?php }
                        } ?>
                      </tbody>
                    </table>
                    <script>
                      function confirmDelete(articleId, idCamping, redirectUrl) {
                        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet activité ?");
                        if (confirmation) {
                          window.location.href = redirectUrl + "?id=" + articleId + "&idCamping=" + idCamping;
                        }
                      } 
                    </script>
                  </div>
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
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="#"
                target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
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