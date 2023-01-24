<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['aksesi'] == 0) {
    if($_GET['userID'] != $_SESSION['userID']){
        echo '<script>document.location="../userPages/userDashboard.php"</script>';
    }
}

require_once('../CRUD/userCRUD.php');
$userCRUD = new userCRUD();

$userCRUD->setUserID($_GET['userID']);
$perdoruesi = $userCRUD->shfaqSipasID();

if (isset($_POST['perditDhenat'])) {
    $userCRUD->setEmri($_POST['emri']);
    $userCRUD->setMbiemri($_POST['mbiemri']);
    $userCRUD->setEmail($_POST['email']);

    $userCRUD->perditesoTeDhenat();

    $_SESSION['teDhenatUPerditesuan'] = true;
    if($_SESSION['aksesi'] != 0){
        echo '<script>document.location="../admin/adminDashboard.php"</script>';
    }else{
        echo '<script>document.location="../userPages/userDashboard.php"</script>';
    }
}
if (isset($_POST['anulo'])) {
    $_SESSION['teDhenatUPerditesuan'] = false;
    if($_SESSION['aksesi'] != 0){
        echo '<script>document.location="../admin/adminDashboard.php"</script>';
    }else{
        echo '<script>document.location="../userPages/userDashboard.php"</script>';
    }
}
$perdoruesi = $userCRUD->shfaqSipasID();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perditesimi i te dhenave | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/forms.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
    <?php
    include '../design/headerAdmin.php';
    echo '<div class="containerDashboard">';
    echo '</div>';
    ?>
    <div class="forms">
        <form name="shtoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
            <h1 class="form-title">Perditesimi i te dhenave </h1>
            <label for="">
                <strong>ID Juaj: </strong>
                <?php echo $perdoruesi['userID'] ?>
            </label>
            <label for="">
                <strong>Username: </strong>
                <?php echo $perdoruesi['username'] ?>
            </label>
            <label for="">
                <strong>Emri: </strong>
                <input type="text" name="emri" value="<?php echo $perdoruesi['emri'] ?>">
            </label>
            <label for="">
                <strong>Mbiemri: </strong>
                <input type="text"  name="mbiemri" value="<?php echo $perdoruesi['mbiemri'] ?>">
            </label>
            <label for="">
                <strong>Email: </strong>
                <input type="text"  name="email" value="<?php echo $perdoruesi['email'] ?>">
            </label>
            <input class="button" type="submit" value="Perditesoni te dhenat" name='perditDhenat'>
            <input class="button" type="submit" value="Anulo" name='anulo'>
        </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>
<?php
?>