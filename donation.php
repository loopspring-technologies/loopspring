<?php
// Enable error reporting for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the Content-Type header to application/json
header('Content-Type: application/json');

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$response = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['donor_name'] ?? '';
    $email = $_POST['donor_email'] ?? '';
    $mobile = $_POST['donor_mobile'] ?? '';
    $city = $_POST['donor_city'] ?? '';
    $address = $_POST['donor_address'] ?? '';
    $donor_for = $_POST['donor_for'] ?? '';
    $amount = $_POST['donation_amount'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'loopspring2@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'wavz ujdm fcgo gkfe'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('loopspring2@gmail.com', 'Loopspring');
        //$mail->addAddress($email, $name); 
        //if (!empty($email)) {
            //$mail->addAddress($email, $name); 
        //}
        $mail->addAddress('loopspring2@gmail.com', 'Admin'); // Send to admin

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Donation Form';
        $mail->Body    = "
            <h3>Donation Details</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>City:</strong> $city</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Donation For:</strong> $donor_for</p>
            <p><strong>Amount:</strong> ₹$amount</p>
        ";

        $mail->send();

        // Prepare success response
        $response['success'] = true;
        $response['message'] = 'Email sent successfully.';
    } catch (Exception $e) {
        // Prepare error response
        $response['success'] = false;
        $response['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} else {
    // Prepare error response for invalid request method
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

// Output the JSON response
echo json_encode($response);
?>