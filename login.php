<?php
session_start();
require_once "db_connection.php";

// Get user input from form
$username = $_POST['loginUsername'];
$password = $_POST['loginPassword'];

// Retrieve user data from the database
$stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Verify password
if ($user && password_verify($password, $user['password'])) {
    // Start session and set user ID
    $_SESSION['user_id'] = $user['id'];
    $username = $user['username'];
    $_SESSION['username'] = $username;

    header('Location: restricted_page.php');
    exit();
} else {
    // Invalid credentials, redirect back to login page
    $loginError = true;
}

?>


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
        
        <div id="login" class="tabcontent">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" required>
                
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
                
                <button type="submit">Login</button>
            </form>
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
