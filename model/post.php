<?php
class Post {
    private $id;
    private $userId;
    private $content;
    private $title;
    private $image;
    private $timestamp;
    private $likeCount;
    private $dislikeCount;

    public function __construct ($userId,$content, $title,  $image, $timestamp) {
        
        $this->userId = $userId;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->timestamp = $timestamp;
        $this->likeCount = 0;
        $this->dislikeCount = 0;
    }
   
    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function getLikeCount() {
        return $this->likeCount;
    }

    public function getDislikeCount() {
        return $this->dislikeCount;
    }
    public function getTitle() {
        return $this->title;
    }

    public function getImage() {
        return $this->image;
    }
    public function incrementLikeCount() {
        $this->likeCount++;
    }

    // Method to increment the dislike count
    public function incrementDislikeCount() {
        $this->dislikeCount++;
    }
}