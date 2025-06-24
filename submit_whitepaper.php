<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'db_connect.php';

// PHPMailer integration
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$response = ['status' => 'success', 'errors' => []];

$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$company = isset($_POST['company']) ? trim($_POST['company']) : '';
$role = isset($_POST['role']) ? trim($_POST['role']) : '';
$industry = isset($_POST['industry']) ? trim($_POST['industry']) : '';
$country = isset($_POST['country']) ? trim($_POST['country']) : '';
$optin = isset($_POST['optin']) ? 1 : 0;

// Validation
if (empty($name)) {
    $response['errors']['name'] = "Full name is required.";
}
if (empty($email)) {
    $response['errors']['email'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['errors']['email'] = "Invalid email format.";
}
if (empty($country)) {
    $response['errors']['country'] = "Country is required.";
}
if (empty($company)) {
    $response['errors']['company'] = "Company is required.";
}
if (empty($industry)) {
    $response['errors']['industry'] = "Industry is required.";
}
if (empty($role)) {
    $response['errors']['role'] = "Role is required.";
}

if (!empty($response['errors'])) {
    $response['status'] = 'error';
    echo json_encode($response);
    exit;
}

// Insert into DB
$stmt = $conn->prepare("INSERT INTO tbl_whitepaper_download (name, email, company, role, industry, country, optin) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssi", $name, $email, $company, $role, $industry, $country, $optin);

if ($stmt->execute()) {
    // SEND EMAILS
    $from_name = "Packfora";     // Sender Name
    $to_email = "shirin@sda-zone.com"; 

   
    $subject = "New Whitepaper Download Request from $name";

    $message = "
    <h3>New Whitepaper Request</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Company:</strong> $company</p>
    <p><strong>Role:</strong> $role</p>
    <p><strong>Industry:</strong> $industry</p>
    <p><strong>Country:</strong> $country</p>
    <p><strong>Opt-in:</strong> " . ($optin ? 'Yes' : 'No') . "</p>
    ";

    $mail = new PHPMailer(true);
    try {
        
        // Server settings
        // $mail->isSMTP();
        // $mail->Host = 'smtp.example.com'; // your SMTP
        // $mail->SMTPAuth = true;
        // $mail->Username = 'your@email.com';
        // $mail->Password = 'yourpassword';
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;

        // Admin Email
        // Sender and recipient
        $mail->setFrom('contact@packfora.com', $from_name); 
        $mail->addAddress($to_email);  
        //  $mail->addAddress('moiz@sda-zone.com');  // Second recipient (add your second email here)

        // Attach uploaded resume
        // $mail->addAttachment($target_file, $file_name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();

        // User Thank You Email
        $mail->clearAddresses();
        $mail->addAddress($email);
        $mail->Subject = "Thank you for downloading our Whitepaper!";
        $mail->Body = "
            <p>Hi $name,</p>
            <p>Thank you for your interest in our whitepaper. You can download it here:</p>
            <p><a href='http://148.72.26.123/assets/pdf/packforum-whitepaper.pdf' target='_blank'>Download Whitepaper</a></p>
            <p>Regards,<br>Team Packfora</p>
        ";
        $mail->send();

        $response['status'] = 'success';
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['errors']['general'] = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    $response['status'] = 'error';
    $response['errors']['general'] = "Database error: " . $conn->error;
}

echo json_encode($response);
