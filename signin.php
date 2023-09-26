<?php

if(!empty(htmlspecialchars($_POST["email"])))
{
    $email = htmlspecialchars($_POST["email"]);
}

if(!empty(htmlspecialchars($_POST["password"])))
{
    $pass = htmlspecialchars($_POST["password"]);
}

$DB_DSN = 'mysql:host=localhost;dbname=interns';
$DB_USER = "root";
$DB_PASS = "";
$PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
$r = $PDO->prepare("UPDATE `loggers` SET `password` = '$pass' WHERE `email` = '$email'");
$r->execute();
?>