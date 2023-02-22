<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class kompaniaCRUD extends dbCon
{
    private $kompaniaID;
    private $emriKompanis;
    private $kompaniaLogo;
    private $adresaKompanis;
    private $dbConn;

    public function __construct($kompaniaID = '', $emriKompanis = '', $kompaniaLogo = '', $adresaKompanis = '')
    {
        $this->kompaniaID = $kompaniaID;
        $this->emriKompanis = $emriKompanis;
        $this->kompaniaLogo = $kompaniaLogo;
        $this->adresaKompanis = $adresaKompanis;

        $this->dbConn = $this->connDB();
    }

    public function getKompaniaID()
    {
        return $this->kompaniaID;
    }

    public function setKompaniaID($kompaniaID)
    {
        $this->kompaniaID = $kompaniaID;
    }

    public function getEmriKompanis()
    {
        return $this->emriKompanis;
    }

    public function setEmriKompanis($emriKompanis)
    {
        $this->emriKompanis = $emriKompanis;
    }

    public function getKompaniaLogo()
    {
        return $this->kompaniaLogo;
    }

    public function setKompaniaLogo($kompaniaLogo)
    {
        $this->kompaniaLogo = $kompaniaLogo;
    }

    public function getAdresaKompanis()
    {
        return $this->adresaKompanis;
    }

    public function setAdresaKompanis($adresaKompanis)
    {
        $this->adresaKompanis = $adresaKompanis;
    }

    public function insertoKompanin()
    {
        try {
            $this->barteFotonNeFolder();

            $this->setEmriKompanis($_SESSION['emriKompanis']);
            $this->setAdresaKompanis($_SESSION['adresaKompanis']);
            $this->setKompaniaLogo($_SESSION['emriUnikFotos']);

            $sql = "INSERT INTO `kompania`(`emriKompanis`, `kompaniaLogo`, `adresaKompanis`) VALUES (?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKompanis, $this->kompaniaLogo, $this->adresaKompanis]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoKompanin()
    {
        try {
            $sql = "UPDATE `kompania` SET `emriKompanis` = ?, `adresaKompanis` = ? where kompaniaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKompanis, $this->adresaKompanis, $this->kompaniaID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function shfaqKompanin()
    {
        try {
            $sql = "SELECT * FROM kompania order by emriKompanis ASC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqKompaninSipasID()
    {
        try {
            $sql = "SELECT * FROM kompania where kompaniaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->kompaniaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKompanitSelektim()
    {
        try {
            $kompanit = $this->shfaqKompanin();

            ?><select class="dropdown" name="kompania">
                <option value="te tjera">Zgjedhni Kompanin</option>
                <?php

                foreach ($kompanit as $kompania) {
                    ?>
                    <option value="<?php echo $kompania['kompaniaID'] ?>">
                        <?php echo $kompania['emriKompanis'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
            <?php

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function fshijKompanin()
    {
        try {

            $kompanija = $this->shfaqKompaninSipasID();

            unlink('../../img/slider/slidericons/' . $kompanija['kompaniaLogo']);

            $sql = "DELETE FROM kompania WHERE kompaniaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->kompaniaID]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function barteFotonNeFolder()
    {
        try {
            $foto = $_SESSION['LogoKompanis'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png', 'svg');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $_SESSION['emriUnikFotos'] = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/slider/slidericons/' . $_SESSION['emriUnikFotos'];
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