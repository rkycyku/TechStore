<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["shportaBlerjes"]) || $_SESSION["shportaBlerjes"] == null) {
    echo '<script>document.location="./shporta.php"</script>';
}
if (!isset($_SESSION['userID'])) {
    echo '<script>document.location="../pages/login.php"</script>';
    $_SESSION['nukJeLogin'] = true;
}

include_once '../CRUD/kodiZbritjesCRUD.php';
include_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();
$kodiZbritjesCRUD = new kodiZbritjesCRUD();

$userCRUD->setUserID($_SESSION['userID']);
$teDhenatKlientit = $userCRUD->shfaqSipasID();
$total = 0;
$nentotali = 0;
$produktetNeShport = array_column($_SESSION["shportaBlerjes"], "produktiID");

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {
    $total = $total + ($values["sasia"] * $values["qmimiProduktit"]);
    $nentotali = $total;
}

if (isset($_POST['kodiZbritjes'])) {
    $kodiZbritjesCRUD->setKodiZbritje($_POST['kodiAplikuar']);
    $kontrolloKodin = $kodiZbritjesCRUD->kontrolloKodin();

    if ($kontrolloKodin == true) {
        if ($kontrolloKodin['idProduktit'] == null) {
            $nentotali = $total;
            $total = $total - $kontrolloKodin['qmimiZbritjes'];

            $_SESSION['qmimiZbritur'] = $kontrolloKodin['qmimiZbritjes'];
            $_SESSION['kodiZbritjes'] = $_POST['kodiAplikuar'];

            $_SESSION['zbritjaUAplikua'] = true;
        } else {
            if (in_array($kontrolloKodin['idProduktit'], $produktetNeShport)) {
                $nentotali = $total;
                $total = $total - $kontrolloKodin['qmimiZbritjes'];

                $_SESSION['qmimiZbritur'] = $kontrolloKodin['qmimiZbritjes'];
                $_SESSION['kodiZbritjes'] = $_POST['kodiAplikuar'];

                $_SESSION['zbritjaUAplikua'] = true;
            } else {
                $_SESSION['produktiGabuar'] = true;
            }
        }
    } else {
        $_SESSION['kodiGabim'] = true;
    }

}

if (isset($_POST['complete'])) {
    $_SESSION['complete'] = true;
    $kodiZbritjesCRUD->setKodiZbritje($_SESSION['kodiZbritjes']);
    $kontrolloKodin = $kodiZbritjesCRUD->kontrolloKodin();

    if ($kontrolloKodin == true && $kontrolloKodin['idProduktit'] == null) {
        $kodiZbritjesCRUD->fshijKodin();
    }
    echo '<script>document.location="../funksione/orderComplete.php"</script>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checkout | TechStore</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css">
    <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>
    <?php include('../design/header.php'); ?>
    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['produktiGabuar'])) {
            ?>
            <div class="mesazhiGabimStyle">
                <p>Ky kod nuk vlene per produktet ne shporten tuaj!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        if (isset($_SESSION['kodiGabim'])) {
            ?>
            <div class="mesazhiGabimStyle">
                <p>Ky kod nuk egziston!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        if (isset($_SESSION['zbritjaUAplikua'])) {
            ?>
            <div class="mesazhiSuksesStyle">
                <p>Zbritja u aplikua!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        ?>
        <h1>Konfirmimi Porosis</h1>

        <table>
            <tr>
                <th colspan="2" style="text-align:center;text-transform: uppercase;">Te dhenat e Transportit</th>
            </tr>
            <h2></h2>
            <tr>
                <th>Klienti</th>
                <td>
                    <?php echo ucfirst($teDhenatKlientit["emri"]) . " " . ucfirst($teDhenatKlientit["mbiemri"]); ?>
                </td>
            </tr>
            <tr>
                <th>Adresa</th>
                <td id='adresa'>
                    <?php echo $teDhenatKlientit["adresa"]; ?>
                </td>
            </tr>
            <tr>
                <th>Qyteti</th>
                <td id='qyteti'>
                    <?php if ($teDhenatKlientit["qyteti"] != null) {
                        echo $teDhenatKlientit["qyteti"] . ', ' . $teDhenatKlientit["zipKodi"];
                    } ?>
                </td>
            </tr>
            <tr>
                <th>Numri Kontaktues</th>
                <td id='nrKontaktit'>
                    <?php echo $teDhenatKlientit["nrKontaktit"]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <a href="../funksione/perditesoTeDhenat.php?userID=<?php echo $_SESSION['userID'] ?>">
                        <button class="button">
                            Perditeso te Dhenat
                        </button>
                    </a>
                </td>
            </tr>
            <?php if (isset($_SESSION['qmimiZbritur'])) {
                ?>
                <tr>
                    <th>Nentotali:</th>
                    <td>
                        <?php echo number_format($nentotali, 2); ?> €
                    </td>
                </tr>
                <tr>
                    <th>Qmimi Zbritjes:</th>
                    <td>
                        -
                        <?php echo $_SESSION['qmimiZbritur']; ?> €
                    </td>
                </tr>
                <tr>
                    <th>Totali i Pergjithshem:</th>
                    <td>
                        <strong>
                            <?php echo number_format($total, 2); ?> €
                        </strong>
                    </td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <th>Totali i Pergjithshem:</th>
                    <td>
                        <strong>
                            <?php echo number_format($total, 2); ?> €
                        </strong>
                    </td>
                </tr>
                <?php
            } ?>
            <form onsubmit="return kontrolloTeDhenat();" action="" method="POST">
                <input type="hidden" name="qmimiTot" value="<?php echo number_format($total, 2); ?>">
                <tr>
                    <th>Pagesa:</th>
                    <td>Paguaj pas Pranimit te Produktit</td>
                </tr>
                <tr>
                    <th>Transporti:</th>
                    <td>Transport Normal - Pa Pagese</td>
                </tr>
                <?php if (!isset($_SESSION['qmimiZbritur'])) {
                    ?>
                    <tr>
                        <th>Kodi Zbritjes:</th>
                        <td><input name='kodiAplikuar' type="text" placeholder="Gift Card ose Kodi Promocional"></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <?php if (!isset($_SESSION['qmimiZbritur'])) {
                        ?>
                        <td style="text-align:center;">
                            <input class="button" name='kodiZbritjes' type="submit" value="Apliko Kodin">
                        </td>
                        <td style="text-align:center;">
                            <input class="button" name='complete' type="submit" value="Perfundo Porosin">
                        </td>
                        <?php
                    } else {
                        ?>
                        <td colspan=2 style="text-align:center;">
                            <input class="button" name='complete' type="submit" value="Perfundo Porosin">
                        </td>
                        <?php
                    }
                    ?>

                </tr>
            </form>
        </table>
    </div>
    <?php include_once('../design/footer.php'); ?>
</body>

</html>

<script>
    function kontrolloTeDhenat() {
        var adresa = document.getElementById('adresa').innerHTML;
        var qyteti = document.getElementById('qyteti').innerHTML;
        var nrKontaktit = document.getElementById('nrKontaktit').innerHTML;
        if (adresa.replace(/\s/g, "") == "" || qyteti.replace(/\s/g, "") == "" || nrKontaktit.replace(/\s/g, "") == "") {
            alert("Ju lutemi te editoni te dhenat e juaja pasi qe kerkohen per dorezim nga posta!")
            return false;
        }
        return true;
    }
</script>


<?php

unset($_SESSION['zbritjaUAplikua']);
unset($_SESSION['kodiGabim']);
unset($_SESSION['produktiGabuar']);
?>