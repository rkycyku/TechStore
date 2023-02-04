<?php
require_once('../db/dbcon.php');

class porosiaCRUD extends dbCon
{
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
    private $qmimiProd;
    private $sasiaPorositur;
    private $qmimiTotal;
    private $statusiPorosis;
    private $dbConn;

    public function __construct($porosiaID = '', $produktiID = '', $userID = '', $emriKlientit = '', $mbiemriKlientit = '', $emailKlientit = '', $nrKontaktit = '', $qyteti = '', $adresaKlientit = '', $dataPorosis = '', $qmimiProd = '', $sasiaPorositur = '', $qmimiTotal = '', $statusiPorosis = '')
    {
        $this->porosiaID = $porosiaID;
        $this->produktiID = $produktiID;
        $this->userID = $userID;
        $this->emriKlientit = $emriKlientit;
        $this->mbiemriKlientit = $mbiemriKlientit;
        $this->emailKlientit = $emailKlientit;
        $this->nrKontaktit = $nrKontaktit;
        $this->qyteti = $qyteti;
        $this->adresaKlientit = $adresaKlientit;
        $this->sasiaPorositur = $qmimiProd;
        $this->sasiaPorositur = $sasiaPorositur;
        $this->dataPorosis = $dataPorosis;
        $this->qmimiTotal = $qmimiTotal;
        $this->statusiPorosis = $statusiPorosis;

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

    public function getQmimiProd()
    {
        return $this->qmimiProd;
    }

    public function setQmimiProd($qmimiProd)
    {
        $this->qmimiProd = $qmimiProd;
    }
    public function getSasiaPorositur()
    {
        return $this->sasiaPorositur;
    }

    public function setSasiaPorositur($sasiaPorositur)
    {
        $this->sasiaPorositur = $sasiaPorositur;
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

    public function shtoPorosin()
    {
        try {
            $sql = "INSERT INTO `porosia`(`produktiID`, `userID`, `emriKlientit`, `mbiemriKlientit`, `emailKlientit`, `nrKontaktit`, `qyteti`, `adresaKlientit`,`qmimiProd`,`sasiaPorositur`, `qmimiTotal`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID, $this->userID, $this->emriKlientit, $this->mbiemriKlientit, $this->emailKlientit, $this->nrKontaktit, $this->qyteti, $this->adresaKlientit, $this->qmimiProd, $this->sasiaPorositur, $this->qmimiTotal]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorositEKlientit()
    {
        try {
            $sql = "SELECT * from `porosia` inner join produkti on porosia.produktiID = produkti.produktiID where porosia.userID = ?  ORDER BY porosiaID DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);

            echo '
            <table>
            <tr>
              <th>Numri i Porosis</th>
              <th>Emri i Produktit</th>
              <th>Qmimi i Produktit</th>
              <th>Sasia e Porositur</th>
              <th>Qmimi total</th>
              <th>Data e porosis</th>
              <th>Statusi i porosis</th>
              <th>Funksione</th>
            </tr>';


            foreach ($stm as $porosia) {
                echo '
                  <tr>
                    <td>' . $porosia['porosiaID'] . '</td>
                    <td>' . $porosia['emriProduktit'] . '</td>
                    <td>' . $porosia['qmimiProduktit'] . ' €</td>
                    <td>' . $porosia['sasiaPorositur'] . '</td>
                    <td>' . $porosia['qmimiTotal'] . ' €</td>
                    <td>' . $porosia['dataPorosis'] . '</td>
                    <td>' . $porosia['statusiPorosis'] . '</td>';
                if ($porosia['userID'] == $_SESSION['userID']) {
                    echo '<td><button class="edito"><a href="../funksione/konfirmoPorosin.php?porosiaID=' . $porosia['porosiaID'] . '">Konfirmo Porosin</a></button>
                    <a href="../funksione/fatura.php?nrPorosis=' . $porosia["porosiaID"] . '" target="_blank"><button class="edito">Shkarko Faturen</button></a></td>';
                }
                echo '</tr> ';
            }
            echo '</th>
          </table>';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorositSipasProduktit()
    {
        try {
            $sql = "SELECT * from `porosia` inner join produkti on porosia.produktiID = produkti.produktiID where porosia.produktiID = ?  ORDER BY porosiaID DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            echo '
            <table>
            <tr>
              <th>Numri i Porosis</th>
              <th>ID Klinetit</th>
              <th>Emri Klientit</th>
              <th>Emri i Produktit</th>
              <th>Qmimi i Produktit</th>
              <th>Sasia e Porositur</th>
              <th>Qmimi total</th>
              <th>Data e porosis</th>
              <th>Statusi i porosis</th>
            </tr>';


            foreach ($stm as $porosia) {
                echo '
                  <tr>
                    <td>' . $porosia['porosiaID'] . '</td>
                    <td>' . $porosia['userID'] . '</td>
                    <td>' . $porosia['emriKlientit'] . '</td>
                    <td>' . $porosia['emriProduktit'] . '</td>
                    <td>' . $porosia['qmimiProduktit'] . ' €</td>
                    <td>' . $porosia['sasiaPorositur'] . '</td>
                    <td>' . $porosia['qmimiTotal'] . ' €</td>
                    <td>' . $porosia['dataPorosis'] . '</td>
                    <td>' . $porosia['statusiPorosis'] . '</td>
                  </tr>
                ';
            }
            echo '</th>
          </table>';

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqTeGjithaPorosite()
    {
        try {
            $sql = "SELECT * from `porosia` inner join produkti on porosia.produktiID = produkti.produktiID ORDER BY porosiaID DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorosinSipasID()
    {
        try {
            $sql = "SELECT * from `porosia` inner join produkti on porosia.produktiID = produkti.produktiID where porosiaID = ?  ORDER BY porosiaID DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoStatusinPorosis()
    {
        try {
            $sql = "UPDATE `porosia` SET `statusiPorosis`= ? WHERE `porosiaID` = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->statusiPorosis, $this->porosiaID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function numriIPorosisNeKonfirmim()
    {
        try {
            $sql = "SELECT porosiaID from `porosia` ORDER BY porosiaID DESC LIMIT 1";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>