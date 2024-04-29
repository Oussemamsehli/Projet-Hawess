<?php
class LikeDislike {
    private $id;
    private $postId;
    private $userId;
    private $type; // 'like' or 'dislike'

    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->postId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getType() {
        return $this->type;
    }

    // Method to like a post
    public function like() {
        $this->type = 'like';
    }

    // Method to dislike a post
    public function dislike() {
        $this->type = 'dislike';
    }
     // Setter method for setting the ID
     public function setId($id) {
        $this->id = $id;
    }

    // Setter method for setting the post ID
    public function setPostId($postId) {
        $this->postId = $postId;
    }

    // Setter method for setting the user ID
    public function setUserId($userId) {
        $this->userId = $userId;
    }

    // Setter method for setting the type (like or dislike)
    public function setType($type) {
        $this->type = $type;
    }

 
}