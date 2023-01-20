<?php
require_once('../db/dbcon.php');

if(!isset($_SESSION)){
    session_start();
}

class kompaniaCRUD extends dbCon{
    private $kompaniaID;
    private $emriKompanis;
    private $kompaniaLogo;
    private $adresaKompanis;
    private $dbConn;

    public function __construct($kompaniaID = '',$emriKompanis = '', $kompaniaLogo = '', $adresaKompanis = '')
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

    public function insertoKompanin(){
        try{
            $sql = "INSERT INTO `kompania`(`emriKompanis`, `kompaniaLogo`, `adresaKompanis`) VALUES (?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriKompanis,$this->kompaniaLogo,$this->adresaKompanis]);

            $_SESSION['mesazhiMeSukses'] = true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function shfaqKompanin(){
        try{
            $sql = "SELECT * FROM kompania";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function shfaqKompanitSelektim(){
        try{
            $kompanit = $this->shfaqKompanin();

            echo '<select name="kompania">
                <option value="te tjera">Zgjedhni Kompanin</option>
            ';
            
            foreach($kompanit as $kompania){
                echo '<option value="' . $kompania['emriKompanis'] . '">' . $kompania['emriKompanis'] . '</option>';
            }
            echo '</select>';

        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
    }

    
}



?>