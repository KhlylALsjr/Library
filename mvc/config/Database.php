<?php


class Database
{
    
private $localhost="localhost";
private $username="root";
private $password="";
private $dbname="posts";
    public $conn;



    public function getConnection()
    {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }


}