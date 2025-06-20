<?php
error_reporting(E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    // Get the form values
    $full_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone']);
    $service = isset($_POST['services']) ? mysqli_real_escape_string($conn, $_POST['services']) : null;  // Check if 'services' is set
    $message = mysqli_real_escape_string($conn, $_POST['message']);
// print_r($_POST);die;
    // Initialize response array
    $response = [
        'success' => false,
        'errors' => []
    ];

    // Validate Full Name
   if (empty($full_name)) {
        $response['errors']['name'] = 'Full Name is required.';
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $full_name)) {
        $response['errors']['name'] = 'Full Name must contain only letters and spaces.';
    }

    // Validate Email
    if (empty($email)) {
        $response['errors']['email'] = 'Email Address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Invalid Email Address format.';
    }

    if (empty($phone_number)) {
        $response['errors']['subject'] = 'Phone Number is required.';
    }

    // Validate Service
    if (empty($service)) {
        $response['errors']['services'] = 'Please select a service.';
    }

    // Validate Message
    if (empty($message)) {
        $response['errors']['message'] = 'Message field cannot be empty.';
    }

    // If any validation error, return immediately
    if (!empty($response['errors'])) {
        echo json_encode($response);
        exit;
    }
    // Insert data into database
    $phone_number_1 = $country_code.$phone_number; // Combine country code and phone number
    $stmt = $conn->prepare("INSERT INTO contact_requests (full_name, email, phone_number, service, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $phone_number_1, $service, $message);
    if ($stmt->execute()) {
        // Database insert success, now send email
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
            // $mail->addAddress('moiz@sda-zone.com');  // Second recipient (add your second email here)

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Request Received';
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
                            <h2>New Contact Request</h2>
                        </div>
                        <div class='content'>
                            <p><strong>Name:</strong> {$full_name}</p>
                            <p><strong>Email:</strong> {$email}</p>
                            <p><strong>Phone:</strong> {$phone_number_1}</p>
                            <p><strong>Service:</strong> {$service}</p>
                            <p><strong>Message:</strong><br>{$message}</p>
                        </div>
                        <div class='footer'>
                        
                            <a href='mailto:$email' class='button'>Reply to Inquiry</a>
                        </div>
                    </div>
                </body>
                </html>
                ";
            $mail->send();
            $response['success'] = true;
            $response['message'] = "Thank you for contacting us! We have received your request.";
        } catch (Exception $e) {
             $response['errors']['mail'] = 'Mailer Error: ' . $mail->ErrorInfo;
        }

    } else {
         $response['errors']['database'] = 'Database error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>

