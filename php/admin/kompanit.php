<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kompaniaCRUD.php');

$kompaniaCRUD = new kompaniaCRUD();

if (isset($_GET['kompaniaID']) && isset($_GET['emriKompanis']) && isset($_GET['adresaKompanis'])) {
    $kompaniaCRUD = new kompaniaCRUD();
    $kompaniaCRUD->setKompaniaID($_GET['kompaniaID']);

    $kompania = $kompaniaCRUD->shfaqKompaninSipasID();

    $kompaniaCRUD->setKompaniaID($_GET['kompaniaID']);
    $kompaniaCRUD->setEmriKompanis($_GET['emriKompanis']);
    $kompaniaCRUD->setAdresaKompanis($_GET['adresaKompanis']);


    $kompaniaCRUD->perditesoKompanin();

    $_SESSION['ndryshimiSukses'] = true;

}
if (isset($_GET['fshij'])) {
    $kompaniaCRUD->setKompaniaID($_GET['kompaniaID']);

    $kompaniaCRUD->fshijKompanin();

    $_SESSION['uFshiMeSukses'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kompanit Partnere | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

    <?php include '../design/header.php' ?>

    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['ndryshimiSukses'])) {
            ?>
            <div class="mesazhiStyle mesazhiSuksesStyle">
                <p>Te dhenat e kompanis u ndryshuan!</p>
                <button id="mbyllMesazhin">
                    <i class="fa-solid">&#xf00d;</i>
                </button>
            </div>
            <?php
        }
        if (isset($_SESSION['uFshiMeSukses'])) {
            ?>
            <div class="mesazhiStyle mesazhiSuksesStyle">
                <p>Kompania u Fshi me sukses!</p>
                <button id="mbyllMesazhin">
                    <i class="fa-solid">&#xf00d;</i>
                </button>
            </div>
            <?php
        }
        ?>
        <h1>Lista e Kompanive Partnere</h1>
        <table>
            <tr>
                <th>ID Kompanis</th>
                <th>Emri Kompanis</th>
                <th>Logo Kompanis</th>
                <th>Adresa Kompanis</th>
                <th>Funksione</th>
            </tr>
            <?php
            $kompanit = $kompaniaCRUD->shfaqKompanin();

            foreach ($kompanit as $kompanit) {
                ?>
                <tr>
                    <td id="kompaniaID_<?php echo $kompanit['kompaniaID'] ?>"><?php echo $kompanit['kompaniaID'] ?></td>
                    <td><input id="emriKompanis_<?php echo $kompanit['kompaniaID'] ?>" type="text"
                            placeholder="Emri i Kompanis" value="<?php echo $kompanit['emriKompanis'] ?>"></td>
                    <td><img src="../../img/slider/sliderIcons/<?php echo $kompanit['kompaniaLogo'] ?>"></td>
                    <td><input id="adresaKompanis_<?php echo $kompanit['kompaniaID'] ?>" type="text"
                            placeholder="Adresa Kompanis" value="<?php echo $kompanit['adresaKompanis'] ?>"></td>
                    <td><button class="edito" onclick="editoKompanin(<?php echo $kompanit['kompaniaID'] ?>)"><i
                                class="fa-regular">&#xf044;</i></button>
                        <?php
                        if ($_SESSION['aksesi'] == 2) {
                            ?>
                            <button class="fshij" onclick="fshijKompanin(<?php echo $kompanit['kompaniaID'] ?>)"><i
                                    class="fa-regular">&#xf2ed;</i></button></button>

                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php

            }
            ?>
            </th>
        </table>
    </div>

    <?php
    include '../design/footer.php';
    include('../funksione/importimiScriptave.php') ?>
</body>

</html>

<script>
    function editoKompanin(kompaniaID) {
        var emriKompanis = document.getElementById("emriKompanis_" + kompaniaID).value;
        var adresaKompanis = document.getElementById("adresaKompanis_" + kompaniaID).value;

        var link = "?kompaniaID=" + kompaniaID + "&emriKompanis=" + emriKompanis + "&adresaKompanis=" + adresaKompanis;
        window.location.href = link;
    }
    function fshijKompanin(kompaniaID) {

        var link = "?kompaniaID=" + kompaniaID + "&fshij";
        window.location.href = link;
    }
</script>

<?php
unset($_SESSION['ndryshimiSukses']);
unset($_SESSION['uFshiMeSukses']);
?>