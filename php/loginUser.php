<?php
require('./CRUD/userCRUD.php');

if(!isset($_SESSION) || empty($_SESSION)){
    session_start();
}

if(isset($_POST['login'])){
    $userCRUD = new userCRUD();
    $userCRUD->setUsername($_POST['username']);
    $userCRUD->setPassword($_POST['password']);
    $teDhenat = $userCRUD->lexoTeDhenat();
    

    if($teDhenat == true){
        $_SESSION['name'] = $teDhenat['username'];
        echo "<script>document.location='../index.php'</script>";
    }
    else{
        echo 'false';
    }
}
?>