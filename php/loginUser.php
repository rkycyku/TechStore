<?php
require('./CRUD/userCRUD.php');

if(!isset($_SESSION) || empty($_SESSION)){
    session_start();
}

if(isset($_POST['login'])){
    $userCRUD = new userCRUD();
    $userCRUD->setUsername($_POST['username']);
    $kontrolloUser = $userCRUD->kontrolloUser();
    

    if($kontrolloUser == true){
        $userCRUD->setPassword($_POST['password']);
        $kontrolloLlogarin = $userCRUD->kontrolloLlogarin();

        if($kontrolloLlogarin == true){
            $_SESSION['name'] = $kontrolloLlogarin['username'];
            echo "<script>document.location='../index.php'</script>";
        }
        else{
            echo 'Keni shkruar passwordin gabim';
        }
    }
    else{
        echo 'Ky user nuk egziston';
    }
}
?>