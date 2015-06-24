<?php

require_once 'class/workwithtext.php';
require_once 'class/writeindb.php';

if ($_POST['option'] == 'email') {
    $obj = new WorkWithEmail();
    $obj->setText($text);
    $obj->setUsername($username);
    $obj->setEmail($email);
    $obj->run($text);
    $objregistration = new writeInDB();
    $objregistration->writeInDataBase();
    echo "E-mail send!";
}
elseif ($_POST['option'] == 'files') {
    $obj = new WorkWithFiles();
    $obj->setText($text);
    $obj->setFiles($filename);
    $obj->setUsername($username);
    $obj->run($text);
    $objregistration = new writeInDB();
    $objregistration->writeInDataBase();
    echo "File is created!";
}
else echo "Enter option";