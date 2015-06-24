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













