<?php

include "../../controller/commentController.php"; 


function filterBadWords($content) {
    
    $badWords = array("badword1", "badword2", "badword3");

   
    $filteredContent = str_ireplace($badWords, "***", $content);

    return $filteredContent;
}



   


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $commentController = new CommentController();

    // Assuming you have a form field named 'postId' for the post ID
    // Assuming you have a form field named 'content' for the comment content
    
    $postId = $_POST['postId'];
    $userId = $_POST['userId']; // As requested, set the user ID to null
    $content = filterBadWords($_POST['content']);
     

    // Call the createComment method of the CommentController
    $commentId = $commentController->createComment($postId, $userId, $content);

    if ($commentId) {
        header("Location: all_posts.php");
                exit(); 
    } else {
        echo "Failed to create comment.";
    }
}