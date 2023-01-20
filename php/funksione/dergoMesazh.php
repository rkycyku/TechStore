<?php
require_once('../CRUD/contactFormCRUD.php');

if(isset($_POST['dergoMSG'])){
    $cfCRUD = new contactFormCRUD();

    $cfCRUD->setEmri($_POST['name']);
    $cfCRUD->setEmail($_POST['email']);
    $cfCRUD->setMsg($_POST['msgField']);

    $cfCRUD->insertoMesazhin();

    echo '<script>document.location="../contactForm.php"</script>';
}

?>