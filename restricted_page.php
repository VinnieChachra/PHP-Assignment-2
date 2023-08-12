<?php
session_start();
require_once "db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION["username"];
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Successfully Logged In </title>
</head>
<body>
    <!-- Your restricted page content here -->
    <h1>Welcome to the Restricted Page</h1>
    <a href="logout.php">Logout</a>
</body>
</html>