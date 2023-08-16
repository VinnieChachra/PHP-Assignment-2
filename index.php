<?php
include 'db.php';

// Signup
if (isset($_POST['signup'])) {
    $email = $_POST['signup_email'];
    $password = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error creating account.";
    }
}

// Signin
if (isset($_POST['signin'])) {
    $email = $_POST['signin_email'];
    $password = $_POST['signin_password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $user['email'];
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up & Sign In</title>
</head>
<body>
    <!-- Signup Form -->
    <form action="index.php" method="post">
        <h2>Sign Up</h2>
        <label>Email:</label>
        <input type="email" name="signup_email" required>

        <label>Password:</label>
        <input type="password" name="signup_password" required>

        <input type="submit" name="signup" value="Sign Up">
    </form>

    <!-- Signin Form -->
    <form action="index.php" method="post">
        <h2>Sign In</h2>
        <label>Email:</label>
        <input type="email" name="signin_email" required>

        <label>Password:</label>
        <input type="password" name="signin_password" required>

        <input type="submit" name="signin" value="Sign In">
    </form>
</body>
</html>
