<?php
// error_reporting(E_ALL);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'db_connect.php';

// Based on your folder structure
require_once 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once 'vendor/phpmailer/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inquiry_type = isset($_POST['inquiry_type']) ? trim($_POST['inquiry_type']) : null;
    $full_name = trim($_POST['FullName']);
    $company_name = trim($_POST['CompanyName']);
    $email = trim($_POST['Email']);
    $country_code = trim($_POST['country_code']);
    $phone_number = trim($_POST['PhoneNumber']);
    $message = trim($_POST['Message']);
    $hear_about_us = trim($_POST['hear_about_us'] ?? '');
    $hear_about_us_other = trim($_POST['hear_about_us_other'] ?? '');
     // Final source
   $hear_source = ($hear_about_us === "Other") ? $hear_about_us_other : $hear_about_us;

     $errors = [];

    if (empty($inquiry_type)) {
        $errors['inquiry_type'] = 'Please select an inquiry type.';
    }

    if (empty($hear_source)) {
        $errors['hear_about_us'] = 'Please specify how you heard about us.';
    }

    if (empty($full_name)) {
        $errors['FullName'] = 'Full Name is required.';
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $full_name)) {
        $errors['FullName'] = 'Full Name must contain only letters and spaces.';
    }

    if (empty($company_name)) {
        $errors['CompanyName'] = 'Company Name is required.';
    }

    if (empty($email)) {
        $errors['Email'] = 'Email Address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['Email'] = 'Invalid Email Address format.';
    }

    if (empty($phone_number)) {
        $errors['PhoneNumber'] = 'Phone Number is required.';
    } elseif (!preg_match('/^[0-9]{4,14}$/', $phone_number)) {
        $errors['PhoneNumber'] = 'Invalid phone number. Only digits (min 4, max 14).';
    }

    if (empty($message)) {
        $errors['Message'] = 'Message field cannot be empty.';
    }

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit;
    }


    // Sanitize inputs
    $inquiry_type = mysqli_real_escape_string($conn, $inquiry_type);
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $company_name = mysqli_real_escape_string($conn, $company_name);
    $email = mysqli_real_escape_string($conn, $email);
    $country_code = mysqli_real_escape_string($conn, $country_code);
    $phone_number = mysqli_real_escape_string($conn, $phone_number);
    $message = mysqli_real_escape_string($conn, $message);
    $hear_source  = mysqli_real_escape_string($conn, $hear_source);
    // Insert into database
    $phone_number_1 = $country_code.$phone_number; // Combine country code and phone number
    $sql = "INSERT INTO contact_inquiries (inquiry_type, full_name, company_name, email, phone_number, message, hear_about_us)
            VALUES ('$inquiry_type', '$full_name', '$company_name', '$email', '$phone_number_1', '$message','$hear_source')";

    if ($conn->query($sql) === TRUE) {
        // Define missing variables
        $from_name = "Packfora Contact Form";     // Sender Name
        $to_email = "moiz@sda-zone.com";   // Receiver Email

        $mail = new PHPMailer(true);

        try {
            // SMTP settings
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

            // Content
            $mail->isHTML(true);  
            $mail->Subject = "New Inquiry Received - $inquiry_type";
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
                            <h2>New Inquiry Received</h2>
                        </div>
                        <div class='content'>
                            <p><strong>Full Name:</strong> $full_name</p>
                            <p><strong>Company Name:</strong> $company_name</p>
                            <p><strong>Email:</strong> <a href='mailto:$email'>$email</a></p>
                            <p><strong>Phone Number:</strong> $phone_number_1</p>
                            <p><strong>Message:</strong> $message</p>
                        </div>
                        <div class='footer'>
                        
                            <a href='mailto:$email' class='button'>Reply to Inquiry</a>
                        </div>
                    </div>
                </body>
                </html>
                ";
            $mail->send();
            
            
        // ✅ Send Thank-You Email to User
        $mail = new PHPMailer(true); // New instance
        $mail->setFrom('connect@sda.in.net', 'Packfora Team');
        $mail->addAddress($email); // Send to user
        $mail->isHTML(true);
        $mail->Subject = "Thank You for Contacting Packfora";
        $mail->Body = "
            <html>
            <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; }
                .container { padding: 20px; background: #fff; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
                h2 { color: #21409a; }
                p { font-size: 15px; }
            </style>
            </head>
            <body>
                <div class='container'>
                    <h2>Thank You, $full_name!</h2>
                    <p>We have received your inquiry regarding <strong>$inquiry_type</strong>.</p>
                    <p>Our team will review your message and get back to you at <a href='mailto:$email'>$email</a> or call you at <strong>$phone_number_1</strong> as soon as possible.</p>
                    <p>Thank you for reaching out to <strong>Packfora</strong>.</p>
                    <p>— Team Packfora</p>
                </div>
            </body>
            </html>
        ";
        $mail->send();

            echo json_encode(['success' => true, 'message' => 'Thank you for contacting us! We will get back to you shortly.']);

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'errors' => ['general' => 'Form submitted but email could not be sent.']]);
        }

    } else {
        echo json_encode(['success' => false, 'errors' => ['general' => 'Database error: ' . $conn->error]]);
    }
}

$conn->close();
?>
