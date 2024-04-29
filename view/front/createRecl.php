<?php

include "../../controller/reclamationController.php"; 






   


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reclamationController = new reclamationC();

    // Check if all required fields are set
    if (isset($_POST['message']) && isset($_POST['sujet']) && isset($_FILES['file'])) {
        // Get form data
        $message = $_POST['message'];
        $sujet = $_POST['sujet'];
        $file = $_FILES['file'];

        // Handle file upload
        $file_path = null;
        if ($file['error'] === UPLOAD_ERR_OK) {
            // File upload is successful
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_path = 'uploads/' . $file_name; // Assuming you have an 'uploads' directory to store uploaded files
            move_uploaded_file($file_tmp, $file_path);
        }

        // Create a new Reclamation object
        $reclamation = new Reclamation($message, $sujet,0,1 , $file_path);

        // Call the method to add the reclamation
        $reclamationController->ajoutReclamation($reclamation);
    } else {
        // Handle missing fields error
        echo "Missing required fields!";
    }
}