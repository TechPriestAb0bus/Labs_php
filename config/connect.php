<?php

    $connect = mysqli_connect('127.0.0.1', 'root', '', 'users');

    if (!$connect) {
        die('Error connect to database');
    }
