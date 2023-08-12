<?php
// Include the database connection file
require_once "db_connection.php";

// Sample user data
$username = "sample_user";
$email = "sample@example.com";
$password = password_hash("sample_password", PASSWORD_DEFAULT); // Hash the password

// Prepare the SQL statement for insertion
$stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

// Execute the prepared statement with the user data
$stmt->execute([$username, $email, $password]);

// Output success message
echo "Data inserted successfully";
?>
