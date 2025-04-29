<?php
include 'config.php';


$username = 'admin';
$password = 'adminpassword';  
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password) VALUES ('$username', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    echo "New admin account created successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>
