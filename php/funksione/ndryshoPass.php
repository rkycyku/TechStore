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

if (isset($_POST['perditPass'])) {
    if ($_POST['oldPass'] == $perdoruesi['password']) {
        $userCRUD->setPassword($_POST['newPass']);

        $userCRUD->perditesoFjalekalimin();

        $_SESSION['teDhenatUPerditesuan'] = true;
        if ($_SESSION['aksesi'] != 0) {
            echo '<script>document.location="../admin/adminDashboard.php"</script>';
        } else {
            echo '<script>document.location="../userPages/userDashboard.php"</script>';
        }
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
    <title>Perditesimi i Password | Tech Store</title>
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
        <form name="ndryshoPass" onsubmit="" action='' method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['passGabim'])) {
                echo '
                <div class="mesazhiGabimStyle">
                  <h3>Passwordi juaj eshte Gabim!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
                ';
            }

            ?>
            <h1 class="form-title">Perditesimi i Password </h1>
            <label for="">
                <strong>ID Juaj: </strong>
                <?php echo $perdoruesi['userID'] ?>
            </label>
            <label for="">
                <strong>Username: </strong>
                <?php echo $perdoruesi['username'] ?>
            </label>
            <label for="">
                <strong>Password i Ri: </strong>
                <input type="password" placeholder="Shkruani passwordin!" name="newPass">
            </label>
            <label for="">
                <strong>Password Aktual: </strong>
                <input type="password" placeholder="Shkruani passwordin!" name="oldPass">
            </label>
            <input class="button" type="submit" value="Perditesoni Password" name='perditPass'>
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