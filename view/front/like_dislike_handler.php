<?php

include "../../controllers/likeDislikeController.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $likeDislikeController = new LikeDislikeController();

    $postId = $_POST['postId'];
    //$userId = null; 
    $userId=$_POST['userId'];
    $action = $_POST['action']; 

    if ($action == 'like') {
        $likeDislikeController->like($postId, $userId);
    } elseif ($action == 'dislike') {
        $likeDislikeController->dislike($postId, $userId);
    }

 
    header("Location: all_posts.php");
    exit();
}
