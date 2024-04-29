<?php
session_start();
error_reporting(0);
include('includes/config.php');

class FeedbackController {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function submitFeedback($userId, $feedback) {
        // Insert feedback into the database
        $sql = "INSERT INTO feedbacks (user_id, feedback) VALUES (:userId, :feedback)";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->bindParam(':feedback', $feedback, PDO::PARAM_STR);
        $query->execute();

        // Return true on successful submission
        return true;
    }

    public function getFeedback() {
        // Retrieve all feedback from the database
        $sql = "SELECT * FROM feedbacks";
        $query = $this->dbh->prepare($sql);
        $query->execute();
        $feedbacks = $query->fetchAll(PDO::FETCH_ASSOC);

        // Return the feedback array
        return $feedbacks;
    }

    public function deleteFeedback($feedbackId) {
        // Delete feedback from the database
        $sql = "DELETE FROM feedbacks WHERE id = :feedbackId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':feedbackId', $feedbackId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful deletion
        return true;
    }

    // Add more controller methods as needed
}
?>
