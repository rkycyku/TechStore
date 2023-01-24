<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/porosiaCRUD.php');
$porosiaCRUD = new porosiaCRUD();
$porosiaCRUD->setPorosiaID($_GET['porosiaID']);
$porosia = $porosiaCRUD->shfaqPorosinSipasID();
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_POST['editoStat'])) {
    $porosiaCRUD->setStatusiPorosis($_POST['statusiPorosis']);
    $porosiaCRUD->setPorosiaID($_GET['porosiaID']);

    $porosiaCRUD->perditesoStatusinPorosis();

    $_SESSION['statusiUPerditesua'] = true;
    echo '<script>document.location="./porositNgaKlientet.php"</script>';
}
if (isset($_POST['anulo'])) {
    $_SESSION['statusiUPerditesua'] = false;
    echo '<script>document.location="./porositNgaKlientet.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editimi i Produktiti | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/forms.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
    <?php
    include '../design/header.php';
    echo '<div class="containerDashboard">';
    echo '</div>';
    ?>
    <div class="forms">
        <form name="shtoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
            <h1 class="form-title">Editimi i Produktiti</h1>
            <label for="">
                <strong>Numri i Porosis:</strong>
                <?php echo $porosia['porosiaID'] ?>
            </label>
            <label for="">
                <strong>ID Produktit:</strong>
                <?php echo $porosia['produktiID'] ?>
            </label>
            <label for="">
                <strong>Emri Produktit:</strong>
                <?php echo $porosia['emriProduktit'] ?>
            </label>
            <label for="">
                <strong>Statusi i Porosis: &nbsp&nbsp</strong>

                <select name="statusiPorosis">
                    <option value="Ne Procesim">Ne Procesim</option>
                    <option value="E Derguar">E Derguar</option>
                    <option value="Pranuar Nga Bleresi">Pranuar Nga Bleresi</option>
                    <option selected hidden value="<?php echo $porosia['statusiPorosis'] ?>"><?php echo $porosia['statusiPorosis'] ?></option>
                </select></label>
            <input class="button" type="submit" value="Editoni Statusin" name='editoStat'>
            <input class="button" type="submit" value="Anulo" name='anulo'>
        </form>
    </div>
    <script src="../../js/validimiFormave.js"></script>
    <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>
<?php
?>