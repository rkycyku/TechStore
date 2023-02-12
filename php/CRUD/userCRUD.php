<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class userCRUD extends dbCon
{
    private $userID;
    private $emri;
    private $mbiemri;
    private $username;
    private $email;
    private $password;
    private $aksesi;
    private $nrKontaktit;
    private $qyteti;
    private $zipKodi;
    private $adresa;
    private $dbConn;

    public function __construct($userID = '', $emri = '', $mbiemri = '', $username = '', $email = '', $password = '', $aksesi = '')
    {
        $this->userID = $userID;
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->aksesi = $aksesi;

        $this->dbConn = $this->connDB();
    }

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

    public function getMbiemri()
    {
        return $this->mbiemri;
    }

    public function setMbiemri($mbiemri)
    {
        $this->mbiemri = $mbiemri;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAksesi()
    {
        return $this->aksesi;
    }

    public function setAksesi($aksesi)
    {
        $this->aksesi = $aksesi;
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

    public function getZipKodi()
    {
        return $this->zipKodi;
    }

    public function setZipKodi($zipKodi)
    {
        $this->zipKodi = $zipKodi;
    }

    public function getAdresa()
    {
        return $this->adresa;
    }

    public function setAdresa($adresa)
    {
        $this->adresa = $adresa;
    }

    public function shtoUser()
    {
        try {
            $sql = "INSERT INTO `user`(`emri`, `mbiemri`, `username`, `email`, `password`) VALUES (?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emri, $this->mbiemri, $this->username, $this->email, $this->password]);

            $_SESSION['regMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function idKlientiNeRegjistrim()
    {
        try {
            $sql = 'SELECT userID from user ORDER BY userID DESC LIMIT 1';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shtoAdresen()
    {
        try {
            $sql = "INSERT INTO `tedhenatuser`(`userID`) VALUES (?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kontrolloUser()
    {
        try {
            $sql = 'SELECT * from user WHERE username = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->username]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kontrolloLlogarin()
    {
        try {
            $sql = 'SELECT * from user WHERE username = ? and password = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->username, $this->password]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqSipasID()
    {
        try {
            $sql = 'SELECT * from user u INNER JOIN tedhenatuser t ON u.userID = t.userID WHERE u.userID = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function shfaqTeGjithePerdoruesit()
    {
        try {
            $sql = 'SELECT * from user';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoTeDhenatAdmini($akses)
    {
        try {
            if ($akses == true) {
                $sql = "UPDATE user set `emri` = ?, `mbiemri` = ?, `aksesi` = ?   where userID = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emri, $this->mbiemri, $this->aksesi, $this->userID]);
            }else{
                $sql = "UPDATE user set `emri` = ?, `mbiemri` = ? where userID = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->emri, $this->mbiemri, $this->userID]);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function perditesoTeDhenat()
    {
        try {
            $sql = "UPDATE user set `username` = ?, `emri` = ?, `mbiemri` = ?, `email` = ? where userID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->username, $this->emri, $this->mbiemri, $this->email, $this->userID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function perditesoAdresen()
    {
        try {
            $sql = "UPDATE tedhenatuser set `nrKontaktit` = ?, `qyteti` = ?, `zipKodi` = ?, `adresa` = ? where userID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->nrKontaktit, $this->qyteti, $this->zipKodi, $this->adresa, $this->userID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function perditesoFjalekalimin()
    {
        try {
            $sql = "UPDATE user set `password` = ? where userID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->password, $this->userID]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}

?>