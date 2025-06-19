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

// Validate fields
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$country_code    = trim($_POST['country_code'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$position = trim($_POST['position'] ?? '');
$message  = trim($_POST['message'] ?? '');

$errors = [];

// Check required fields
if (empty($name)) {
    $errors['name'] = 'Full Name is required';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Valid Email Address is required';
}
if (empty($phone)) {
    $errors['phone'] = 'Phone Number is required';
} elseif (!preg_match('/^\+\d{1,4}\s?\d{6,14}$/', $phone)) {
    $errors['phone'] = 'Phone Number must start with country code (e.g., +1, +91) followed by valid digits';
}

if (empty($position)) {
    $errors['position'] = 'Position must be selected';
}
if (empty($message)) {
    $errors['message'] = 'Message is required';
}

// Handle file upload
if (!isset($_FILES['resume']) || $_FILES['resume']['error'] != 0) {
    $errors['resume'] = 'Resume file is required';
} else {
    $allowed_extensions = ['pdf', 'doc', 'docx'];
    $file_tmp  = $_FILES['resume']['tmp_name'];
    $file_name = basename($_FILES['resume']['name']);
    $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed_extensions)) {
        $errors['resume'] = 'Resume must be a PDF, DOC, or DOCX file';
    }
}

// If there are any errors, return them
if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'errors' => $errors]);
    exit;
}

// Save file
$upload_dir = 'uploads/resumes/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$unique_file_name = uniqid('resume_', true) . '.' . $file_ext;
$target_file = $upload_dir . $unique_file_name;

if (!move_uploaded_file($file_tmp, $target_file)) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to upload resume']);
    exit;
}

// Insert into database
$phone_1 = $country_code.$phone;
$stmt = $conn->prepare("INSERT INTO career_applications (name, email, phone, position, resume, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone_1, $position, $unique_file_name, $message);

if ($stmt->execute()) {
    // Send email with PHPMailer
    // Define missing variables
    $from_name = "Packfora Contact Form";     // Sender Name
    $to_email = "moiz@sda-zone.com";   // Receiver Email

    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->isSMTP();
        // $mail->Host       = 'eternal.herosite.pro'; 
        // $mail->SMTPAuth   = true;
        // $mail->Username   = 'connect@sda.in.net';    
        // $mail->Password   = 'c_bo*bm#)4g*';         
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('connect@sda.in.net', $from_name); 
        $mail->addAddress($to_email);  
        //  $mail->addAddress('moiz@sda-zone.com');  // Second recipient (add your second email here)

        // Attach uploaded resume
        $mail->addAttachment($target_file, $file_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Career Application Received';
        $mail->Body = "
                <html>
                <head>
                <style>
                    body {
                        font-family: 'Arial', sans-serif;
                        background-color: #f0f2f5;
                        margin: 0;
                        padding: 20px;
                    }
                    .card {
                        max-width: 500px;
                        margin: auto;
                        background: #ffffff;
                        border-radius: 8px;
                        padding: 30px;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 30px;
                    }
                    .header h2 {
                        color: #333333;
                        margin: 0;
                        font-size: 24px;
                        text-align:left;
                    }
                    .content {
                        line-height: 1.6;
                        color: #555555;
                        font-size: 15px;
                    }
                    .content p {
                        margin: 10px 0;
                        color: #333333;
                    }
                    .content strong {
                        color: #f5811f;
                        display: inline-block;
                        width: 130px;
                    }
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        font-size: 13px;
                        color: #ffffff !important;
                    }
                    .button {
                        display: inline-block;
                        padding: 12px 24px;
                        background-color: #21409a;
                        color: #ffffff !important;
                        text-decoration: none;
                        border-radius: 5px;
                        margin-top: 20px;
                        font-size: 15px;
                    }
                </style>
                </head>
                <body>
                    <div class='card'>
                        <div class='header'>
                            <h2>New Career Application</h2>
                        </div>
                        <div class='content'>
                           <p><strong>Name:</strong> {$name}</p>
                            <p><strong>Email:</strong> {$email}</p>
                            <p><strong>Phone:</strong> {$phone_1}</p>
                            <p><strong>Position:</strong> {$position}</p>
                            <p><strong>Message:</strong><br>{$message}</p>
                            <p>Resume is attached.</p>
                        </div>
                        <div class='footer'>
                        
                            <a href='mailto:$email' class='button'>Reply to Inquiry</a>
                        </div>
                    </div>
                </body>
                </html>
                ";
        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Your application has been submitted successfully!']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Application submitted, but email failed: ' . $mail->ErrorInfo]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to submit application']);
}

$stmt->close();
$conn->close();
?>
