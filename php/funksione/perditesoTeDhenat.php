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
        <form name="perditesoTeDhenat" onsubmit="return validimiPerditesoTeDhenat()" method="POST"
            enctype="multipart/form-data">
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
            <table>
                <tr>
                    <td><strong>Username: </strong></td>
                    <td>
                        <?php echo $perdoruesi['username'] ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>Emri:</strong></td>
                    <td>
                        <input type="text" name="emri" value="<?php echo $perdoruesi['emri'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Lastname: </strong></td>
                    <td>
                        <input type="text" name="mbiemri" value="<?php echo $perdoruesi['mbiemri'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Email: </strong></td>
                    <td>
                        <input type="email" name="email" value="<?php echo $perdoruesi['email'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Nr Kontaktit: </strong></td>
                    <td>
                        <input type="text" name="nrKontaktit" value="<?php echo $perdoruesi['nrKontaktit'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Qyteti: </strong></td>
                    <td>
                        <input type="text" name="qyteti" value="<?php echo $perdoruesi['qyteti'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Zip Kodi: </strong></td>
                    <td>
                        <input type="text" name="zipKodi" value="<?php echo $perdoruesi['zipKodi'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Adresa: </strong></td>
                    <td>
                        <input type="text" name="adresa" value="<?php echo $perdoruesi['adresa'] ?>">
                    </td>
                </tr>
                <tr>
                    <td><strong>Password: </strong></td>
                    <td>
                        <input type="password" placeholder="Shkruani passwordin!" name="pass">
                    </td>
                </tr>
            </table>
            <div>
                <input class="button" type="submit" value="Perditeso te Dhenat" name='perditDhenat'>
                <input class="button" onclick="window.location='../userPages/userDashboard.php'" type="button" value="Anulo" name='anulo' >
            </div>
        </form>
    </div>

</body>

</html>
<?php
include_once('../funksione/importimiScriptave.php');
unset($_SESSION['passGabim']);
?>