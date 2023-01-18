<?php
require('./CRUD/userCRUD.php');

if(isset($_POST['submit'])){
    $user = new userCRUD();

    $user->setEmri($_POST['name']);
    $user->setMbiemri($_POST['lName']);
    $user->setUsername($_POST['uName']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);

    $user->shtoUser();
}



?>