<?php
include "../../controller/postController.php"; 
$postController = new PostController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    
 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        $uploadDir = 'C:/xampp/htdocs/projetPi/view/front/uploads/';
        $imagePath = $uploadDir . basename($_FILES["image"]["name"]); 

       
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
           
            if ($postController->updatePost($postId, $content, $title, basename($_FILES["image"]["name"]))) {
                echo "Post updated successfully";
                header("Location: template/AdminPost.php");
            exit(); 
            } else {
                echo "Failed to update post";
            }
        } else {
            echo "Failed to move uploaded file";
        }
    } else {
        
        if ($postController->updatePost($postId, $content, $title)) {
            echo "Post updated successfully";
            header("Location: template/AdminPost.php");
            exit(); 
        } else {
            echo "Failed to update post";
        }
    }
} else {
    echo "Invalid request method";
}
?>