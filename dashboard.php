<?php
include 'db.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

echo "Welcome " . $_SESSION['email'];
echo '<a href="logout.php">Logout</a>';
?>
