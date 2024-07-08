<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $name = $_POST['firstname'] ?? '';
    $surname = $_POST['lastname'] ?? '';
    $phone = $_POST['phoneno'] ?? '';
    $email = $_POST['email'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
  

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hindudharmikapeetham@gmail.com'; // Your Gmail email address
        $mail->Password = 'bmqo kizf ezta jnkz'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('hindudharmikapeetham@gmail.com', 'Hindu Dharmika Peetham'); // Your Gmail email and name
        $mail->addAddress('hindudharmikapeetham@gmail.com', 'Hindu Dharmika Peetham'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
            <h1>New Message</h1>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Surname:</strong> $surname</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>City:</strong> $city</p>
            <p><strong>State:</strong> $state</p>
           
        ";

        $mail->send();
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Successfully Submitted')
        window.location.href='index.php';
        </SCRIPT>");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}


?>
