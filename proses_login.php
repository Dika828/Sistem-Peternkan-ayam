<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

$data = mysqli_num_rows($query);

if ($data > 0) {
    $_SESSION['username'] = $username;
    header("Location: index.php");
} else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
}
?>