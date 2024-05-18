<?php
class Response {
    private $id_response;
    private $id_reclamation;
    private $message;
    private $context;
    private $timestamp;

    // Constructor
    public function __construct($id_reclamation, $message, $context, $timestamp) {
        $this->id_reclamation = $id_reclamation;
        $this->message = $message;
        $this->context = $context;
        $this->timestamp = $timestamp;
    }

    // Getters
    public function getIdResponse() {
        return $this->id_response;
    }

    public function getIdReclamation() {
        return $this->id_reclamation;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getContext() {
        return $this->context;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    // Setters
    public function setIdResponse($id_response) {
        $this->id_response = $id_response;
    }

    public function setIdReclamation($id_reclamation) {
        $this->id_reclamation = $id_reclamation;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setContext($context) {
        $this->context = $context;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }
}
?>