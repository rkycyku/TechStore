<?php
include ('../db/dbcon.php');

class porosiaCRUD extends dbCon{
    private $porosiaID;
    private $produktiID;
    private $userID;
    private $emriKlientit;
    private $mbiemriKlientit;
    private $emailKlientit;
    private $nrKontaktit;
    private $qyteti;
    private $adresaKlientit;
    private $dataPorosis;
    private $qmimiTotal;
    private $statusiPorosis;
    private $dbConn;

    public function __construct($porosiaID = '',$produktiID = '', $userID = '', $emriKlientit = '', $mbiemriKlientit = '', $emailKlientit = '', $nrKontaktit = '', $qyteti = '', $adresaKlientit = '', $dataPorosis = '', $qmimiTotal = '', $statusiPorosis = ''){
        $this->porosiaID=$porosiaID;
        $this->produktiID=$produktiID;
        $this->userID=$userID;
        $this->emriKlientit=$emriKlientit;
        $this->mbiemriKlientit=$mbiemriKlientit;
        $this->emailKlientit=$emailKlientit;
        $this->nrKontaktit=$nrKontaktit;
        $this->qyteti=$qyteti;
        $this->adresaKlientit=$adresaKlientit;
        $this->dataPorosis=$dataPorosis;
        $this->qmimiTotal=$qmimiTotal;
        $this->statusiPorosis=$statusiPorosis;

        $this->dbConn = $this->connDB();
    }

    

    public function getPorosiaID()
    {
        return $this->porosiaID;
    }

    public function setPorosiaID($porosiaID)
    {
        $this->porosiaID = $porosiaID;
    }

    public function getProduktiID()
    {
        return $this->produktiID;
    }

    public function setProduktiID($produktiID)
    {
        $this->produktiID = $produktiID;
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getEmriKlientit()
    {
        return $this->emriKlientit;
    }

    public function setEmriKlientit($emriKlientit)
    {
        $this->emriKlientit = $emriKlientit;
    }

    public function getMbiemriKlientit()
    {
        return $this->mbiemriKlientit;
    }

    public function setMbiemriKlientit($mbiemriKlientit)
    {
        $this->mbiemriKlientit = $mbiemriKlientit;
    }

    public function getEmailKlientit()
    {
        return $this->emailKlientit;
    }

    public function setEmailKlientit($emailKlientit)
    {
        $this->emailKlientit = $emailKlientit;
    }

    public function getNrKontaktit()
    {
        return $this->nrKontaktit;
    }

    public function setNrKontaktit($nrKontaktit)
    {
        $this->nrKontaktit = $nrKontaktit;
    }

    public function getQyteti()
    {
        return $this->qyteti;
    }

    public function setQyteti($qyteti)
    {
        $this->qyteti = $qyteti;
    }

    public function getAdresaKlientit()
    {
        return $this->adresaKlientit;
    }

    public function setAdresaKlientit($adresaKlientit)
    {
        $this->adresaKlientit = $adresaKlientit;
    }

    public function getDataPorosis()
    {
        return $this->dataPorosis;
    }

    public function setDataPorosis($dataPorosis)
    {
        $this->dataPorosis = $dataPorosis;
    }

    public function getQmimiTotal()
    {
        return $this->qmimiTotal;
    }

    public function setQmimiTotal($qmimiTotal)
    {
        $this->qmimiTotal = $qmimiTotal;
    }

    public function getStatusiPorosis()
    {
        return $this->statusiPorosis;
    }

    public function setStatusiPorosis($statusiPorosis)
    {
        $this->statusiPorosis = $statusiPorosis;
    }

    public function shtoPorosin(){
        try{
            $sql = "INSERT INTO `porosia`(`produktiID`, `userID`, `emriKlientit`, `mbiemriKlientit`, `emailKlientit`, `nrKontaktit`, `qyteti`, `adresaKlientit`, `qmimiTotal`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID,$this->userID,$this->emriKlientit,$this->mbiemriKlientit,$this->emailKlientit,$this->nrKontaktit,$this->qyteti,$this->adresaKlientit,$this->qmimiTotal]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>