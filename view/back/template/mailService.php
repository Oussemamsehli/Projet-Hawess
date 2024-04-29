<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require 'C:/Users/sadok/OneDrive/Desktop/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'C:/Users/sadok/OneDrive/Desktop/PHPMailer-master/PHPMailer-master/src/SMTP.php';
require 'C:/Users/sadok/OneDrive/Desktop/PHPMailer-master/PHPMailer-master/src/Exception.php';


class EmailService
{
    private $mailer;

    public function __construct()
    {
        // Create a new PHPMailer instance
        $this->mailer = new PHPMailer(true);

        // Configure mailer settings
        $this->configure();
    }

    private function configure()
    {
        try {
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = 'attia1232020@gmail.com';  // SMTP username
            $this->mailer->Password = 'iazrrhplbjawynai';  // SMTP password
            $this->mailer->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
            $this->mailer->Port = 587;  // TCP port to connect to
        } catch (Exception $e) {
            // Handle mailer configuration error
            echo 'Error configuring mailer: ', $e->getMessage();
        }
    }

    public function sendEmail($recipient, $subject, $body, $isHTML = true)
    {
        try {
            // Recipients
            $this->mailer->setFrom('x@x.com', 'Your Response');
            $this->mailer->addAddress($recipient);

            // Content
            $this->mailer->isHTML($isHTML);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;

            // Send email
            $this->mailer->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $this->mailer->ErrorInfo;
        }
    }
}


?>