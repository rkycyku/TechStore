<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class contactFormCRUD extends dbCon
{
    private $IDmesazhi;
    private $emri;
    private $email;
    private $msg;
    private $dbConn;

    public function __construct($IDmesazhi = '', $emri = '', $email = '', $msg = '')
    {
        $this->IDmesazhi = $IDmesazhi;
        $this->emri = $emri;
        $this->email = $email;
        $this->msg = $msg;

        $this->dbConn = $this->connDB();
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    public function getIDmesazhi()
    {
        return $this->IDmesazhi;
    }

    public function setIDmesazhi($IDmesazhi)
    {
        $this->IDmesazhi = $IDmesazhi;
    }

    public function insertoMesazhin()
    {
        try {
            $sql = "INSERT INTO `contactform`(`emri`, `email`, `mesazhi`) VALUES (?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emri, $this->email, $this->msg]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function shfaqMesazhet()
    {
        try {
            $sql = "SELECT * FROM contactform order by IDmesazhi DESC";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function konfirmoMesazhin()
    {
        try {
            $sql = "UPDATE contactform set statusi = 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email' where IDmesazhi = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->IDmesazhi]);

            $_SESSION['mezashiUKonfirmua'] = true;
            echo '<script>document.location="../admin/shfaqMesazhet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}



?>