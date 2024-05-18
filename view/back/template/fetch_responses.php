<?php
require_once "C:/xampp/htdocs/Projet-Hawess-forum/controller/responseController.php";

// Check if reclamationId is provided in the query string
if (isset($_GET['reclamationId'])) {
    // Get the reclamation ID from the query string
    $reclamationId = $_GET['reclamationId'];
    
    // Create an instance of the Response Controller
    $responseController = new responseC();
    
    // Get responses by reclamation ID
    $responses = $responseController->getResponsesByReclamationId($reclamationId);
    
    // Output responses
    foreach ($responses as $response) {
        // Output response data (e.g., using HTML markup)
        echo "<div class='preview-item border-bottom'>";
        echo "<div class='preview-thumbnail'>";
        echo "<img src='assets/images/faces/face8.jpg' alt='image' class='rounded-circle' />";
        echo "</div>";
        echo "<div class='preview-item-content d-flex flex-grow'>";
        echo "<div class='flex-grow'>";
        echo "<div class='d-flex d-md-block d-xl-flex justify-content-between'>";
        echo "<h6 class='preview-subject'>" . $response['context'] . "</h6>";
        echo "<p class='text-muted text-small'>" . $response['timestamp'] . "</p>";
        echo "</div>";
        echo "<p class='text-muted'>" . $response['message'] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    // If reclamationId is not provided, return an error message
    echo "Error: Reclamation ID is missing.";
}
?>