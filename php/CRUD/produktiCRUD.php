<?php
require_once('../db/dbcon.php');

if(!isset($_SESSION)){
    session_start();
}

class produktiCRUD extends dbCon{
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
        $this->emriProduktit  = $emriProduktit;
        $this->emriKompanis  = $emriKompanis;
        $this->kategoriaProduktit  = $kategoriaProduktit;
        $this->fotoProduktit  = $fotoProduktit;
        $this->emriStafit  = $emriStafit;
        $this->dataKrijimit  = $dataKrijimit;
        $this->qmimiProduktit  = $qmimiProduktit;

        $this->dbConn  = $this->connDB();
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

    public function shtoProduktin(){
        try{
            $sql = "INSERT INTO `produkti`(`emriProduktit`, `emriKompanis`, `kategoriaProduktit`, `fotoProduktit`, `emriStafit`,`qmimiProduktit`) VALUES (?,?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriProduktit, $this->emriKompanis, $this->kategoriaProduktit, $this->fotoProduktit, $this->emriStafit, $this->qmimiProduktit]);
            
            $_SESSION['mesazhiMeSukses'] = true;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }



    public function shfaqTeGjithaProduktet(){
        try{
            $sql = "SELECT * FROM `produkti`";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function shfaq20ProduktetEFundit(){
        try{
            $sql = "SELECT * FROM (SELECT * FROM `produkti` ORDER BY `produktiID` DESC LIMIT 20) AS prodEFundit ORDER BY prodEFundit.produktiID ASC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function shfaqProduktinSipasID(){
        try{
            $sql = "SELECT * FROM `produkti` WHERE id = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            return $stm->fetchAll();
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}


?>