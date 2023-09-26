<?php

if(!empty(htmlspecialchars($_POST["firstname"])))
{
    $firstname = htmlspecialchars($_POST["firstname"]);
}

if(!empty(htmlspecialchars($_POST["lastname"])))
{
    $lastname = htmlspecialchars($_POST["lastname"]);
}

if(!empty(htmlspecialchars($_POST["gender"])))
{
    $gender = htmlspecialchars($_POST["gender"]);
}

if(!empty(htmlspecialchars($_POST["date"])))
{
    $date = htmlspecialchars($_POST["date"]);
}

if(!empty(htmlspecialchars($_POST["time"])))
{
    $time = htmlspecialchars($_POST["time"]);
}

$DB_DSN = 'mysql:host=localhost;dbname=interns';
$DB_USER = "root";
$DB_PASS = "";
$PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
$r = $PDO->prepare("INSERT INTO `visits`(firstname,lastname,gender,`date`,`time`) VALUES('$firstname','$lastname','$gender','$date','$time')");
$r->execute();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home - HELP's Library</title>
        <link rel="icon" href="library-logo.jpg">
        <link rel="stylesheet" href="home.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
        .d-flex{
            width: 80%;
            margin: auto;
            border-left: 5px green solid;
            top: 38vh;
            height :25vh;
        }
        </style>
    </head>
    <body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <div>
            You have been succesfully registered. You will br redirected to the main page in <span id="minutes">0</span>:<span id="seconds"></span>
        </div>
        </div>

    </body>
</html>
<script>
    var second = 6;
    setInterval( function(){ //repeat this code at every 1000 miliseconds
    document.getElementById("seconds").innerHTML=--second;
    }, 1000);
    setTimeout(() => { //set a timeout
        window.location = "home.html";
    }, 6000);
</script>