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
    $phone_number = trim($_POST['PhoneNumber']);
    $message = trim($_POST['Message']);
    $hear_about_us = trim($_POST['hear_about_us'] ?? '');
    $hear_about_us_other = trim($_POST['hear_about_us_other'] ?? '');
     // Final source
   $hear_source = ($hear_about_us === "Other") ? $hear_about_us_other : $hear_about_us;

    // Validate fields
    if (empty($inquiry_type)) { echo "Please select an inquiry type."; exit; }
    if (empty($hear_source)) {
        echo "Please specify how you heard about us.";
        exit;
    }
    if (empty($full_name)) { echo "Full Name is required."; exit; }
    elseif (!preg_match("/^[a-zA-Z ]+$/", $full_name)) { echo "Full Name must contain only letters and spaces."; exit; }
    if (empty($company_name)) { echo "Company Name is required."; exit; }
    if (empty($email)) { echo "Email Address is required."; exit; }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "Invalid Email Address format."; exit; }
if (empty($phone_number)) {
    echo "Phone Number is required.";
    exit;
} elseif (!preg_match('/^\+(\d{1,4})\s?(\d{4,14})$/', $phone_number, $matches)) {
    echo "Invalid Phone Number format. Must start with +CountryCode and number.";
    exit;
} else {
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
            // If the number part length is incorrect, show this error
            echo "Phone number too long for +$country_code. Expected $expected_length digits only.";
            exit;
        }
    } else {
        // If the country code is not found in the array, validate based on general length
        if (strlen($number_part) < 6 || strlen($number_part) > 14) {
            echo "Invalid Phone Number length. Number should be between 6 and 14 digits.";
            exit;
        }
    }
}

    if (empty($message)) { echo "Message field cannot be empty."; exit; }
    
   


    // Sanitize inputs
    $inquiry_type = mysqli_real_escape_string($conn, $inquiry_type);
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $company_name = mysqli_real_escape_string($conn, $company_name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone_number = mysqli_real_escape_string($conn, $phone_number);
    $message = mysqli_real_escape_string($conn, $message);
    $hear_source  = mysqli_real_escape_string($conn, $hear_source);
    // Insert into database
    $sql = "INSERT INTO contact_inquiries (inquiry_type, full_name, company_name, email, phone_number, message, hear_about_us)
            VALUES ('$inquiry_type', '$full_name', '$company_name', '$email', '$phone_number', '$message','$hear_source')";

    if ($conn->query($sql) === TRUE) {
        // Define missing variables
        $from_name = "Packfora Contact Form";     // Sender Name
        $to_email = "shirin@sda-zone.com";   // Receiver Email

        $mail = new PHPMailer(true);

        try {
            // SMTP settings
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
                            <p><strong>Phone Number:</strong> $phone_number</p>
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
            echo "Thank you for contacting us! We will get back to you shortly.";

        } catch (Exception $e) {
            echo "Form submitted but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo "Database error: " . $conn->error;
    }
}

$conn->close();
?>
