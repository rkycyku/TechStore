<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["shportaBlerjes"])) {
    echo '<script>document.location="./shporta.php"</script>';
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
    <link rel="stylesheet" href="../../css/adminDashboard.css">
</head>

<body>
    <?php include('../design/header.php'); ?>
    <div class="containerDashboardP">
        <h1>Checkout</h1>

        <h2>

        </h2>
        <table>
            <tr>
                <th colspan="2" style="text-align:center;">Te dhenat e Transportit</th>
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
                    <?php echo $teDhenatKlientit["qyteti"] . ', ' . $teDhenatKlientit["zipKodi"]; ?>
                </td>
            </tr>
            <tr>
                <th>nrKontaktit</th>
                <td>
                    <?php echo $teDhenatKlientit["nrKontaktit"]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><a href="../funksione/perditesoTeDhenat.php?userID=<?php echo $_SESSION['userID'] ?>">Perditeso
                        te Dhenat</a></td>
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
                        <input name='complete' type="submit" value="Perfundo Porosin">
                    </td>
                </tr>
            </form>
        </table>


        <button onclick="console.log(kontrolloTeDhenat());"> test</button>


    </div>




</body>

</html>

<script>
    function kontrolloTeDhenat(){
        var adresa = document.getElementById('adresa').innerHTML;

        if(adresa.value == null){
            alert("Ju lutemi te editoni te dhenat e juaja pasi qe nevoiten per dorezim!")
            return false;
        }
        return true;
    }
</script>