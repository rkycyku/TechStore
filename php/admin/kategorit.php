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
    <title>Kategorit e Produkteve | Tech Store</title>
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
                <p>Te dhenat e kategoris u ndryshuan!</p>
                <button id="mbyllMesazhin">
                    <i class="fa-solid">&#xf00d;</i>
                </button>
            </div>
            <?php
        }
        if (isset($_SESSION['uFshiMeSukses'])) {
            ?>
            <div class="mesazhiStyle mesazhiSuksesStyle">
                <p>Kategoria u Fshi me sukses!</p>
                <button id="mbyllMesazhin">
                    <i class="fa-solid">&#xf00d;</i>
                </button>
            </div>
            <?php
        }
        ?>
        <h1>Lista e Kategorive</h1>
        <table>
            <tr>
                <th>ID Kategoris</th>
                <th>Emri Kategoris</th>
                <th>Pershkrimi Kategoris</th>
                <th>Funksione</th>
            </tr>
            <?php
            $kategorit = $kategoriaCRUD->shfaqKategorin();

            foreach ($kategorit as $kategorit) {
                ?>
                <tr>
                    <td id="kategoriaID_<?php echo $kategorit['kategoriaID'] ?>"><?php echo $kategorit['kategoriaID'] ?>
                    </td>
                    <td><input id="emriKategoris_<?php echo $kategorit['kategoriaID'] ?>" type="text"
                            placeholder="Emri i Kategoris" value="<?php echo $kategorit['emriKategoris'] ?>"></td>
                    <td><input id="pershkrimiKategoris_<?php echo $kategorit['kategoriaID'] ?>" type="text"
                            placeholder="Detajet e Kategoris" value="<?php echo $kategorit['pershkrimiKategoris'] ?>"></td>
                    <td><button class="edito" onclick="editoKategorin(<?php echo $kategorit['kategoriaID'] ?>);"><i
                                class="fa-regular">&#xf044;</i></button>
                        <?php
                        if ($_SESSION['aksesi'] == 2) {
                            ?>
                            <button class="fshij" onclick="fshijKategorin(<?php echo $kategorit['kategoriaID'] ?>);"><i
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
    function editoKategorin(kategoriaID) {
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
unset($_SESSION['uFshiMeSukses']);
?>