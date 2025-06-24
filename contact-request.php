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
        $response['errors']['phone'] = 'Phone Number is required.';
    }else{
        switch ($country_code) {
            case '+91': // India
                if (!preg_match('/^[6-9]\d{9}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a valid 10-digit Indian mobile number starting with 6-9.';
                }
                break;

            case '+1': // USA/Canada
                if (!preg_match('/^\d{10}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a 10-digit US/Canada number.';
                }
                break;

            case '+44': // UK
                if (!preg_match('/^\d{10,11}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a 10 or 11-digit UK number.';
                }
                break;

            case '+61': // Australia
            case '+64': // New Zealand
            case '+81': // Japan
            case '+82': // South Korea
            case '+86': // China
            case '+90': // Turkey
            case '+33': // France
            case '+49': // Germany
            case '+7':  // Russia
            case '+39': // Italy
            case '+34': // Spain
            case '+55': // Brazil
            case '+52': // Mexico
                if (!preg_match('/^\d{9,11}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a valid number of 9 to 11 digits for the selected country.';
                }
                break;

            case '+971': // UAE
            case '+973': // Bahrain
            case '+974': // Qatar
            case '+965': // Kuwait
            case '+968': // Oman
            case '+966': // Saudi Arabia
                if (!preg_match('/^\d{8,9}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter an 8 to 9-digit Gulf region number.';
                }
                break;

            case '+20': // Egypt
            case '+27': // South Africa
            case '+31': // Netherlands
            case '+32': // Belgium
            case '+36': // Hungary
            case '+41': // Switzerland
            case '+43': // Austria
            case '+45': // Denmark
            case '+46': // Sweden
            case '+47': // Norway
            case '+48': // Poland
            case '+51': // Peru
            case '+54': // Argentina
            case '+56': // Chile
            case '+57': // Colombia
            case '+60': // Malaysia
            case '+62': // Indonesia
            case '+63': // Philippines
            case '+65': // Singapore
            case '+66': // Thailand
            case '+84': // Vietnam
            case '+92': // Pakistan
            case '+94': // Sri Lanka
            case '+234': // Nigeria
                if (!preg_match('/^\d{7,11}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a valid number of 7 to 11 digits.';
                }
                break;

            // === African Nations & Others ===
            case '+211': case '+212': case '+213': case '+216': case '+218': case '+220': case '+221':
            case '+222': case '+223': case '+224': case '+225': case '+226': case '+227': case '+228':
            case '+229': case '+230': case '+231': case '+232': case '+233': case '+235': case '+236':
            case '+237': case '+238': case '+239': case '+240': case '+241': case '+242': case '+243':
            case '+244': case '+245': case '+246': case '+248': case '+249': case '+250': case '+251':
            case '+252': case '+253': case '+254': case '+255': case '+256': case '+257': case '+258':
            case '+260': case '+261': case '+263': case '+264': case '+265': case '+266': case '+267':
            case '+268': case '+269': case '+290': case '+291':
                if (!preg_match('/^\d{7,12}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a valid number of 7 to 12 digits.';
                }
                break;

            // === Europe (Others) ===
            case '+30': case '+35': case '+352': case '+353': case '+354': case '+355': case '+356':
            case '+357': case '+358': case '+359': case '+370': case '+371': case '+372': case '+373':
            case '+374': case '+375': case '+376': case '+377': case '+378': case '+380': case '+381':
            case '+382': case '+383': case '+385': case '+386': case '+387': case '+389': case '+420':
            case '+421': case '+423':
                if (!preg_match('/^\d{8,12}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Enter a valid number of 8 to 12 digits.';
                }
                break;

            default: // Fallback for any country not matched above
                if (!preg_match('/^\d{6,15}$/', $phone_number)) {
                    $response['errors']['phone'] = 'Phone number must be between 6 and 15 digits.';
                }
                break;
        }
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

