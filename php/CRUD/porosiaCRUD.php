<?php
require_once('../db/dbcon.php');

class porosiaCRUD extends dbCon
{
    private $porosiaID;
    private $produktiID;
    private $userID;
    private $qmimiProd;
    private $sasiaPorositur;
    private $qmimiTotal;
    private $statusiPorosis;
    private $kodiZbritjes;
    private $dbConn;

    public function __construct($porosiaID = '', $produktiID = '', $userID = '', $qmimiProd = '', $sasiaPorositur = '', $qmimiTotal = '', $statusiPorosis = '', $kodiZbritjes = '')
    {
        $this->porosiaID = $porosiaID;
        $this->produktiID = $produktiID;
        $this->userID = $userID;
        $this->qmimiProd = $qmimiProd;
        $this->sasiaPorositur = $sasiaPorositur;
        $this->qmimiTotal = $qmimiTotal;
        $this->statusiPorosis = $statusiPorosis;
        $this->kodiZbritjes = $kodiZbritjes;

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

    public function getKodiZbritjes()
    {
        return $this->kodiZbritjes;
    }

    public function setKodiZbritjes($kodiZbritjes)
    {
        $this->kodiZbritjes = $kodiZbritjes;
    }

    public function shtoPorosin()
    {
        try {
            $sql = "INSERT INTO `porosit`(`idKlienti`, `TotaliPorosis`, `kodiZbritjes`) VALUES (?, ?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID, $this->qmimiTotal, $this->kodiZbritjes]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shtoTeDhenatPorosis()
    {
        try {
            $sql = "INSERT INTO `tedhenatporosis`(`idPorosia`, `idProdukti`, `qmimiProd`, `sasiaPorositur`, `qmimiTotal`) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID, $this->produktiID, $this->qmimiProd, $this->sasiaPorositur, $this->qmimiTotal]);
            $stm->closeCursor();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorositEKlientit()
    {
        try {
            $sql = "SELECT * from porosit p  where p.idKlienti = ? ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);

            ?>
            <table>
                <tr>
                    <th>Numri i Porosis</th>
                    <th>Qmimi total</th>
                    <th>Data e porosis</th>
                    <th>Statusi i porosis</th>
                    <th>Funksione</th>
                </tr>

                <?php
                foreach ($stm as $porosia) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $porosia['nrPorosis'] ?>
                        </td>
                        <td>
                            <?php echo $porosia['TotaliPorosis'] ?> €
                        </td>
                        <td>
                            <?php echo $porosia['dataPorosis'] ?>
                        </td>
                        <td>
                            <?php echo $porosia['statusiPorosis'] ?>
                        </td>

                        <td>
                            <?php
                            if ($porosia['idKlienti'] == $_SESSION['userID'] && $porosia['statusiPorosis'] == 'E Derguar') {
                                ?>
                                <button class="edito"><a
                                        href="../funksione/konfirmoPorosin.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>"><i
                                            class="fa-regular">&#xf058;</i></a></button>
                                <?php
                            }
                            ?>
                            <a href="../funksione/fatura.php?nrPorosis=<?php echo $porosia["nrPorosis"] ?>" target="_blank"><button
                                    class="edito"><i class="fa-solid">&#xf56d;</i></button></a>
                            <button class="edito"><a
                                    href="../userPages/detajetPorosis.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>"><i
                                        class="fa-solid">&#xf05a;</i></a></button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </th>
            </table>
            <?php
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqPorositSipasProduktit()
    {
        try {
            $sql = "SELECT p.*, pr.emriProduktit from porosit p 
            inner join tedhenatporosis tu on p.nrPorosis = tu.idPorosia 
            inner join produkti pr on tu.idProdukti = pr.produktiID
            where tu.idProdukti = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            ?>

            <table>
                <tr>
                    <th>Numri i Porosis</th>
                    <th>Qmimi total</th>
                    <th>Data e porosis</th>
                    <th>Statusi i porosis</th>
                    <th>Funksione</th>
                </tr>

                <?php
                foreach ($stm as $porosia) {
                    $_SESSION['emriProduktit'] = $porosia['emriProduktit'];
                    ?>
                    <tr>
                        <td>
                            <?php echo $porosia['nrPorosis'] ?>
                        </td>
                        <td>
                            <?php echo $porosia['TotaliPorosis'] ?> €
                        </td>
                        <td>
                            <?php echo $porosia['dataPorosis'] ?>
                        </td>
                        <td>
                            <?php echo $porosia['statusiPorosis'] ?>
                        </td>
                        <?php
                        ?>
                        <td>
                            <a href="../funksione/fatura.php?nrPorosis=<?php echo $porosia["nrPorosis"] ?>" target="_blank"><button
                                    class="edito"><i class="fa-solid">&#xf56d;</i></button></a>
                            <button class="edito"><a
                                    href="../userPages/detajetPorosis.php?porosiaID=<?php echo $porosia['nrPorosis'] ?>"><i
                                        class="fa-solid">&#xf05a;</i></a></button>
                        </td>
                        <?php
                        ?>
                    </tr>
                    <?php
                }
                ?>
                </th>
            </table>
            <?php
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqTeGjithaPorosite()
    {
        try {
            $sql = "SELECT p.nrPorosis, u.emri, u.mbiemri, 
                    tu.nrKontaktit, tu.qyteti, tu.zipKodi, tu.adresa, p.dataPorosis, p.TotaliPorosis, p.statusiPorosis, p.kodiZbritjes
                    from porosit p 
                    inner join user u on u.userID = p.idKlienti 
                    inner join tedhenatuser tu on u.userID = tu.userID 
                    ORDER BY nrPorosis DESC;";
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
            $sql = "SELECT p.nrPorosis, p.idKlienti, t.idProdukti, pr.emriProduktit, 
                    t.qmimiProd, t.sasiaPorositur, t.qmimiTotal, pr.fotoProduktit, 
                    u.emri, u.mbiemri, u.email, tu.nrKontaktit, tu.qyteti, tu.zipKodi, tu.adresa, p.dataPorosis, p.TotaliPorosis
                    from porosit p 
                    inner join tedhenatporosis t on p.nrPorosis = t.idPorosia 
                    inner join produkti pr on t.idProdukti = pr.produktiID
                    inner join user u on u.userID = p.idKlienti 
                    inner join tedhenatuser tu on u.userID = tu.userID 
                    where nrPorosis = ? 
                    ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqProduktetEPorosisSipasID()
    {
        try {
            $sql = "SELECT p.nrPorosis, p.idKlienti, t.idProdukti, pr.emriProduktit, 
                    t.qmimiProd, t.sasiaPorositur, t.qmimiTotal, pr.fotoProduktit, p.dataPorosis, p.TotaliPorosis
                    from porosit p 
                    inner join tedhenatporosis t on p.nrPorosis = t.idPorosia 
                    inner join produkti pr on t.idProdukti = pr.produktiID
                    inner join user u on u.userID = p.idKlienti 
                    inner join tedhenatuser tu on u.userID = tu.userID 
                    where nrPorosis = ? 
                    ORDER BY nrPorosis DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->porosiaID]);

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoStatusinPorosis()
    {
        try {
            $sql = "UPDATE `porosit` SET `statusiPorosis`= ? WHERE `nrPorosis` = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->statusiPorosis, $this->porosiaID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function numriIPorosisNeKonfirmim()
    {
        try {
            $sql = "SELECT nrPorosis from `porosit` ORDER BY nrPorosis DESC LIMIT 1";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kaPorosiProdukti()
    {
        try {
            $sql = "SELECT tu.idProdukti from porosit p 
            inner join tedhenatporosis tu on p.nrPorosis = tu.idPorosia 
            where tu.idProdukti = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>