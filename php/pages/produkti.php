<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../CRUD/produktiCRUD.php');
$produktiCRUD = new produktiCRUD();
if (isset($_GET['produktiID'])) {
    $produktiCRUD->setProduktiID($_GET['produktiID']);
} else {
    echo '<script>document.location="../pages/index.php"</script>';
}

$produkti = $produktiCRUD->shfaqProduktinSipasID();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php echo $produkti['emriProduktit'] ?> | Tech Store
    </title>
    <link rel="shortcut icon" href="../../img/web/favicon.ico" />
    <link rel="stylesheet" href="../../css/index.css" />
    <link rel="stylesheet" href="../../css/produkti.css">
</head>

<body>
    <?php include '../design/header.php'; ?>
    <div class="container">
        <div class="produkti">
            <div class="detajet">


                <div class="foto">
                    <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
                </div>
                <div>
                    <div class="teDhenatProduktit">
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h1 class="emriProd">
                                        <?php echo $produkti['emriProduktit'] ?>
                                    </h1>
                                </th>
                            </tr>
                            <tr>
                                <td>Kompania:</td>
                                <td>
                                    <a href="../pages/produktet.php?kompania=<?php echo $produkti['kompaniaID'] ?>"><?php
                                       echo $produkti['emriKompanis'] ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Kategoria:</td>
                                <td>
                                    <a href="../pages/produktet.php?kategoria=<?php echo $produkti['kategoriaID'] ?>"><?php
                                       echo $produkti['emriKategoris'] ?></a>
                                </td>
                            </tr>
                            <?php if ($produkti['kodi'] != null) {
                                ?>
                                <tr>
                                    <td>Kodi Zbritjes: </td>
                                    <td>
                                        <strong>
                                            <?php echo $produkti['kodi'] ?>
                                        </strong>
                                    </td>
                                </tr>
                                <?php

                            }
                            ?>
                        </table>

                    </div>
                    <div class="blerja">
                        <form action="../funksione/shtoNeShport.php" method="POST">
                            <input type="hidden" name="produktiID" value=<?php echo $produkti['produktiID'] ?>>
                            <input type="hidden" name="emriProduktit" value="<?php echo $produkti['emriProduktit'] ?>">
                            <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>

                            <?php if ($produkti['kodi'] != null) {
                                ?>
                                <h1>
                                    <?php echo number_format($produkti['qmimiProduktit'] - $produkti['qmimiZbritjes'], 2) ?>
                                    €
                                </h1>
                                <p>
                                    <strong>
                                        <?php echo $produkti['qmimiZbritjes'] ?> € Zbritja
                                    </strong>
                                </p>
                                <p>
                                    <?php echo $produkti['qmimiProduktit'] ?> € qmimi pa zbritje
                                </p>
                                <p>
                                    <?php echo number_format($produkti['qmimiProduktit'] - ($produkti['qmimiProduktit'] * 0.18), 2) ?>€
                                    pa TVSH
                                </p>

                                <?php
                            } else {
                                ?>
                                <h1>
                                    <?php echo $produkti['qmimiProduktit'] ?> €
                                </h1>
                                <p>
                                    <?php echo number_format($produkti['qmimiProduktit'] - ($produkti['qmimiProduktit'] * 0.18), 2) ?>€
                                    pa TVSH
                                </p>
                                <?php
                            }
                            ?>

                            <div>
                                <button type="submit" class="button" name="blej">Buy now</button>
                                <input type="submit" class="button button-shporta fa-solid" value="&#xf07a;"
                                    name="submit">

                                <?php if ($_SESSION['aksesi'] != 0) {
                                    ?>

                                    <a href="../admin/editoProduktin.php?produktID=<?php echo $_GET['produktiID']; ?>"><input
                                            type="button" value="&#xf044;"
                                            class="button button-edit-produktin fa-solid"></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php if ($produkti['kodi'] != null) {
                                ?>
                                <p class="mesazhiZbritjes" style="font-size: 8pt;">
                                    Ju lutemi qe gjat perfundimit te pageses te aplikoni kodin i cili gjendet tek pjesa e
                                    info-ve te
                                    Produktit
                                </p>
                                <?php
                            }
                            ?>
                        </form>


                    </div>
                </div>
            </div>
            <?php
            if ($produkti['pershkrimiProd'] != null) {
                ?>
                <div class="pershkrimi">
                    <h2>Pershkrimi: </h2>
                    <p>
                        <?php echo $produkti['pershkrimiProd'] ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>



        <div class="artikujt">
            <div class="titulliArtikuj">
                <h1 class="">Me te shiturat</h1>
            </div>
            <?php
            $produktet = $produktiCRUD->shfaq10MeTeShiturat();
            foreach ($produktet as $produkti) {
                ?>
                <form action="../funksione/shtoNeShport.php" method="POST" class="artikulli">
                    <input type="hidden" name="produktiID" value=<?php echo $produkti['produktiID'] ?>>
                    <input type="hidden" name="emriProduktit" value="<?php echo $produkti['emriProduktit'] ?>">
                    <input type="hidden" name="qmimiProduktit" value=<?php echo $produkti['qmimiProduktit'] ?>>
                    <a href="../pages/produkti.php?produktiID=<?php echo $produkti['produktiID'] ?> ">
                        <img src="../../img/products/<?php echo $produkti['fotoProduktit'] ?>" />
                        <p class=" artikulliLabel">
                            <?php echo $produkti['emriProduktit'] ?>
                        </p>
                    </a>
                    <p class="cmimi">
                        <?php echo $produkti['qmimiProduktit'] ?> €
                    </p>
                    <div class="butonatDiv">
                        <input type="submit" class="button" value="Buy now" name="blej">
                        <input type="submit" class="button button-shporta fa-solid" value="&#xf07a;" name="submit">
                    </div>
                </form>
                <?php
            }

            ?>
        </div>

    </div>
    <?php include('../funksione/importimiScriptave.php') ?>
    <?php include '../design/footer.php' ?>
</body>

</html>