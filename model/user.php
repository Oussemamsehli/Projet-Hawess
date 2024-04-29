<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $profilePicture;

    // Constructor
    public function __construct($id, $username, $email, $password, $profilePicture = null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->profilePicture = $profilePicture;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getProfilePicture() {
        return $this->profilePicture;
    }
}