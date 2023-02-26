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

        $_SESSION['zbrtijatUShtua'] = true;
    } else {
        $kontrollimiKodit = $kodiZbritjesCRUD->kontrolloProduktinAKaZbritjeAktive();
        if($kontrollimiKodit == true){
            $_SESSION['zbritjeAktivePerProduktin'] = true;
        }else{
            $produktetCRUD->setProduktiID($_POST['produkti']);

            $produkti = $produktetCRUD->shfaqProduktinSipasID();
            if ($_POST['qmimiZbritjes'] < $produkti['qmimiProduktit']) {
                $kodiZbritjesCRUD->shtoKodinEZbritjes(true);
    
                $_SESSION['zbrtijatUShtua'] = true;
            } else {
                $_SESSION['zbritjaMeEMadhe'] = true;
            }
        }
    }


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
            if (isset($_SESSION['zbrtijatUShtua']) == true) {
                ?>
                <div class="mesazhiStyle mesazhiSuksesStyle">
                    <p>Kodi i zbritjes u shtua me sukses!</p>
                    <button id="mbyllMesazhin">
                        <i class="fa-solid">&#xf00d;</i>
                    </button>
                </div>
                <?php
            }
            if (isset($_SESSION['zbritjaMeEMadhe']) == true) {
                ?>
                <div class="mesazhiStyle mesazhiGabimStyle">
                    <p>Qmimi qe keni vendosur eshte me e i madh se i produktit!</p>
                    <button id="mbyllMesazhin">
                        <i class="fa-solid">&#xf00d;</i>
                    </button>
                </div>
                <?php
            }
            if (isset($_SESSION['zbritjeAktivePerProduktin']) == true) {
                ?>
                <div class="mesazhiStyle mesazhiGabimStyle">
                    <p>Tashme egziston nje zbritje per kete produkt!</p>
                    <button id="mbyllMesazhin">
                        <i class="fa-solid">&#xf00d;</i>
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
            <button class="button" type="submit" value="" name='shtoKodin'>Shtoni Gift Code-in <i class="fa-solid">&#xf0fe;</i></button>
        </form>
    </div>
    <?php include('../funksione/importimiScriptave.php') ?>
</body>

</html>
<?php
unset($_SESSION['zbrtijatUShtua']);
unset($_SESSION['zbritjaMeEMadhe']);
unset($_SESSION['zbritjeAktivePerProduktin']);
?>