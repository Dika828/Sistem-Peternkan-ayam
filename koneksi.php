<?php
$conn = mysqli_connect("localhost", "root", "", "peternakan_ayam");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
    
}
?>