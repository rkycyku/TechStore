<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class kategoriaCRUD extends dbCon
{
    private $kategoriaID;
    private $emriKategoris;
    private $pershkrimiKategoris;
    private $dbConn;

    public function __construct($kategoriaID = '', $emriKategoris = '', $pershkrimiKategoris = '')
    {
        $this->kategoriaID = $kategoriaID;
        $this->emriKategoris = $emriKategoris;
        $this->pershkrimiKategoris = $pershkrimiKategoris;

        $this->dbConn = $this->connDB();
    }

    public function getKategoriaID()
    {
        return $this->kategoriaID;
    }

    public function setKategoriaID($kategoriaID)
    {
        $this->kategoriaID = $kategoriaID;
    }

    public function getEmriKategoris()
    {
        return $this->emriKategoris;
    }

    public function setEmriKategoris($emriKategoris)
    {
        $this->emriKategoris = $emriKategoris;
    }

    public function getPershkrimiKategoris()
    {
        return $this->pershkrimiKategoris;
    }

    public function setPershkrimiKategoris($pershkrimiKategoris)
    {
        $this->pershkrimiKategoris = $pershkrimiKategoris;
    }

    public function insertoKategorinProduktit()
    {
        try {
            $this->setEmriKategoris($_SESSION['emriKat']);
            $this->setPershkrimiKategoris($_SESSION['pershkrimiKat']);

            $sql = "INSERT INTO `kategoriaproduktit`(`emriKategoris`, `pershkrimiKategoris`) VALUES (?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKategoris, $this->pershkrimiKategoris]);
            

            echo '<script>document.location="../admin/shtoKategorin.php"</script>';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoKategorin()
    {
        try {
            $sql = "UPDATE `kategoriaproduktit` set `emriKategoris` = ?, `pershkrimiKategoris` = ? WHERE kategoriaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKategoris, $this->pershkrimiKategoris, $this->kategoriaID]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqKategorinSipasID()
    {
        try {
            $sql = "SELECT * FROM kategoriaproduktit where kategoriaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->kategoriaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKategorin()
    {
        try {
            $sql = "SELECT * FROM kategoriaproduktit order by emriKategoris ASC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqKategorinSelektim()
    {
        try {
            $kategorit = $this->shfaqKategorin();


            ?><select class="dropdown1" name="kategoria">
                <option value="te tjera">Zgjedhni Kategorin</option>
                <?php
                foreach ($kategorit as $kategoria) {
                    ?>
                    <option value="<?php echo $kategoria['emriKategoris'] ?>">
                        <?php echo $kategoria['emriKategoris'] ?>
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

    public function fshijKategorinSipasID()
    {
        try {
            $sql = "DELETE FROM kategoriaproduktit WHERE kategoriaID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->kategoriaID]);

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}



?>