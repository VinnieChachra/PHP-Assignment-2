<?php
// Start a new or resume an existing session
session_start();

// Include the database connection file
require_once "db_connection.php";

// Get user input from the signup form
$username = $_POST['signupUsername'];
$email = $_POST['signupEmail'];
$password = password_hash($_POST['signupPassword'], PASSWORD_DEFAULT);

// Insert user data into the database
$stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
if ($stmt->execute([$username, $email, $password])) {
    $userId = $db->lastInsertId(); // Get the last inserted ID
    $_SESSION['user_id'] = $userId; // Store user ID in session

    $_SESSION['username'] = $username; // Store username in session
    header('Location: restricted_page.php'); // Redirect to restricted page
    exit(); // Exit to prevent further execution
} else {
    $signupError = true; // Set error flag
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login and Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'login')">Login</button>
            <button class="tablinks" onclick="openTab(event, 'signup')">Sign Up</button>
        </div>
        <div class="background-text">
            ASSIGNMENT-2
        </div>
        
        <div id="signup" class="tabcontent">
            <h1>Sign Up</h1>
            <form action="signup.php" method="post">
                <label for="signupUsername">Username</label>
                <input type="text" id="signupUsername" name="signupUsername" required>
                
                <label for="signupEmail">Email</label>
                <input type="email" id="signupEmail" name="signupEmail" required>
                
                <label for="signupPassword">Password</label>
                <input type="password" id="signupPassword" name="signupPassword" required>
                
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
    
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>
