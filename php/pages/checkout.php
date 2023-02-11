<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../CRUD/userCRUD.php');

$userCRUD = new userCRUD();

$userCRUD->setUserID($_SESSION['userID']);
$teDhenatKlientit = $userCRUD->shfaqSipasID();
$total = 0;

foreach ($_SESSION["shportaBlerjes"] as $keys => $values) {
    $total = $total + ($values["sasia"] * $values["qmimiProduktit"]);

} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checkout | TechStore</title>

</head>

<body>

    <div>
        <h1>Checkout</h1>

        <p>
            <?php echo ucfirst($teDhenatKlientit["emri"]) . " " . ucfirst($teDhenatKlientit["mbiemri"]); ?>
        </p>
        <div>
            <table>
                <p>Te dhenat e Transportit</p>

                <tr>
                    <th>Street Address</th>
                    <td>
                        <?php echo $teDhenatKlientit["adresa"]; ?>
                    </td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>
                        <?php echo $teDhenatKlientit["qyteti"]; ?>
                    </td>
                </tr>
                <tr>
                    <th>Zip Code</th>
                    <td>
                        <?php echo $teDhenatKlientit["zipKodi"]; ?>
                    </td>
                </tr>
                <tr>
                    <th>nrKontaktit</th>
                    <td>
                        <?php echo $teDhenatKlientit["nrKontaktit"]; ?>
                    </td>
                </tr>
                <tr>
                    <td><a href="../funksione/perditesoTeDhenat.php?userID=<?php echo $_SESSION['userID'] ?>">Perditeso
                            te Dhenat</a></td>
                </tr>
            </table>

        </div>

        <table>
            <tr>
                <th>Totali i Pergjithshem:</th>
                <td>
                    <?php echo $total; ?> €
                </td>
            </tr>
            <form action="../funksione/orderComplete.php" method="POST">
                <input type="hidden" name="qmimiTot" value="<?php echo number_format($total, 2); ?>">
                <tr>
                    <th>Pagesa:</th>
                    <td>Paguaj pas Pranimit te Produktit</td>
                </tr>
                <tr>
                    <th>Transporti:</th>
                    <td>Transport Normal - Pa Pages</td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input name='complete' type="submit" value="Perfundo Porosin">
                    </td>
                </tr>
            </form>
        </table>





    </div>




</body>

</html>