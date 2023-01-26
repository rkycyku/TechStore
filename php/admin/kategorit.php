<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$kategoriaCRUD = new kategoriaCRUD();

if (isset($_GET['kategoriaID']) && isset($_GET['emriKategoris']) && isset($_GET['pershkrimiKategoris'])) {
    $kategoriaCRUD->setKategoriaID($_GET['kategoriaID']);

    $kategoria = $kategoriaCRUD->shfaqKategorinSipasID();

    $kategoriaCRUD->setKategoriaID($_GET['kategoriaID']);
    $kategoriaCRUD->setEmriKategoris($_GET['emriKategoris']);
    $kategoriaCRUD->setPershkrimiKategoris($_GET['pershkrimiKategoris']);


    $kategoriaCRUD->perditesoKategorin();

    $_SESSION['ndryshimiSukses'] = true;
}
if (isset($_GET['fshij'])) {
    $kategoriaCRUD->setKategoriaID($_GET['kategoriaID']);

    $kategoria = $kategoriaCRUD->fshijKategorinSipasID();

    $_SESSION['uFshiMeSukses'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Categories | Tech Store</title>
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
                  <p>Te dhenat e kategoris u ndryshuan!</p>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
        }
        if (isset($_SESSION['uFshiMeSukses'])) {
            echo '
                <div class="mesazhiSuksesStyle">
                  <p>Kategoria u Fshi me sukses!</p>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
        }
        ?>
        <h1>List of Categories</h1>
        <table>
            <tr>
                <th>ID Kategoris</th>
                <th>Emri Kategoris</th>
                <th>Pershkrimi Kategoris</th>
                <th>Funksione</th>
            </tr>
            <?php
            $kategorit = $kategoriaCRUD->shfaqKategorin();

            foreach ($kategorit as $kategoria) {
                echo '
            <tr>
              <td id="kategoriaID_' . $kategoria['kategoriaID'] . '">' . $kategoria['kategoriaID'] . '</td>
              <td><input id="emriKategoris_' . $kategoria['kategoriaID'] . '" type="text" placeholder="Emri i Kompanis" value="' . $kategoria['emriKategoris'] . '"></td>
              <td><input id="pershkrimiKategoris_' . $kategoria['kategoriaID'] . '" type="text" placeholder="Pershkrimi Kategoris" value="' . $kategoria['pershkrimiKategoris'] . '"></td>
              <td><button class="edito" onclick="editoKategorin(' . $kategoria['kategoriaID'] . ')">Edito</button>
              <button class="fshij" onclick=fshijKategorin(' . $kategoria['kategoriaID'] . ')>Fshije</button></td>
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
    function editoKategorin(kategoriaID) {
        var kategoriaID = document.getElementById("kategoriaID_" + kategoriaID).innerHTML;
        var emriKategoris = document.getElementById("emriKategoris_" + kategoriaID).value;
        var pershkrimiKategoris = document.getElementById("pershkrimiKategoris_" + kategoriaID).value;

        var link = "?kategoriaID=" + kategoriaID + "&emriKategoris=" + emriKategoris + "&pershkrimiKategoris=" + pershkrimiKategoris;
        window.location.href = link;
    }
    
    function fshijKategorin(kategoriaID) {
        var kategoriaID = document.getElementById("kategoriaID_" + kategoriaID).innerHTML;

        var link = "?kategoriaID=" + kategoriaID + "&fshij";
        window.location.href = link;
    }
</script>

<?php
unset($_SESSION['ndryshimiSukses']);
?>