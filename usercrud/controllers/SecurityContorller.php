<?php
session_start();
error_reporting(0);
include('includes/config.php');

class SecurityController {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function changePassword($userId, $oldPassword, $newPassword) {
        // Fetch the user's current password from the database
        $sql = "SELECT password FROM users WHERE id = :userId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Verify if the old password matches the current password
        if (password_verify($oldPassword, $result['password'])) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $sql = "UPDATE users SET password = :password WHERE id = :userId";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);
            $query->execute();

            // Password changed successfully
            return true;
        } else {
            // Old password is incorrect
            return false;
        }
    }

    public function resetPassword($email) {
        // Generate a new random password
        $newPassword = bin2hex(random_bytes(8));

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        // Send the new password to the user via email or other means

        // Return the new password for display or further processing
        return $newPassword;
    }

    public function generateOTP($email) {
        // Generate a random OTP
        $otp = rand(100000, 999999);

        // Store the OTP in the database or session for verification

        // Send the OTP to the user via email or other means

        // Return the OTP for display or further processing
        return $otp;
    }

    public function verifyOTP($email, $otp) {
        // Fetch the OTP from the database or session
        // Compare it with the provided OTP
        // If they match, return true; otherwise, return false
    }

    // Add more controller methods as needed
}
?>
