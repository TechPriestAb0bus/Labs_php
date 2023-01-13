<?php
session_start();
if (isset($_SESSION['user'])) {

}
else {
    header('location: index.php');
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
    <form>
        <h2>Name: <?= $_SESSION['user']['full_name'] ?></h2>
        <h2>id: <?= $_SESSION['user']['id'] ?></h2>
        <h2>email: <?= $_SESSION['user']['email'] ?></h2>
        <a href="config/logout.php" class="logout">Выход</a>
    </form>
</body>
</html>
