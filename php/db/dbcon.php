<?php
class dbCon
{
    private $conn = '';
    private $hostiIDB = 'localhost';
    private $emriDB = 'techstoredb';
    private $dbUsername = 'root';
    private $dbPass = '';

    public function connDB()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->hostiIDB;dbname=$this->emriDB", $this->dbUsername, $this->dbPass,
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        } catch (PDOException $pdoe) {
            die("Nuk mund të lidhej me bazën e të dhënave {$this->emriDB} :" . $pdoe->getMessage());
        }

        return $this->conn;
    }


}

?>