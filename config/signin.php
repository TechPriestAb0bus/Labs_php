<?php
    session_start();
    require_once 'connect.php';
    global $connect;

    $login = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full name'],
            "email" => $user['email']
        ];

        header('location: ../profile.php');
    }
    else {
        $_SESSION['message'] = "Wrong login or password!";
        header('Location: ../index.php');
    }