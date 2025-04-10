<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php'; // Include your database connection

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Corrected require paths (since PHPMailer-master is in the same directory as register.php)
require __DIR__ . '/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $dept = trim($_POST['dept']);
    $year = trim($_POST['year']);
    $regno = trim($_POST['regno']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $event = trim($_POST['event']);
    $club = trim($_POST['club']);

    // Insert data into the database
    $sql = "INSERT INTO registrations (name, dept, year, regno, email, mobile, event, club) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisssss", $name, $dept, $year, $regno, $email, $mobile, $event, $club);

    if ($stmt->execute()) {
        // Email confirmation using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'madhanraj06082005@gmail.com';  // Your Gmail
            $mail->Password = 'zbgr hgqd dzbi inyw';  // Your App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('your-email@gmail.com', 'Event Registration Team');
            $mail->addAddress($email, $name);
            $mail->isHTML(true);
            $mail->Subject = "Registration Confirmed for $event";

            $mail->Body = "
                <h2>Hi $name!</h2>
                <p>Thanks for registering for <strong>$event</strong> under the <strong>$club</strong> club.</p>
                <p><strong>Your Details:</strong></p>
                <ul>
                    <li>Department: $dept</li>
                    <li>Year: $year</li>
                    <li>Register Number: $regno</li>
                    <li>Mobile: $mobile</li>
                    <li>Email: $email</li>
                </ul>
                <p>We’re excited to see you at the event! 🎉</p>
                <br><p>– Intellexa Event Team</p>
            ";

            $mail->send();

            // Redirect to a success page after registration and email confirmation
            header("Location: success.php");
            exit();
        } catch (Exception $e) {
            echo "Registration saved, but email not sent. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
