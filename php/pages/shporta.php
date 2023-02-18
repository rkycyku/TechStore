<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['perdit'])) {
    foreach ($_SESSION['shportaBlerjes'] as $key => $produkti) {
        if ($_POST['produktiID'] == $produkti['produktiID']) {
            $_SESSION['shportaBlerjes'][$key]['sasia'] = $_POST['sasia'];
            $_SESSION['perditMeSukses'] = true;
        }
    }
}

if (isset($_POST['largo'])) {
    foreach ($_SESSION['shportaBlerjes'] as $key => $produkti) {
        if ($_POST['produktiID'] == $produkti['produktiID']) {
            unset($_SESSION["shportaBlerjes"][$key]);
            $_SESSION['largimiMeSukses'] = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | TechStore</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css">
</head>

<body>
    <?php include_once('../design/header.php') ?>
    <div class="containerDashboardP">
        <?php
        if (isset($_SESSION['perditMeSukses'])) {
            ?>
            <div class="mesazhiSuksesStyle">
                <p>Sasia u Perditesua me sukses!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        if (isset($_SESSION['largimiMeSukses'])) {
            ?>
            <div class="mesazhiSuksesStyle">
                <p>Prdoukti u largua nga shporta!</p>
                <button id="mbyllMesazhin">
                    X
                </button>
            </div>
            <?php
        }
        ?>
        <table>
            <tr>
                <th>Emri i Produktit</th>
                <th>Sasia</th>
                <th>Qmimi</th>
                <th>Qmimi Total</th>
                <th>Fuksione</th>
            </tr>
            <?php
            if (!empty($_SESSION["shportaBlerjes"])) {
                $total = 0;
                foreach ($_SESSION["shportaBlerjes"] as $keys => $produkti) {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="produktiID" value="<?php echo $produkti["produktiID"]; ?>">
                        <tr>
                            <td>
                                <a href="../pages/produkti.php?produktiID=<?php echo $produkti["produktiID"]; ?>"><?php echo $produkti["emriProduktit"]; ?></a>
                            </td>
                            <td>
                                <input type="number" name="sasia" value="<?php echo $produkti["sasia"]; ?>" min=1 max=999>
                            </td>
                            <td>
                                <?php echo $produkti["qmimiProduktit"]; ?> €
                            </td>
                            <td>
                                <?php echo number_format($produkti["sasia"] * $produkti["qmimiProduktit"], 2); ?> €
                            </td>
                            <td>
                                <input class="edito" type="submit" value="Perditeso" name='perdit'>
                                <input class="fshij" type="submit" value="Largo nga Shporta" name='largo'>
                            </td>
                        </tr>
                    </form>
                    <?php
                    $total = $total + ($produkti["sasia"] * $produkti["qmimiProduktit"]);
                }
                ?>
                <tr>
                    <td colspan="4" align="right">
                        <h2>Totali i Pergjithshem:</h2>
                    </td>
                    <td>
                        <h2>
                            <?php echo number_format($total, 2); ?> €
                        </h2>
                    </td>
                    <td></td>
                </tr>
                <?php
            } else {
                ?>
                <div class="mesazhiGabimStyle">
                    <p>Nuk keni asnje Produkt ne Shporte!</p>
                    <button id="mbyllMesazhin">
                        X
                    </button>
                </div>
                <?php
            }
            ?>
        </table>

        <div>
            <a href="./produktet.php"><button class="button">Vazhdo me Blerjen</button></a>
            <a href="./checkout.php"><button class="button">Kalo tek Pagesa</button></a>
        </div>
    </div>



    </div>

    <?php include_once('../design/footer.php') ?>
</body>

</html>

<?php
unset($_SESSION['largimiMeSukses']);
unset($_SESSION['perditMeSukses']);
?>