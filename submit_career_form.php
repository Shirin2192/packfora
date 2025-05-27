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
}else{
    // Extract the country code and the number part
    $country_code = $matches[1];  // Country code part (e.g., '91' for India)
    $number_part = $matches[2];   // Phone number part (digits after country code)

    // FULL Country code - expected number lengths
   $country_number_lengths = [
            '1'    => 10, // USA/Canada
            '7'    => 10, // Russia/Kazakhstan
            '20'   => 10, // Egypt
            '27'   => 9,  // South Africa
            '30'   => 10, // Greece
            '31'   => 9,  // Netherlands
            '32'   => 9,  // Belgium
            '33'   => 9,  // France
            '34'   => 9,  // Spain
            '36'   => 9,  // Hungary
            '39'   => 10, // Italy
            '40'   => 9,  // Romania
            '41'   => 9,  // Switzerland
            '43'   => 10, // Austria
            '44'   => 10, // United Kingdom
            '45'   => 8,  // Denmark
            '46'   => 9,  // Sweden
            '47'   => 8,  // Norway
            '48'   => 9,  // Poland
            '49'   => 10, // Germany
            '51'   => 9,  // Peru
            '52'   => 10, // Mexico
            '53'   => 8,  // Cuba
            '54'   => 10, // Argentina
            '55'   => 10, // Brazil
            '56'   => 9,  // Chile
            '57'   => 10, // Colombia
            '58'   => 10, // Venezuela
            '60'   => 9,  // Malaysia
            '61'   => 9,  // Australia
            '62'   => 10, // Indonesia
            '63'   => 10, // Philippines
            '64'   => 9,  // New Zealand
            '65'   => 8,  // Singapore
            '66'   => 9,  // Thailand
            '81'   => 10, // Japan
            '82'   => 9,  // South Korea
            '84'   => 9,  // Vietnam
            '86'   => 11, // China
            '90'   => 10, // Turkey
            '91'   => 10, // India
            '92'   => 10, // Pakistan
            '93'   => 9,  // Afghanistan
            '94'   => 9,  // Sri Lanka
            '95'   => 9,  // Myanmar
            '98'   => 10, // Iran
            '211'  => 9,  // South Sudan
            '212'  => 9,  // Morocco
            '213'  => 9,  // Algeria
            '216'  => 8,  // Tunisia
            '218'  => 9,  // Libya
            '220'  => 7,  // Gambia
            '221'  => 9,  // Senegal
            '222'  => 8,  // Mauritania
            '223'  => 8,  // Mali
            '224'  => 9,  // Guinea
            '225'  => 8,  // Ivory Coast
            '226'  => 8,  // Burkina Faso
            '227'  => 8,  // Niger
            '228'  => 8,  // Togo
            '229'  => 8,  // Benin
            '230'  => 7,  // Mauritius
            '231'  => 7,  // Liberia
            '232'  => 8,  // Sierra Leone
            '233'  => 9,  // Ghana
            '234'  => 10, // Nigeria
            '235'  => 8,  // Chad
            '236'  => 8,  // Central African Republic
            '237'  => 9,  // Cameroon
            '238'  => 7,  // Cape Verde
            '239'  => 7,  // Sao Tome and Principe
            '240'  => 9,  // Equatorial Guinea
            '241'  => 7,  // Gabon
            '242'  => 9,  // Congo
            '243'  => 9,  // DRC Congo
            '244'  => 9,  // Angola
            '245'  => 7,  // Guinea-Bissau
            '246'  => 7,  // British Indian Ocean Territory
            '248'  => 7,  // Seychelles
            '249'  => 9,  // Sudan
            '250'  => 9,  // Rwanda
            '251'  => 9,  // Ethiopia
            '252'  => 8,  // Somalia
            '253'  => 8,  // Djibouti
            '254'  => 9,  // Kenya
            '255'  => 9,  // Tanzania
            '256'  => 9,  // Uganda
            '257'  => 8,  // Burundi
            '258'  => 9,  // Mozambique
            '260'  => 9,  // Zambia
            '261'  => 9,  // Madagascar
            '263'  => 9,  // Zimbabwe
            '264'  => 9,  // Namibia
            '265'  => 8,  // Malawi
            '266'  => 8,  // Lesotho
            '267'  => 8,  // Botswana
            '268'  => 8,  // Swaziland
            '269'  => 7,  // Comoros
            '290'  => 5,  // Saint Helena
            '291'  => 7,  // Eritrea
            '297'  => 7,  // Aruba
            '298'  => 6,  // Faroe Islands
            '299'  => 6,  // Greenland
            '350'  => 8,  // Gibraltar
            '351'  => 9,  // Portugal
            '352'  => 8,  // Luxembourg
            '353'  => 9,  // Ireland
            '354'  => 7,  // Iceland
            '355'  => 9,  // Albania
            '356'  => 8,  // Malta
            '357'  => 8,  // Cyprus
            '358'  => 9,  // Finland
            '359'  => 9,  // Bulgaria
            '370'  => 8,  // Lithuania
            '371'  => 8,  // Latvia
            '372'  => 7,  // Estonia
            '373'  => 8,  // Moldova
            '374'  => 8,  // Armenia
            '375'  => 9,  // Belarus
            '376'  => 6,  // Andorra
            '377'  => 8,  // Monaco
            '378'  => 8,  // San Marino
            '380'  => 9,  // Ukraine
            '381'  => 9,  // Serbia
            '382'  => 8,  // Montenegro
            '383'  => 8,  // Kosovo
            '385'  => 9,  // Croatia
            '386'  => 8,  // Slovenia
            '387'  => 8,  // Bosnia and Herzegovina
            '389'  => 8,  // North Macedonia
            '420'  => 9,  // Czech Republic
            '421'  => 9,  // Slovakia
            '423'  => 7,  // Liechtenstein
        ];

    // Check if country code exists in the array
    if (isset($country_number_lengths[$country_code])) {
        $expected_length = $country_number_lengths[$country_code];
        if (strlen($number_part) != $expected_length) {
                 $errors['phone'] = 'Phone number too long for +$country_code. Expected $expected_length digits only.';
        }
    } else {
        // If the country code is not found in the array, validate based on general length
        if (strlen($number_part) < 6 || strlen($number_part) > 14) {
            $errors['phone'] = "Invalid Phone Number length. Number should be between 6 and 14 digits.";
        }
    }
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
$stmt = $conn->prepare("INSERT INTO career_applications (name, email, phone, position, resume, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $position, $unique_file_name, $message);

if ($stmt->execute()) {
    // Send email with PHPMailer
    // Define missing variables
    $from_name = "Packfora Contact Form";     // Sender Name
    $to_email = "shirin@sda-zone.com";   // Receiver Email

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'eternal.herosite.pro'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'connect@sda.in.net';    
        $mail->Password   = 'c_bo*bm#)4g*';         
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

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
                            <p><strong>Phone:</strong> {$phone}</p>
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
