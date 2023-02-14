<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/produktiCRUD.php');
require_once('../CRUD/kodiZbritjesCRUD.php');

$produktetCRUD = new produktiCRUD();
$kodiZbritjesCRUD = new kodiZbritjesCRUD();


$produktet = $produktetCRUD->shfaqTeGjithaProduktet();

if (isset($_POST['shtoKodin'])) {
    $kodiZbritjesCRUD->setIdProduktit($_POST['produkti']);
    $kodiZbritjesCRUD->setQmimZbritjes($_POST['qmimiZbritjes']);

    if ($_POST['produkti'] == '') {
        $kodiZbritjesCRUD->shtoKodinEZbritjes(false);
    } else {
        $kodiZbritjesCRUD->shtoKodinEZbritjes(true);
    }
    $_SESSION['katUShtua'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shtoni Kode te Zbritjeve | Tech Store</title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/header.css" />
    <link rel="stylesheet" href="../../css/forms.css" />
    <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
    <?php include '../design/header.php' ?>
    <div class="forms">
        <form name="shtoKodinEZbritjes" onsubmit="return validimiKategoris();" action='' method="POST">
            <?php
            if (isset($_SESSION['katUShtua']) == true) {
                ?>
                <div class="mesazhiSuksesStyle">
                    <p>Kategoria u shtua me sukses!</p>
                    <button id="mbyllMesazhin">
                        X
                    </button>
                </div>
                <?php
            }
            ?>
            <h1 class="form-title">Krijoni Gift Code</h1>
            <select class="dropdown" name="produkti">
                <option hidden value="">Zgjedhni Produktin</option>
                <?php

                foreach ($produktet as $produkti) {
                    ?>
                    <option value="<?php echo $produkti['produktiID'] ?>">
                        <?php echo $produkti['produktiID'] . ' - ' . $produkti['emriProduktit'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <input class="form-input" name="qmimiZbritjes" type="number" placeholder="Qmimi i Zbritjes">
            <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKodin'>
        </form>
    </div>
    <?php include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>