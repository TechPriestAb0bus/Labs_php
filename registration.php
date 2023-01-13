<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<form action="config/signup.php" method="post" enctype="multipart/form-data">
    <label>Name</label>
    <input type="text" name="full_name" placeholder="Enter your full name">
    <label>Login</label>
    <input type="text" name="login" placeholder="Enter login">
    <label>Email</label>
    <input type="text" name="email" placeholder="Enter your email">
    <label>Password</label>
    <input type="password" name="password" placeholder="Enter password">
    <label>Confirm password</label>
    <input type="password" name="password_confirm" placeholder="Enter password">
    <button type="submit">Create an account</button>
    <p>
        You already have an account? - <a href="index.php">Log in!</a>
    </p>
    <?php
     if (isset($_SESSION['message'])) {
        echo '<p class="error_massage">' . $_SESSION['message'] . '</p>';
    }
        unset($_SESSION['message']);
    ?>

</form>
</body>
</html>