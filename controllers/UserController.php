<?php
session_start();
error_reporting(0);
include('includes/config.php');

class UserController {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function registerUser($name, $email, $password) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query->execute();

        // Return true on successful registration
        return true;
    }

    public function loginUser($email, $password) {
        // Fetch user data based on email
        $sql = "SELECT * FROM users WHERE email = :email";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables or other authentication mechanisms
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Return true on successful login
            return true;
        } else {
            // Return false if login fails
            return false;
        }
    }

    public function updateUserProfile($userId, $name, $email, $password) {
        // Hash the password if provided
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :userId";
        } else {
            $sql = "UPDATE users SET name = :name, email = :email WHERE id = :userId";
        }

        // Update user data in the database
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        if (!empty($password)) {
            $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        }
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful update
        return true;
    }

    public function deleteUser($userId) {
        // Delete user from the database
        $sql = "DELETE FROM users WHERE id = :userId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful deletion
        return true;
    }

    // Add more controller methods as needed
}
?>
