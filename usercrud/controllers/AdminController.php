<?php
session_start();
error_reporting(0);
include('includes/config.php');

class AdminController {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function addAdmin($name, $email, $password) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the admin data into the database
        $sql = "INSERT INTO admins (name, email, password) VALUES (:name, :email, :password)";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query->execute();

        // Return true on successful addition
        return true;
    }

    public function loginAdmin($email, $password) {
        // Fetch admin data based on email
        $sql = "SELECT * FROM admins WHERE email = :email";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $admin = $query->fetch(PDO::FETCH_ASSOC);

        // Check if admin exists and password is correct
        if ($admin && password_verify($password, $admin['password'])) {
            // Set session variables or other authentication mechanisms
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['admin_email'] = $admin['email'];

            // Return true on successful login
            return true;
        } else {
            // Return false if login fails
            return false;
        }
    }

    public function updateAdminProfile($adminId, $name, $email, $password) {
        // Hash the password if provided
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE admins SET name = :name, email = :email, password = :password WHERE id = :adminId";
        } else {
            $sql = "UPDATE admins SET name = :name, email = :email WHERE id = :adminId";
        }

        // Update admin data in the database
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        if (!empty($password)) {
            $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        }
        $query->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful update
        return true;
    }

    public function deleteAdmin($adminId) {
        // Delete admin from the database
        $sql = "DELETE FROM admins WHERE id = :adminId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful deletion
        return true;
    }

    // Add more controller methods as needed
}
?>
