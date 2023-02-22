<?php
include_once '../db/dbcon.php';

class kodiZbritjesCRUD extends dbCon
{
    private $kodiZbritje;
    private $idProduktit;
    private $dataKrijimit;
    private $qmimZbritjes;
    private $conDB;

    public function __construct($kodiZbritjes = '', $idProduktit = '', $dataKrijimit = '', $qmimZbritjes = '')
    {
        $this->kodiZbritje = $kodiZbritjes;
        $this->idProduktit = $idProduktit;
        $this->dataKrijimit = $dataKrijimit;
        $this->qmimZbritjes = $qmimZbritjes;

        $this->conDB = $this->connDB();
    }

    public function getKodiZbritje()
    {
        return $this->kodiZbritje;
    }

    public function setKodiZbritje($kodiZbritje)
    {
        $this->kodiZbritje = $kodiZbritje;
    }

    public function getIdProduktit()
    {
        return $this->idProduktit;
    }

    public function setIdProduktit($idProduktit)
    {
        $this->idProduktit = $idProduktit;
    }

    public function getDataKrijimit()
    {
        return $this->dataKrijimit;
    }

    public function setDataKrijimit($dataKrijimit)
    {
        $this->dataKrijimit = $dataKrijimit;
    }

    public function getQmimZbritjest()
    {
        return $this->dataKrijimit;
    }

    public function setQmimZbritjes($qmimZbritjes)
    {
        $this->qmimZbritjes = $qmimZbritjes;
    }

    public function shfaqKodetEZbritjes()
    {
        try {
            $sql = "SELECT kz.kodi, kz.idProduktit, kz.dataKrijimit, kz.qmimiZbritjes, p.emriProduktit, p.qmimiProduktit
                     FROM kodizbritjes kz LEFT JOIN produkti p on kz.idProduktit = p.produktiID ORDER BY dataKrijimit desc";
            $stm = $this->conDB->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shtoKodinEZbritjes($vetemPerNjeProdukt)
    {
        try {
            $karakteret = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $this->setKodiZbritje(substr(str_shuffle($karakteret), 0, 6));

            if ($vetemPerNjeProdukt == true) {
                $sql = "INSERT INTO kodizbritjes (`kodi`, `idProduktit`, `qmimiZbritjes`) VALUES (?, ?, ?)";
                $stm = $this->conDB->prepare($sql);
                $stm->execute([$this->kodiZbritje, $this->idProduktit, $this->qmimZbritjes]);
            } else {
                $sql = "INSERT INTO kodiZbritjes (`kodi`, `qmimiZbritjes`) VALUES (?, ?)";
                $stm = $this->conDB->prepare($sql);
                $stm->execute([$this->kodiZbritje, $this->qmimZbritjes]);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kontrolloKodin()
    {
        try {
            $sql = 'SELECT * FROM `kodizbritjes` kz left join produkti p on kz.idProduktit = p.produktiID WHERE `kodi` = ?';
            $stm = $this->conDB->prepare($sql);
            $stm->execute([$this->kodiZbritje]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function fshijKodin()
    {
        try {
            $sql = "DELETE FROM `kodizbritjes`  WHERE `kodi` = ?";
            $stm = $this->conDB->prepare($sql);
            $stm->execute([$this->kodiZbritje]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>