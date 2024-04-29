<?php
include "../../controller/postController.php"; 
$postController = new PostController();
if (isset($_POST['postId'])) {
    $postId = $_POST['postId'];
    if ($postController->deletePost($postId)) {
        header("Location: all_posts.php");
                exit(); 
    } else {
        echo "Post not found or deletion failed.";
    }
} else {
    echo "Post ID not provided.";
}