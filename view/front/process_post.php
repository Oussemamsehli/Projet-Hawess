<?php

include "../../controller/postController.php"; 






   
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postController = new PostController();

    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // Check if file is uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Define the destination directory and file path
        $uploadDir = 'C:/xampp/htdocs/projetPi/view/front/uploads/';
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]); 

        // Move uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            // Insert the post into the database
            $postId = $postController->createPost($content, $title, basename($_FILES["image"]["name"]));
            if ($postId) {
                echo "Post created successfully with ID: " . $postId;
                header("Location: all_posts.php");
                exit(); 
            } else {
                echo "Failed to create post";
            }
        } else {
            echo "Failed to move uploaded file";
        }
    } else {
        echo "No file uploaded";
    }
} else {
    echo "Invalid request method";
}