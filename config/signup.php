<?php
    session_start();
    require_once 'connect.php';
    global $connect;

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    $check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

    if (strlen($password) < 8) {
        $_SESSION['message'] = "Password is too short!";
        header('Location: ../registration.php');
    }
    elseif (mysqli_num_rows($check_login) > 0){
        $_SESSION['message'] = "User with this login is already exist!";
        header('Location: ../registration.php');
    }
    elseif (mysqli_num_rows($check_email) > 0){
        $_SESSION['message'] = "User with this email is already exist!";
        header('Location: ../registration.php');
    }
    elseif ($password === $password_confirm) {
        $password = md5($password);
        mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`) VALUES (NULL, '$full_name', '$login', '$email', '$password')");

        $_SESSION['message'] = "Registration successful!";
        header('location: ../index.php');
    }
    else {
        $_SESSION['message'] = "Passwords don't match!";
        header('Location: ../registration.php');
    }
