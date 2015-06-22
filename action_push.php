<?php

require_once 'dbconnect.php';

abstract class WorkWithText
{

    abstract public function setText($text);
    abstract public function correctText($text);
    abstract public function run($text);

}

class WorkWithEmail extends WorkWithText
{
    public $text;
    public $username;
    public $email;

    public function setText($text){
        $this->text = $_POST['text'];

        return $this;
    }
    public function setEmail($email){
        $this->email = $_POST['name'];
    }
    public function correctText($text){
        $this-> text = str_replace('username',$this->name, $this->text);
    }
    public function setUsername($username){
        $this->username = $_POST['username'];
    }
    public function run($text){
        mail($this->email, "My Subject", $this->text);
    }
}

class WorkWithFiles extends WorkWithText
{
    public $text;
    public $username;
    public $file;

    public function setText($text){
        $this->text = $_POST['text'];

        return $this;
    }
    public function setFiles($filename)
    {
        $this->filename = $_POST['name'];
        $this->file = fopen("C:/$this->filename.txt", "w+");
    }
    public function correctText($text){
        $this->text = str_replace('username',$this->username, $this->text);
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function run($text){
        fwrite($this->file, $this->text);
    }
}

class writeInDB extends  DbConnect
{

    function __construct()
    {
        $this->filename = $_POST['name'];
        $this->email = $_POST['name'];
        $this->text = $_POST['text'];
        $this->username = $_POST['username'];

        parent:: __construct();
        $this -> result = 'INSERT INTO users(id, username) VALUES ("", "' . $this->username . '")';
        $queryResult = $this -> conn->query($this -> result);
    }

    function writeEmailsInDB()
    {
        $this -> result = 'INSERT INTO emails(id, login, text) VALUES ("", "' . $this->email . '", "' . $this->text . '")';
        $queryResult = $this -> conn->query($this -> result);

        if ($queryResult == 'TRUE') {
            echo " You have successfully emails writing in DB!";
        } else {
            echo "Error! You are emails not writing in DB.</a>";
        }
    }

    function writeFilesInDB()
    {

        $this -> result = 'INSERT INTO files(id, filename, text) VALUES ("", "' . $this->filename . '", "' . $this->text . '")';
        $queryResult = $this -> conn->query($this -> result);

        if ($queryResult == 'TRUE') {
            echo "You have successfully file writing in DB!";
        } else {
            echo "Error! You are not created file.</a>";
        }
    }
}

if ($_POST['option'] == 'email') {
    $obj = new WorkWithEmail();
    $obj->setText($text);
    $obj->setUsername($username);
    $obj->setEmail($email);
    $obj->run($text);
    echo "E-mail send";
    $objregistration = new writeInDB();
    $objregistration->writeEmailsInDB();
}
elseif ($_POST['option'] == 'file') {
    $obj = new WorkWithFiles();
    $obj->setText($text);
    $obj->setFiles($filename);
    $obj->setUsername($username);
    $obj->run($text);
    $objregistration = new writeInDB();
    $objregistration->writeFilesInDB();
    echo "File is created";
}
else echo "Enter option";











