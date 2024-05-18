<?php
session_start();

require ('../../controllers/CampingController.php');
require ('../../controllers/SMS.php');

$user_id = $_SESSION['user_id'];

$campingC = new CampingController();
if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['adresse']) && isset($_POST['date_debut']) && isset($_POST['date_fin']) && isset($_POST['place']) && isset($_POST['prix']) && isset($_POST['image'])) {
  $camping = new Camping($_POST['titre'], $_POST['description'], $_POST['adresse'], $_POST['date_debut'], $_POST['date_fin'], $_POST['prix'], $_POST['place'], $_POST['image']);
  $campingC->addCamping($camping, $_POST['lang'], $_POST['lat'], $user_id);
  $smsService = new Sms();
  $msg = "Nouveau Camping est ajouté : titre : " . $_POST['titre'] . " adresse : " . $_POST['adresse'] . " Prix : " . $_POST['prix'];
  $smsService->sendSms($msg);
  header('Location: campingBack.php');
}
$campings = $campingC->showCampings();
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
  <script src="https://cdn.maptiler.com/maptiler-sdk-js/v1.2.0/maptiler-sdk.umd.min.js"></script>
  <link href="https://cdn.maptiler.com/maptiler-sdk-js/v1.2.0/maptiler-sdk.css" rel="stylesheet" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <!-- <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div> -->
      <ul class="nav">
        <!-- <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li> -->
        <li class="nav-item nav-category">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../dashboard.php">
            <span class="menu-icon">
              <i class="mdi mdi-arrow-left"></i>
            </span>
            <span class="menu-title">Retour</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="campingBack.php">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Camping</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_navbar.html -->
      <!-- <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Projects</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-outline text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-web text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">UI Development</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-layers text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Software Testing</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all projects</p>
                </div>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-view-grid"></i>
                </a>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email"></i>
                  <span class="count bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                      <p class="text-muted mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                      <p class="text-muted mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                      <p class="text-muted mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">4 new messages</p>
                </div>
              </li>
              <li class="nav-item dropdown border-left">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell"></i>
                  <span class="count bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-calendar text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Event today</p>
                      <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                      <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-link-variant text-warning"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Launch Admin</p>
                      <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">See all notifications</p>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav> -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Campings </h3>
          </div>

          <div class="container-fluid pt-4 px-4">
            <?php
            $db = config::getConnexion();
            $sql = "SELECT c.titre, COUNT(a.camping) AS nombre_activities FROM campings c INNER JOIN activites AS a ON c.idCamping = a.camping GROUP BY c.titre ORDER BY nombre_activities DESC LIMIT 3";
            $query = $db->prepare($sql);
            $query->execute();
            $stat = $query->fetchAll();
            ?>
            <div class="container-fluid pt-4 px-4">
              <h2>Most Campings have activities :</h2>
              <div style="width: 80%; margin: auto;">
                <canvas id="barChart"></canvas>
              </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
              var labels = <?php echo json_encode(array_column($stat, 'titre')); ?>;
              var data = <?php echo json_encode(array_column($stat, 'nombre_activities')); ?>;
              var ctx = document.getElementById('barChart').getContext('2d');
              var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: labels,
                  datasets: [{
                    label: 'Number of Activities',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>
          </div>


          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Liste des campings</h4>
                </p>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <!-- <th>#ID</th> -->
                        <th>Titre</th>
                        <!-- <th>Description</th> -->
                        <th>Adresse</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Nombre de place</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (!empty($campings)) {
                        foreach ($campings as $camping) { ?>
                          <tr>
                            <!-- <td><?php echo $camping['idCamping']; ?></td> -->
                            <td><?php echo $camping['titre']; ?></td>
                            <!-- <td><?php echo $camping['description']; ?></td> -->
                            <td><?php echo $camping['adresse']; ?></td>
                            <td><?php echo $camping['date_debut']; ?></td>
                            <td><?php echo $camping['date_fin']; ?></td>
                            <td><?php echo $camping['place']; ?></td>
                            <td><?php echo $camping['prix']; ?></td>
                            <td><img src="../../images/<?php echo $camping['image']; ?>" style="width: 60px; height: 60px;">
                            </td>
                            <?php
                            $data = "ID : " . $camping['idCamping'] . " Titre : " . $camping['titre'] . "Adresse : " . $camping['adresse'] . " Prix : " . $camping['prix'];
                            ?>
                            <td><a class="btn btn-primary mr-2" href="qrCode.php?data=<?php echo $data; ?>">QrCode</a></td>
                            <td><a class="btn btn-primary mr-2"
                                href="activiteBack.php?idCamping=<?php echo $camping['idCamping']; ?>">Activité</a> <a
                                class="btn btn-primary mr-2"
                                href="editCamping.php?id=<?php echo $camping['idCamping']; ?>">Modifier</a> <button
                                class="btn btn-primary mr-2"
                                onclick="confirmDelete(<?php echo $camping['idCamping']; ?>, 'deleteCamping.php')">Supprimer</button>
                            </td>
                          </tr>
                        <?php }
                      } ?>
                    </tbody>
                  </table>
                  <script>
                    function confirmDelete(articleId, redirectUrl) {
                      var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet camping ?");
                      if (confirmation) {
                        window.location.href = redirectUrl + "?id=" + articleId;
                      }
                    } 
                  </script>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un camping</h4>
                  <form id="myForm" class="forms-sample" action="campingBack.php" method="post">
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
                      <label for="adresse">Adresse</label>
                      <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
                      <input type="text" class="form-control" id="lang" name="lang" hidden>
                      <input type="text" class="form-control" id="lat" name="lat" hidden>
                      <span id="errorAdresse"></span>
                    </div>
                    <div class="form-group">
                      <label for="date_debut">Date Debut</label>
                      <input type="date" class="form-control" id="date_debut" name="date_debut">
                      <span id="errorDateDebut"></span>
                    </div>
                    <div class="form-group">
                      <label for="date_fin">Date Fin</label>
                      <input type="date" class="form-control" id="date_fin" name="date_fin">
                      <span id="errorDateFin"></span>
                    </div>
                    <div class="form-group">
                      <label for="place">Nombre de place</label>
                      <input type="text" class="form-control" id="place" name="place" placeholder="Nombre de place">
                      <span id="errorNbrPlace"></span>
                    </div>
                    <div class="form-group">
                      <label for="prix">Prix</label>
                      <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                      <span id="errorPrix"></span>
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
                  <style>
                    #map {
                      width: 500px;
                      height: 600px;
                    }
                  </style>
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div id="map"></div>
                      </div>
                    </div>
                  </div>
                  <script>
                    function initializeMap() {
                      maptilersdk.config.apiKey = 'EaPeZP1b4yoxXOXu46vm';
                      const map = new maptilersdk.Map({
                        container: 'map', // container's id or the HTML element to render the map
                        style: maptilersdk.MapStyle.STREETS,
                        center: [16.62662018, 49.2125578], // starting position [lng, lat]
                        zoom: 14, // starting zoom
                      });
                      const marker = new maptilersdk.Marker()
                        .setLngLat([10.180356455967974, 36.80766601939333])
                        .addTo(map);

                      map.on('click', function (event) {
                        const coordinates = [event.lngLat.lng, event.lngLat.lat]; // Convert to [lng, lat] format
                        updateMarker(coordinates);
                        reverseGeocode(coordinates);
                      });

                      // Function to update marker position
                      function updateMarker(coordinates) {
                        marker.setLngLat(coordinates);
                      }

                      // Function to perform reverse geocoding
                      async function reverseGeocode(coordinates) {
                        const results = await maptilersdk.geocoding.reverse(coordinates);
                        displayAddress(results);
                      }

                      // Function to display the reverse geocoded address
                      function displayAddress(results) {
                        const addressElements = document.getElementById('adresse');
                        const lang = document.getElementById('lang');
                        const lat = document.getElementById('lat');
                        if (results && results.features && results.features.length > 0) {
                          const address = results.features[0].place_name_fr;
                          addressElements.value = address;
                          lang.value = results.features[0].center[0];
                          lat.value = results.features[0].center[1];
                        }
                        else {
                          addressElements.innerText = 'Address not found';

                        }
                      }
                    }
                    initializeMap();
                  </script>
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
            <!--- affichage -->

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