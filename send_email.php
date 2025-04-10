<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $regno = $_POST['regno'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $event = $_POST['event'];
    $club = $_POST['club'];

    $mail = new PHPMailer(true);
    
    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'madhanraj06082005@gmail.com'; // Replace with your Gmail
        $mail->Password = 'zbgr hgqd dzbi inyw';  // Replace with your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Details
        $mail->setFrom('your-email@gmail.com', 'Event Registration Team'); 
        $mail->addAddress($email, $name); 
        
        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "Registration Confirmation - $event";
        $mail->Body = "
            <h2>Hello $name,</h2>
            <p>Thank you for registering for <b>$event</b> under the <b>$club</b> club.</p>
            <p><strong>Your Details:</strong></p>
            <ul>
                <li>Department: $dept</li>
                <li>Year: $year</li>
                <li>Register No: $regno</li>
                <li>Email: $email</li>
                <li>Mobile: $mobile</li>
            </ul>
            <p>We look forward to seeing you at the event!</p>
            <br>
            <p>Best Regards,<br><strong>Event Registration Team</strong></p>
        ";

        // Send the email
        $mail->send();
        echo "<script>alert('Registration Successful! A confirmation email has been sent.'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Registration successful, but email could not be sent.'); window.location.href='index.html';</script>";
    }
}
?>
