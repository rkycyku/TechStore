<?php
require('../CRUD/userCRUD.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $userCRUD = new userCRUD();
    $userCRUD->setUsername($_POST['username']);
    $kontrolloUser = $userCRUD->kontrolloUser();


    if ($kontrolloUser == true) {
        $userCRUD->setPassword($_POST['password']);
        $kontrolloLlogarin = $userCRUD->kontrolloLlogarin();

        if ($kontrolloLlogarin == true) {
            $_SESSION['name'] = $kontrolloLlogarin['username'];
            $_SESSION['aksesi'] = $kontrolloLlogarin['aksesi'];
            $_SESSION['userID'] = $kontrolloLlogarin['userID'];
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