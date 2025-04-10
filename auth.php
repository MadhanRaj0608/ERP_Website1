<?php
session_start();
include 'db.php';

$action = $_POST['action'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($action === "signup") {
    $name = $_POST['name'];

    // Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email is already registered. Please sign in instead.'); window.location.href = 'login.html';</script>";
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashed);

    if ($stmt->execute()) {
        $_SESSION['user'] = ['name' => $name, 'email' => $email];
        echo "<script>alert('Signup successful! Redirecting to dashboard...'); window.location.href = 'index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Signup failed. Please try again.'); window.location.href = 'login.html';</script>";
        exit();
    }

} else if ($action === "signin") {
    $stmt = $conn->prepare("SELECT name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name, $hash);

    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['user'] = ['name' => $name, 'email' => $email];
        echo "<script>alert('Login successful! Redirecting to dashboard...'); window.location.href = 'index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'login.html';</script>";
        exit();
    }
}
?>
