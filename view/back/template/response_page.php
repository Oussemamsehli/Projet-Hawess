<?php
include "../../../controller/responseController.php"; 
//include "./mailService.php"; 

//$emailService=new EmailService();




// Create a new Response object



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $responseController = new responseC();

    // Check if all required fields are set
    if (isset($_POST['responseMessage']) && isset($_POST['responseContext']) ) {
        // Get form data
    
$reclamationId = $_POST['reclamationId'];
$responseMessage = $_POST['responseMessage'];
$responseContext = $_POST['responseContext'];
$timestamp = date("Y-m-d H:i:s"); // Get the current timestamp
      

        // Create a new Reclamation object
        $response = new Response($reclamationId, $responseMessage, $responseContext, $timestamp);

        // Call the method to add the reclamation
        $responseController->addResponse($response);
        $responseController->updateReclamationStatus($reclamationId);
        //$emailService->sendEmail("attia1232020@gmail.com",$responseContext,$responseMessage);
        header("Location: AdminReclamation.php");
    } else {
        // Handle missing fields error
        echo "Missing required fields!";
    }
}






?>