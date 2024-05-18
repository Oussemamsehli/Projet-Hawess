<?php

require_once('C:/xampp/htdocs/Projet-Hawess/config.php');
 include "C:/xampp/htdocs/Projet-Hawess/model/post.php"; 
 class PostController {
    public function createPost($userId,$content, $title, $image) {
        $timestamp = date("Y-m-d H:i:s");
        $post = new Post($userId, $content, $title, $image, $timestamp);
        
        $sql = "INSERT INTO post (UserID, Content, title, image, timestamp) VALUES (:userId, :content, :title, :image, :timestamp)";
        
        try {
            $db = config::getConnexion();

            $query = $db->prepare($sql);
            $query->execute([
                'userId' => $post->getUserId(),
                'content' => $post->getContent(),
                'title' => $post->getTitle(),
                'image' => $post->getImage(),
                'timestamp' => $post->getTimestamp()
            ]);

            return $db->lastInsertId();
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getAllPosts() {
        try {
            $db = config::getConnexion();

           
            $sql = "SELECT * FROM post ORDER BY timestamp DESC";
            $query = $db->query($sql);

           
            $posts = $query->fetchAll(PDO::FETCH_ASSOC);

            return $posts;
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function deletePost($postId) {
        $sql = "DELETE FROM post WHERE ID = :postId";
        
        try {
            $db = config::getConnexion(); 

            $query = $db->prepare($sql);
            $query->execute(['postId' => $postId]);

            
            if ($query->rowCount() > 0) {
                return true; 
            } else {
                return false; 
            }
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function updatePost($postId, $content, $title, $image= null) {
        $timestamp = date("Y-m-d H:i:s");
        $sql = "UPDATE post SET Content = :content, title = :title, image = :image, timestamp = :timestamp WHERE ID = :postId";

        try {
            $db = config::getConnexion();

            $query = $db->prepare($sql);
            $query->execute([
                'content' => $content,
                'title' => $title,
                'image' => $image,
                'timestamp' => $timestamp,
                'postId' => $postId
            ]);

            return true; // Successfully updated
        } catch(Exception $e) {
            die('Error: ' . $e->getMessage());
            return false; // Failed to update
        }
    }
}


    

 
 