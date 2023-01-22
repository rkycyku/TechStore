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
            $_SESSION['katUShtua'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function shfaqKategorin()
    {
        try {
            $sql = "SELECT * FROM kategoriaproduktit";
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


            echo '<select name="kategoria">
                <option value="te tjera">Zgjedhni Kategorin</option>
            ';
            foreach ($kategorit as $kategoria) {
                echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
            }
            echo '</select>';

        } catch (Exception $e) {
            return $e->getMessage();
        }


    }


}



?>