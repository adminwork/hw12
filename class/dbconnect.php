<?php

Class DbConnect
{
	protected $servername = "localhost";
    protected $dbName = "logging";
    protected $dbUsername;
    protected $dbPassword;
    public $conn;

    public function __construct()
    {
        $this->getConfigData();
        $this->conn = new mysqli(
            $this->servername, 
            $this->dbUsername, 
            $this->dbPassword, 
            $this->dbName
            );
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    protected function getConfigData()
    {
        $str = file_get_contents('config.ini');
        $str = strip_tags($str);
        $arr = explode("::::", $str);

        $this->dbUsername = $arr[0];
        $this->dbPassword = $arr[1];
    }

    public function runQuery($query)
    {
        return $this->conn->query($query);
    }
}