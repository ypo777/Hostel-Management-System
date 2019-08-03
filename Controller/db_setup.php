<?php
/**
 *
 */
class Database
{

    public $dbname = "mysql:host=localhost;dbname=Hostel";
    public $username = "root";
    public $password  =  "password";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO($this->dbname,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }
        catch (PDOException $exception)
        {
            echo "DataBase Connection Error : ".$exception->getMessage();
        }

        return $this->conn;
    }



}


?>
