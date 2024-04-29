<?php
 require_once "C:/xampp/htdocs/Projet-Hawess-forum/config.php";
 include "C:/xampp/htdocs/Projet-Hawess-forum/model/comment.php"; 
 class CommentController {
    public function createComment($postId,  $userId,$content) {
        $timestamp = date("Y-m-d H:i:s");
        $comment = new Comment($postId, null, $content,  $timestamp);
        
        $sql = "INSERT INTO comment (PostID,UserID, Content,  Timestamp) VALUES (:postId,:userId, :content, :timestamp)";
        
        try {
            $db = config::getConnexion();

            $query = $db->prepare($sql);
            $query->execute([
                'postId' => $comment->getPostId(),
                'userId' => $comment->getUserId(),
                'content' => $comment->getContent(),
               
                'timestamp' => $comment->getTimestamp()
            ]);

            return $db->lastInsertId();
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getAllComments() {
        try {
            $db = config::getConnexion();

           
            $sql = "SELECT * FROM comment ORDER BY timestamp DESC";
            $query = $db->query($sql);

           
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getCommentsByPostId($postId) {
        try {
            $db = config::getConnexion();

            $sql = "SELECT * FROM comment WHERE PostID = :postId ORDER BY Timestamp DESC";
            $query = $db->prepare($sql);
            $query->execute(['postId' => $postId]);

            $comments = $query->fetchAll(PDO::FETCH_ASSOC);
            $sqlCount = "SELECT COUNT(*) as commentCount FROM comment WHERE PostID = :postId";
            $queryCount = $db->prepare($sqlCount);
            $queryCount->execute(['postId' => $postId]);
    
            // Fetch count of comments
            $commentCount = $queryCount->fetch(PDO::FETCH_ASSOC)['commentCount'];
    
            // Return comments along with count
            return ['comments' => $comments, 'commentCount' => $commentCount];

           
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    

 }
 