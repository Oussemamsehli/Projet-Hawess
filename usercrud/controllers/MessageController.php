<?php
session_start();
error_reporting(0);
include('includes/config.php');

class MessageController {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function sendMessage($senderId, $receiverId, $message) {
        // Insert message into the database
        $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (:senderId, :receiverId, :message)";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':senderId', $senderId, PDO::PARAM_INT);
        $query->bindParam(':receiverId', $receiverId, PDO::PARAM_INT);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->execute();

        // Return true on successful message sending
        return true;
    }

    public function getMessages($userId) {
        // Retrieve messages for the given user from the database
        $sql = "SELECT * FROM messages WHERE receiver_id = :userId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':userId', $userId, PDO::PARAM_INT);
        $query->execute();
        $messages = $query->fetchAll(PDO::FETCH_ASSOC);

        // Return the messages array
        return $messages;
    }

    public function deleteMessage($messageId) {
        // Delete message from the database
        $sql = "DELETE FROM messages WHERE id = :messageId";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':messageId', $messageId, PDO::PARAM_INT);
        $query->execute();

        // Return true on successful deletion
        return true;
    }

    // Add more controller methods as needed
}
?>
