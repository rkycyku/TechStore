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
    private $pershkrimiProduktit;
    private $dbConn;

    public function __construct($produktiID = '', $emriProduktit = '', $emriKompanis = '', $kategoriaProduktit = '', $fotoProduktit = '', $emriStafit = '', $dataKrijimit = '', $qmimiProduktit = '', $pershkrimiProduktit = '')
    {
        $this->produktiID = $produktiID;
        $this->emriProduktit = $emriProduktit;
        $this->emriKompanis = $emriKompanis;
        $this->kategoriaProduktit = $kategoriaProduktit;
        $this->fotoProduktit = $fotoProduktit;
        $this->emriStafit = $emriStafit;
        $this->dataKrijimit = $dataKrijimit;
        $this->qmimiProduktit = $qmimiProduktit;
        $this->pershkrimiProduktit = $pershkrimiProduktit;

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
    public function getPershkrimiProduktit()
    {
        return $this->pershkrimiProduktit;
    }

    public function setPershkrimiProduktit($pershkrimiProduktit)
    {
        $this->pershkrimiProduktit = $pershkrimiProduktit;
    }

    public function shtoProduktin()
    {
        try {
            $this->barteFotonNeFolder();

            $sql = "INSERT INTO `produkti`(`emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `fotoProduktit`, `emriStafit`,`qmimiProduktit`, `pershkrimiProd`) VALUES (?, ?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->fotoProduktit, $this->emriStafit, $this->qmimiProduktit, $this->pershkrimiProduktit]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqNrProduktev($ndarja)
    {
        try {
            if ($ndarja == 'kerko') {
                $sql = "SELECT count(*) as totProd FROM produkti WHERE `emriProduktit` LIKE ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriProduktit]);

            } else if ($ndarja == 'kompania') {
                $sql = "SELECT count(*) as totProd FROM produkti WHERE `emriKompanis` LIKE ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriKompanis]);

            } else if ($ndarja == 'kategoria') {
                $sql = "SELECT count(*) as totProd FROM produkti WHERE `kategoriaProduktit` LIKE ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->kategoriaProduktit]);

            } else {
                $sql = "SELECT count(*) as totProd FROM produkti";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute();

            }

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqTeGjithaProduktet()
    {
        try {
            $sql = "SELECT p.*, kp.emriKategoris, k.emriKompanis FROM `produkti` p 
                    left join `kategoriaproduktit` kp on p.kategoriaProduktit = kp.kategoriaID 
                    left join kompania k on p.emriKompanis = k.kompaniaID
                    ORDER BY `produktiID` DESC ";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaq15ProduktetEFundit()
    {
        try {
            $sql = "SELECT * FROM `produkti` ORDER BY `produktiID` DESC LIMIT 15";
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
            $sql = "SELECT * FROM `produkti` p 
            left join `kategoriaproduktit` kp on p.kategoriaProduktit = kp.kategoriaID 
            left join kompania k on p.emriKompanis = k.kompaniaID
            left join kodiZbritjes kz on p.produktiID = kz.idProduktit 
            WHERE produktiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            return $stm->fetch();
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

    public function editoProduktin($kaFoto)
    {
        try {
            if ($kaFoto == false) {
                $sql = "UPDATE `produkti` SET `emriProduktit`=?,`emriKompanis`=?,`kategoriaProduktit`=?,`emriStafit`=?,`dataModifikimit`=current_timestamp(),`qmimiProduktit`=? , `pershkrimiProd` =? WHERE produktiID = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->emriStafit, $this->qmimiProduktit, $this->pershkrimiProduktit, $this->produktiID]);
            } else {
                $produkti = $this->shfaqProduktinSipasID();
                unlink('../../img/products/' . $produkti['fotoProduktit']);

                $this->barteFotonNeFolder();

                $sql = "UPDATE `produkti` SET `emriProduktit`=?,`emriKompanis`=?,`kategoriaProduktit`=?,`fotoProduktit`=?,`emriStafit`=?,`dataModifikimit`=current_timestamp(),`qmimiProduktit`=?, `pershkrimiProd` =? WHERE produktiID = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->fotoProduktit, $this->emriStafit, $this->qmimiProduktit, $this->pershkrimiProduktit, $this->produktiID]);
            }

            $_SESSION['mesazhiMeSukses'] = true;
            echo '<script>document.location="../admin/produktet.php"</script>';
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

            $teLejuara = array('jpg', 'jpeg', 'png', 'svg');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $emriUnikFotos = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/products/' . $emriUnikFotos;
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

                    $this->setFotoProduktit($emriUnikFotos);
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


    public function shfaqProduktetENdara($fillimi, $limitiProduktec, $ndarja)
    {
        try {
            if ($ndarja == 'kerko') {
                $sql = "SELECT * FROM produkti WHERE `emriProduktit` LIKE ? ORDER BY `produktiID` DESC LIMIT $fillimi, $limitiProduktec";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriProduktit]);
                return $stm->fetchAll();
            } else if ($ndarja == 'kompania') {
                $sql = "SELECT * FROM produkti WHERE `emriKompanis` like ? ORDER BY `produktiID` DESC LIMIT $fillimi, $limitiProduktec";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emriKompanis]);
                return $stm->fetchAll();
            } else if ($ndarja == 'kategoria') {
                $sql = "SELECT * FROM produkti WHERE `kategoriaProduktit` LIKE ? ORDER BY `produktiID` DESC LIMIT $fillimi, $limitiProduktec";
                $stm = $this->dbConn->prepare($sql);

                $stm->execute([$this->kategoriaProduktit]);
                return $stm->fetchAll();

            } else {
                $sql = "SELECT * FROM `produkti` ORDER BY `produktiID` DESC LIMIT $fillimi, $limitiProduktec";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute();
                return $stm->fetchAll();
            }


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaq10MeTeShiturat()
    {
        try {
            $sql = "SELECT P.* FROM `produkti` p inner join tedhenatporosis t on p.produktiID = t.idProdukti group by p.produktiID order by count(*) desc LIMIT 10;";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}


?>