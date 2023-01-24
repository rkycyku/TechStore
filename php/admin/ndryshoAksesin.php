<?php
require_once('./kontrolloAksesAdmin.php');
require_once('../CRUD/userCRUD.php');
$userCRUD = new userCRUD();
$userCRUD->setUserID($_GET['userID']);
$useri = $userCRUD->shfaqSipasID();
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['skeAksesAdmin'])) {
    echo '<script>document.location="./perdoruesit.php"</script>';
}
if (isset($_POST['editoAksesin'])) {
    $userCRUD->setAksesi($_POST['Aksesi']);
    $userCRUD->setUserID($_GET['userID']);

    $userCRUD->editoAksesinUserit();

    $_SESSION['aksesiUPerditesua'] = true;
    echo '<script>document.location="./perdoruesit.php"</script>';
}
if (isset($_POST['anulo'])) {
    $_SESSION['ndryshimiUAnulua'] = false;
    echo '<script>document.location="./perdoruesit.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ndryshimi i Aksesit | Tech Store</title>
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
        <form name="ndryshoAksesin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
            <h1 class="form-title">Ndryshimi i Aksesit</h1>
            <label for="">
                <strong>ID Perdoruesi:</strong>
                <?php echo $useri['userID'] ?>
            </label>
            <label for="">
                <strong>Emri Perdoruesit:</strong>
                <?php echo $useri['emri'] ?>
            </label>
            <label for="">
                <strong>Mbiemri Perdoruesit:</strong>
                <?php echo $useri['mbiemri'] ?>
            </label>
            <label for="">
                <strong>Username:</strong>
                <?php echo $useri['username'] ?>
            </label>
            <label for="">
                <strong>Email:</strong>
                <?php echo $useri['email'] ?>
            </label>

            <label for="">
                <strong>Statusi i Porosis: </strong>

                <select name="Aksesi">
                    <option value="0">Perdorues i Thjesht</option>
                    <option value="1">Menagjues</option>
                    <option value="2">Administrator</option>
                    <option selected hidden value="<?php echo $useri['aksesi'] ?>">
                        <?php if ($useri['aksesi'] == 2) {
                            echo "Administrator";
                        } elseif (($useri['aksesi'] == 2)) {
                            echo "Menagjues";
                        } else {
                            echo 'Perdorues i Thjesht';
                        } ?>
                    </option>
                </select></label>
            <input class="button" type="submit" value="Editoni Aksesin" name='editoAksesin'>
            <input class="button" type="submit" value="Anulo" name='anulo'>
        </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>
<?php
?>