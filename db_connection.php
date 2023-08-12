<?php
// Replace with your database connection details
$host = "172.31.22.43";
$dbname = "Vinnie200547583";
$username = "Vinnie200547583";
$password = "rieqMag-x1";

// Create a database connection
$db = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>
