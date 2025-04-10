<?php
include 'db.php'; // Reusing your existing DB connection

// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Collect form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$inquiry = $_POST['inquiry'] ?? '';
$message = $_POST['message'] ?? '';

// Basic validation (server-side fallback)
if ($name === '' || $email === '' || $inquiry === '' || $message === '') {
    echo "<script>alert('All fields are required.'); window.history.back();</script>";
    exit();
}

// Prepare & insert into DB
$stmt = $conn->prepare("INSERT INTO contact (name, email, inquiry_type, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $inquiry, $message);

if ($stmt->execute()) {
    echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
} else {
    echo "<script>alert('Failed to send message.'); window.history.back();</script>";
}

$stmt->close();
$conn->close();
?>
