<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kodiZbritjesCRUD.php');

$kodiZbritjesCRUD = new kodiZbritjesCRUD();

if (isset($_GET['fshij'])) {
    $kodiZbritjesCRUD->setKodiZbritje($_GET['kodiID']);

    $kodiZbritjesCRUD->fshijKodin();

    $_SESSION['uFshiMeSukses'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Companies | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

    <?php include '../design/header.php' ?>

    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['uFshiMeSukses'])) {
            ?>
            <div class="mesazhiSuksesStyle">
                <p>Kodi i Zbritjes u Fshi me sukses!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        ?>
        <h1>Lista e Kodeve te Zbritjeve</h1>
        <table>
            <tr>
                <th>Kodi i Zbritjes</th>
                <th>ID Produktit</th>
                <th>Qmimi Zbritjes</th>
                <th>Data Krijimit</th>
                <th>Funksione</th>
            </tr>
            <?php
            $kodet = $kodiZbritjesCRUD->shfaqKodetEZbritjes();

            foreach ($kodet as $kodi) {
                ?>
                <tr>
                    <td id="kodiID_<?php echo $kodi['kodi'] ?>"><?php echo $kodi['kodi'] ?></td>
                    <td>
                        <?php echo $kodi['idProduktit'] ?>
                    </td>
                    <td>
                        <?php echo $kodi['qmimiZbritjes'] ?> €
                    </td>
                    <td>
                        <?php echo $kodi['dataKrijimit'] ?>
                    </td>
                    <td>
                        <button class="fshij"
                            onclick="fshijKodin('<?php echo $kodi['kodi'] ?>')">Fshije</button></button>
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
    function fshijKodin(kodi) {
        var kategoriaID = document.getElementById("kodiID_" + kodi).innerHTML;

        var link = "?kodiID=" + kodi + "&fshij";
        window.location.href = link;
    }
</script>

<?php
unset($_SESSION['ndryshimiSukses']);
unset($_SESSION['uFshiMeSukses']);
?>