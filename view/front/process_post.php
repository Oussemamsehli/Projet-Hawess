<?php

include "../../controllers/postController.php"; 






   
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postController = new PostController();

    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = intval($_POST['userId']); 
  
  
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      // Define the destination directory and file path
         $uploadDir = 'C:/xampp/htdocs/Projet-Hawess-forum/view/front/uploads/';
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]); 

       if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            
           $postId = $postController->createPost(1,$content, $title, basename($_FILES["image"]["name"]));
            if ($postId) {
                ob_start(); // Start output buffering
                echo "Post created successfully with ID: " . $postId;
                ob_end_flush(); // Flush output buffer
                
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