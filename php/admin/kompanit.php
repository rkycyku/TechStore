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
    <title>Kompanit | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

    <?php include '../design/header.php' ?>

    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['ndryshimiSukses'])) {
            echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Te dhenat e kompanis u ndryshuan!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
        }
        if (isset($_SESSION['uFshiMeSukses'])) {
            echo '
                <div class="mesazhiSuksesStyle">
                  <h3>Kategoria u Fshi me sukses!</h3>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
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
                echo '
            <tr>
              <td id="kompaniaID_' . $kompanit['kompaniaID'] . '">' . $kompanit['kompaniaID'] . '</td>
              <td><input id="emriKompanis_' . $kompanit['kompaniaID'] . '" type="text" placeholder="Emri i Kompanis" value="' . $kompanit['emriKompanis'] . '"></td>
              <td><img src="../../img/slider/sliderIcons/' . $kompanit['kompaniaLogo'] . '"></td>
              <td><input id="adresaKompanis_' . $kompanit['kompaniaID'] . '" type="text" placeholder="Adresa Kompanis" value="' . $kompanit['adresaKompanis'] . '"></td>
              <td><button class="edito" onclick="editoKompanin(' . $kompanit['kompaniaID'] . ')">Edito</button>
              <button class="fshij" onclick="fshijKompanin(' . $kompanit['kompaniaID'] . ')">Fshije</button>
              <button class="edito"><a href="../userPages/porosit.php?userID=' . $kompanit['kompaniaID'] . '">Ndrysho Foton</a></button></td>
            </tr>';

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
        var kompaniaID = document.getElementById("kompaniaID_" + kompaniaID).innerHTML;
        var emriKompanis = document.getElementById("emriKompanis_" + kompaniaID).value;
        var adresaKompanis = document.getElementById("adresaKompanis_" + kompaniaID).value;

        var link = "?kompaniaID=" + kompaniaID + "&emriKompanis=" + emriKompanis + "&adresaKompanis=" + adresaKompanis;
        window.location.href = link;
    }
    function fshijKompanin(kompaniaID){
        var kategoriaID = document.getElementById("kompaniaID_" + kompaniaID).innerHTML;

        var link = "?kompaniaID=" + kompaniaID+"&fshij";
        window.location.href = link;
    }
</script>

<?php
unset($_SESSION['ndryshimiSukses']);
unset($_SESSION['uFshiMeSukses']);
?>