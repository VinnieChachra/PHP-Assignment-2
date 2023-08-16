<?php
$servername = "127.0.0.1";
$username = "Vinnie200547583";
$password = "rieqMag-x1";
$dbname = "Vinnie200547583";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
