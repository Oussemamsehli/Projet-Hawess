<?php
class Comment {
    private $id;
    private $postId;
    private $userId;
    private $content;
    private $timestamp;

    // Constructor
    public function __construct( $postId, $userId, $content, $timestamp) {
       
        $this->postId = $postId;
        $this->userId = $userId;
        $this->content = $content;
        $this->timestamp = $timestamp;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getPostId() {
        return $this->postId;
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
}