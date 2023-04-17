<?php 

require "../includes/app.php";

$email = "hola@susanafotografia.com";
$pass1 = "123456";
$pass = password_hash($pass1, PASSWORD_DEFAULT);
$query = "INSERT INTO users (email, password, admin, isVerified, ressToken) VALUES ('$email', '$pass', 1, 1, 'none')";

// $db->query($query);
?>