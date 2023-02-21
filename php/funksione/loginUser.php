<?php
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUsername($_POST['username']);
    $kontrolloUser = $userCRUD->kontrolloLlogarin();


    if ($kontrolloUser == true) {
        $kontrolloPass = password_verify($_POST['password'], $kontrolloUser['password']);

        if ($kontrolloPass == true) {
            $_SESSION['aksesi'] = $kontrolloUser['aksesi'];
            $_SESSION['userID'] = $kontrolloUser['userID'];
            $_SESSION['name'] = $kontrolloUser['emri'];
            $_SESSION['mbiemri'] = $kontrolloUser['mbiemri'];
            $_SESSION['email'] = $kontrolloUser['email'];
            echo "<script>document.location='../pages/index.php'</script>";
        } else {
            $_SESSION['passGabim'] = true;
            echo "<script>document.location='../pages/login.php'</script>";
        }
    } else {
        $_SESSION['uNameGabim'] = true;
        echo "<script>document.location='../pages/login.php'</script>";
    }
}
?>