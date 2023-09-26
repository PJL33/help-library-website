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
$r = $PDO->prepare("SELECT `email`, `password` FROM loggers WHERE email = '$email' AND `password` = '$pass'");
$r->execute();
$logger = $r->fetchAll(PDO::FETCH_ASSOC);
$isempty = (int)empty($logger);
print_r($logger);

if($isempty)
{
    header("Location: wrong.html");
}
else
{
    header("Location: home.html"); 
}
// foreach($logger as $e)
// {
//     echo $e;
// }

// $r->execute();
?>