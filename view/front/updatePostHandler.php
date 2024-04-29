<?php
include "../../controller/postController.php"; 
$postController = new PostController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Define the destination directory and file path
        $uploadDir = 'C:/xampp/htdocs/projetPi/view/front/uploads/';
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]); 

        // Move uploaded file to the specified directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            // Update the post with the new image
            if ($postController->updatePost($postId, $content, $title, basename($_FILES["image"]["name"]))) {
                echo "Post updated successfully";
                header("Location: all_posts.php");
                exit(); 
            } else {
                echo "Failed to update post";
            }
        } else {
            echo "Failed to move uploaded file";
        }
    } else {
        // No new image uploaded, update post without changing the image
        if ($postController->updatePost($postId, $content, $title)) {
            echo "Post updated successfully";
            header("Location: all_posts.php");
            exit(); 
        } else {
            echo "Failed to update post";
        }
    }
} else {
    echo "Invalid request method";
}
?>