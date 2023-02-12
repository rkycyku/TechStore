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
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/adminDashboard.css">
</head>

<body>
    <?php include('../design/header.php'); ?>
    <div class="containerDashboardP">
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
            <tr>
                <th>Totali i Pergjithshem:</th>
                <td>
                    <strong>
                        <?php echo $total; ?> €
                    </strong>
                </td>
            </tr>
            <form onsubmit="return kontrolloTeDhenat();" action="../funksione/orderComplete.php" method="POST">
                <input type="hidden" name="qmimiTot" value="<?php echo number_format($total, 2); ?>">
                <tr>
                    <th>Pagesa:</th>
                    <td>Paguaj pas Pranimit te Produktit</td>
                </tr>
                <tr>
                    <th>Transporti:</th>
                    <td>Transport Normal - Pa Pagese</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <input class="button" name='complete' type="submit" value="Perfundo Porosin">
                    </td>
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