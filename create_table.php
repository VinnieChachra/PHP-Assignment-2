<?php
// Include the database connection file
require_once "db_connection.php";

// SQL query to create a table named 'users'
$sql = "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

// Check if the query executed successfully
if ($conn->query($sql) == TRUE) {
    echo "Table 'users' created successfully."; // Output success message
} else {
    echo "Error creating table: " . $conn->error; // Output error message if table creation fails
}

// Close the database connection
$conn->close();
?>
