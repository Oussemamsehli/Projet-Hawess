<?php
require_once "C:/xampp/htdocs/Projet-Hawess-forum/config.php";
include "C:/xampp/htdocs/Projet-Hawess-forum/model/LikeDislike.php";


class LikeDislikeController {
    public function like($postId, $userId) {
        try {
            $db = config::getConnexion();
    
            // Check if the user has already liked or disliked the post
            $sqlCheckLikeDislike = "SELECT * FROM likedislike WHERE PostID = :postId AND UserID = :userId";
            $queryCheckLikeDislike = $db->prepare($sqlCheckLikeDislike);
            $queryCheckLikeDislike->execute(['postId' => $postId, 'userId' => $userId]);
            $existingLikeDislike = $queryCheckLikeDislike->fetch(PDO::FETCH_ASSOC);
    
            if ($existingLikeDislike) {
                // User has already liked or disliked the post, update the type
                $type = 'like'; // Update to 'like'
                $sqlUpdateLike = "UPDATE likedislike SET Type = :type WHERE PostID = :postId AND UserID = :userId";
                $queryUpdateLike = $db->prepare($sqlUpdateLike);
                $queryUpdateLike->execute(['postId' => $postId, 'userId' => $userId, 'type' => $type]);
                return; // Exit the function
            }
    
            // Prepare the SQL query to insert a like
            $sqlInsertLike = "INSERT INTO likedislike (PostID, UserID, Type) VALUES (:postId, :userId, 'like')";
            $queryInsertLike = $db->prepare($sqlInsertLike);
            $queryInsertLike->bindParam(':postId', $postId);
            $queryInsertLike->bindParam(':userId', $userId);
            $queryInsertLike->execute();
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    public function dislike($postId, $userId) {
        try {
            $db = config::getConnexion();
    
           
            $sqlCheckLikeDislike = "SELECT * FROM likedislike WHERE PostID = :postId AND UserID = :userId";
            $queryCheckLikeDislike = $db->prepare($sqlCheckLikeDislike);
            $queryCheckLikeDislike->execute(['postId' => $postId, 'userId' => $userId]);
            $existingLikeDislike = $queryCheckLikeDislike->fetch(PDO::FETCH_ASSOC);
    
            if ($existingLikeDislike) {
                // User has already liked or disliked the post, update the type
                $type = 'dislike'; // Update to 'dislike'
                $sqlUpdateDislike = "UPDATE likedislike SET Type = :type WHERE PostID = :postId AND UserID = :userId";
                $queryUpdateDislike = $db->prepare($sqlUpdateDislike);
                $queryUpdateDislike->execute(['postId' => $postId, 'userId' => $userId, 'type' => $type]);
                return; // Exit the function
            }
    
           
            $sqlInsertDislike = "INSERT INTO likedislike (PostID, UserID, Type) VALUES (:postId, :userId, 'dislike')";
            $queryInsertDislike = $db->prepare($sqlInsertDislike);
            $queryInsertDislike->bindParam(':postId', $postId);
            $queryInsertDislike->bindParam(':userId', $userId);
            $queryInsertDislike->execute();
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getLikeCount($postId) {
        try {
            $db = config::getConnexion();
            $sql = "SELECT COUNT(*) AS LikeCount FROM likedislike WHERE PostID = :postId AND Type = 'like'";
            $query = $db->prepare($sql);
            $query->execute(['postId' => $postId]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['LikeCount'];
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getDislikeCount($postId) {
        try {
            $db = config::getConnexion();
            $sql = "SELECT COUNT(*) AS DislikeCount FROM likedislike WHERE PostID = :postId AND Type = 'dislike'";
            $query = $db->prepare($sql);
            $query->execute(['postId' => $postId]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['DislikeCount'];
        } catch(PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}