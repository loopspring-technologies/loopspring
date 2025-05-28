<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // path to Composer's autoload.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'loopspring2@gmail.com'; // your Gmail
        $mail->Password   = 'wavz ujdm fcgo gkfe';     // App password (NOT your Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress('loopspring2@gmail.com'); // your Gmail again

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Support and Maintenance Form Submission';
        $mail->Body    = '
            <strong>Name:</strong> ' . $_POST['name'] . '<br>
          
            <strong>Email:</strong> ' . $_POST['email'] . '<br>
            <strong>Contact No:</strong> ' . $_POST['phone'] . '<br>
            <strong>Severity level:</strong> ' . $_POST['level'] . '<br>
            <strong>Problem description:</strong> ' . nl2br($_POST['description']) . '
        ';

        $mail->send();
        echo 'success';
    } catch (Exception $e) {
        echo 'error';
    }
}