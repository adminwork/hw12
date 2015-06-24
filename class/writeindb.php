<?php

class writeInDB extends  DbConnect
{

    function __construct()
    {
        $this->nameTables = $_POST['option'];
        $this->name = $_POST['name'];
        $this->text = $_POST['text'];
        $this->username = $_POST['username'];

        parent:: __construct();

    }

    function writeInDataBase()
    {
        $result = 'INSERT INTO users(id, username) VALUES ("", "' . $this->username . '")';
        $queryResult = $this->runQuery($result);

        if ($this->nameTables == 'files') {
         $peremen = "filename";
        }
        else {$peremen = "login";}

        $result = 'INSERT INTO  "' . $this->nameTables . '"(id, "' .$peremen . '", text) VALUES ("", "' . $this->name . '", "' . $this->text . '")';
        $queryResult = $this->runQuery($result);

        if ($queryResult == 'TRUE') {
          echo "You have successfully " . $this->nameTables ." writing in DB!";
        }
        else {
          echo "Error! You are " . $this->nameTables ." not writing in DB.</a>";
        }
    }
}
