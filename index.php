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
    <form action="config/signin.php" method="post">
        <label>Login</label>
        <input type="text" name="login" placeholder="Enter login">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <button type="submit">Done</button>
        <p>
            You don't have an account? - <a href="registration.php">Sign up!</a>
        </p>
        <?php
        if (isset($_SESSION['message'])) {
            if ($_SESSION['message'] === 'Registration successful!') {
                echo '<p class="success_massage">' . $_SESSION['message'] . '</p>';

            }
            else {
                echo '<p class="error_massage">' . $_SESSION['message'] . '</p>';
            }
        }
        unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>