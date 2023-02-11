<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['aksesi'] == 0) {
    if ($_GET['userID'] != $_SESSION['userID']) {
        echo '<script>document.location="../userPages/userDashboard.php"</script>';
    }
}

require_once('../CRUD/userCRUD.php');
$userCRUD = new userCRUD();

$userCRUD->setUserID($_GET['userID']);
$perdoruesi = $userCRUD->shfaqSipasID();

if (isset($_POST['perditDhenat'])) {
    if ($_POST['pass'] == $perdoruesi['password']) {
        $userCRUD->setUsername($_POST['uName']);
        $userCRUD->setEmri($_POST['emri']);
        $userCRUD->setMbiemri($_POST['mbiemri']);
        $userCRUD->setEmail($_POST['email']);
        $userCRUD->setNrKontaktit($_POST['nrKontaktit']);
        $userCRUD->setAdresa($_POST['adresa']);
        $userCRUD->setQyteti($_POST['qyteti']);
        $userCRUD->setZipKodi($_POST['zipKodi']);

        $userCRUD->perditesoTeDhenat();
        $userCRUD->perditesoAdresen();

        $_SESSION['teDhenatUPerditesuan'] = true;
        
            echo '<script>document.location="../userPages/userDashboard.php"</script>';
    } else {
        $_SESSION['passGabim'] = true;
    }
}
if (isset($_POST['anulo'])) {
    $_SESSION['teDhenatUPerditesuan'] = false;
    echo '<script>document.location="../userPages/userDashboard.php"</script>';
}
$perdoruesi = $userCRUD->shfaqSipasID();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info Update | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/forms.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
    <?php
    include '../design/header.php';
    echo '<div class="containerDashboard">';
    echo '</div>';
    ?>
    <div class="forms">
        <form name="shtoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['passGabim'])) {
                echo '
                <div class="mesazhiGabimStyle">
                  <p>Keni shkruar Passwordin gabim!</p>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
                ';
            }

            ?>
            <h1 class="form-title">Info Update </h1>
            <label for="">
                <strong>ID: </strong>
                <?php echo $perdoruesi['userID'] ?>
            </label>
            <label for="">
                <strong>Username: </strong>
                <?php echo $perdoruesi['username'] ?>
            </label>
            <label for="">
                <strong>Name: </strong>
                <input type="text" name="emri" value="<?php echo $perdoruesi['emri'] ?>">
            </label>
            <label for="">
                <strong>Lastname: </strong>
                <input type="text" name="mbiemri" value="<?php echo $perdoruesi['mbiemri'] ?>">
            </label>
            <label for="">
                <strong>Email: </strong>
                <input type="text" name="email" value="<?php echo $perdoruesi['email'] ?>">
            </label>
            <label for="">
                <strong>Nr Kontaktit: </strong>
                <input type="text" name="nrKontaktit" value="<?php echo $perdoruesi['nrKontaktit'] ?>">
            </label>
            <label for="">
                <strong>Qyteti: </strong>
                <input type="text" name="qyteti" value="<?php echo $perdoruesi['qyteti'] ?>">
            </label>
            <label for="">
                <strong>Zip Kodi: </strong>
                <input type="text" name="zipKodi" value="<?php echo $perdoruesi['zipKodi'] ?>">
            </label>
            <label for="">
                <strong>Adresa: </strong>
                <input type="text" name="adresa" value="<?php echo $perdoruesi['adresa'] ?>">
            </label>
            <label for="">
                <strong>Password: </strong>
                <input type="password" placeholder="Shkruani passwordin!" name="pass">
            </label>
            <input class="button" type="submit" value="Perditeso te Dhenat" name='perditDhenat'>
            <input class="button" type="submit" value="Anulo" name='anulo'>
        </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>
<?php
unset($_SESSION['passGabim']);
?>