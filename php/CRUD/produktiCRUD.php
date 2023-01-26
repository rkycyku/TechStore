<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class produktiCRUD extends dbCon
{
    private $produktiID;
    private $emriProduktit;
    private $emriKompanis;
    private $kategoriaProduktit;
    private $fotoProduktit;
    private $emriStafit;
    private $dataKrijimit;
    private $qmimiProduktit;
    private $dbConn;

    public function __construct($produktiID = '', $emriProduktit = '', $emriKompanis = '', $kategoriaProduktit = '', $fotoProduktit = '', $emriStafit = '', $dataKrijimit = '', $qmimiProduktit = '')
    {
        $this->produktiID = $produktiID;
        $this->emriProduktit = $emriProduktit;
        $this->emriKompanis = $emriKompanis;
        $this->kategoriaProduktit = $kategoriaProduktit;
        $this->fotoProduktit = $fotoProduktit;
        $this->emriStafit = $emriStafit;
        $this->dataKrijimit = $dataKrijimit;
        $this->qmimiProduktit = $qmimiProduktit;

        $this->dbConn = $this->connDB();
    }

    public function getProduktiID()
    {
        return $this->produktiID;
    }

    public function setProduktiID($produktiID)
    {
        $this->produktiID = $produktiID;
    }

    public function getEmriProduktit()
    {
        return $this->emriProduktit;
    }

    public function setEmriProduktit($emriProduktit)
    {
        $this->emriProduktit = $emriProduktit;
    }

    public function getEmriKompanis()
    {
        return $this->emriKompanis;
    }

    public function setEmriKompanis($emriKompanis)
    {
        $this->emriKompanis = $emriKompanis;
    }

    public function getKategoriaProduktit()
    {
        return $this->kategoriaProduktit;
    }

    public function setKategoriaProduktit($kategoriaProduktit)
    {
        $this->kategoriaProduktit = $kategoriaProduktit;
    }

    public function getFotoProduktit()
    {
        return $this->fotoProduktit;
    }

    public function setFotoProduktit($fotoProduktit)
    {
        $this->fotoProduktit = $fotoProduktit;
    }

    public function getEmriStafit()
    {
        return $this->emriStafit;
    }

    public function setEmriStafit($emriStafit)
    {
        $this->emriStafit = $emriStafit;
    }

    public function getDataKrijimit()
    {
        return $this->dataKrijimit;
    }

    public function setDataKrijimit($dataKrijimit)
    {
        $this->dataKrijimit = $dataKrijimit;
    }

    public function getQmimiProduktit()
    {
        return $this->qmimiProduktit;
    }

    public function setQmimiProduktit($qmimiProduktit)
    {
        $this->qmimiProduktit = $qmimiProduktit;
    }

    public function shtoProduktin()
    {
        try {
            $this->barteFotonNeFolder();

            $this->setEmriProduktit($_SESSION['EmriProduktit']);
            $this->setEmriKompanis($_SESSION['EmriKompanis']);
            $this->setKategoriaProduktit($_SESSION['KategoriaProduktit']);
            $this->setEmriStafit($_SESSION['name']);
            $this->setQmimiProduktit($_SESSION['QmimiProduktit']);
            $this->setFotoProduktit($_SESSION['emriUnikFotos']);

            $sql = "INSERT INTO `produkti`(`emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `fotoProduktit`, `emriStafit`,`qmimiProduktit`) VALUES (?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->fotoProduktit, $this->emriStafit, $this->qmimiProduktit]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    public function shfaqTeGjithaProduktet()
    {
        try {
            $sql = "SELECT * FROM `produkti`";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaq20ProduktetEFundit()
    {
        try {
            $sql = "SELECT * FROM (SELECT * FROM `produkti` ORDER BY `produktiID` DESC LIMIT 20) AS prodEFundit ORDER BY prodEFundit.produktiID DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktinSipasID()
    {
        try {
            $sql = "SELECT * FROM produkti WHERE produktiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktinSipasKompanis()
    {
        try {
            $sql = "SELECT * FROM produkti WHERE `emriKompanis` = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKompanis]);

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktetNgaKerkimi()
    {
        try {
            $this->setEmriProduktit('%' . $_SESSION['kerko'] . '%');

            $sql = "SELECT * FROM produkti WHERE `emriProduktit` LIKE ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit]);

            $produktet = $stm->fetchAll();

            if ($produktet == true) {
                echo '<div class="artikujt">
                <div class="titulliArtikuj">
                  <h1 class="">All Products like ' . $_SESSION['kerko'] . '</h1>
                </div>';
                foreach ($produktet as $produkti) {
                    echo '  <div class="artikulli">
                          <img src="../../img/products/' . $produkti['fotoProduktit'] . '" alt="" />
                          <p class="artikulliLabel">' . $produkti['emriProduktit'] . '</p>
                          <p class="cmimi">' . $produkti['qmimiProduktit'] . ' €</p>
                          <button class="button">Buy</button>
                         </div>';
                }
            } else {
                echo '<div class="artikujt">
                <div class="titulliArtikuj">
                  <h1 class="">All Products like ' . $_SESSION['kerko'] . '</h1>
                </div>
                    <p>Produkti qe kerkuat nuk egziston!</p>';

            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktinSipasKategoris()
    {
        try {
            $sql = "SELECT * FROM produkti WHERE `kategoriaProduktit` = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->kategoriaProduktit]);

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fshijProduktinSipasID()
    {
        try {
            $produkti = $this->shfaqProduktinSipasID();
            unlink('../../img/products/' . $produkti['fotoProduktit']);

            $sql = "DELETE FROM produkti WHERE produktiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="../admin/produktet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function editoProduktinPaFoto()
    {
        try {
            $this->setProduktiID($_SESSION['prouktiID']);
            $this->setEmriProduktit($_SESSION['EmriProduktit']);
            $this->setEmriKompanis($_SESSION['EmriKompanis']);
            $this->setKategoriaProduktit($_SESSION['KategoriaProduktit']);
            $this->setEmriStafit($_SESSION['name']);
            $this->setQmimiProduktit($_SESSION['QmimiProduktit']);

            $sql = "UPDATE `produkti` SET `emriProduktit`=?,`emriKompanis`=?,`kategoriaProduktit`=?,`emriStafit`=?,`dataModifikimit`=current_timestamp(),`qmimiProduktit`=? WHERE produktiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->emriStafit, $this->qmimiProduktit, $this->produktiID]);

            $_SESSION['mesazhiMeSukses'] = true;
            echo '<script>document.location="../admin/produktet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function editoProduktinMeFoto()
    {
        try {
            $produkti = $this->shfaqProduktinSipasID();
            unlink('../../img/products/' . $produkti['fotoProduktit']);

            $this->barteFotonNeFolder();

            $this->setProduktiID($_SESSION['prouktiID']);
            $this->setEmriProduktit($_SESSION['EmriProduktit']);
            $this->setEmriKompanis($_SESSION['EmriKompanis']);
            $this->setKategoriaProduktit($_SESSION['KategoriaProduktit']);
            $this->setFotoProduktit($_SESSION['emriUnikFotos']);
            $this->setEmriStafit($_SESSION['name']);
            $this->setQmimiProduktit($_SESSION['QmimiProduktit']);

            $sql = "UPDATE `produkti` SET `emriProduktit`=?,`emriKompanis`=?,`kategoriaProduktit`=?,`fotoProduktit`=?,`emriStafit`=?,`dataModifikimit`=current_timestamp(),`qmimiProduktit`=? WHERE produktiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->fotoProduktit, $this->emriStafit, $this->qmimiProduktit, $this->produktiID]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function barteFotonNeFolder()
    {
        try {
            $foto = $_SESSION['FotoProduktit'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $_SESSION['emriUnikFotos'] = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/products/' . $_SESSION['emriUnikFotos'];
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

                } else {
                    $_SESSION['problemNeBartje'] = true;
                }
            } else {
                $_SESSION['fileNukSuportohet'] = true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}


?>