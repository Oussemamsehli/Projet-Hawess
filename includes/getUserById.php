<?php
session_start();
error_reporting(0);
include('config.php');
include('../controllers/UserController.php'); // Include the UserController class file

// Create a new instance of the UserController
$userController = new UserController($dbh);

// Get user ID from request
$userId = $_GET['userId'] ?? null;

// Fetch user details
$user = $userController->getUserById($userId);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($user);
?>
