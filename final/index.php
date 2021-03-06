<?php

$host = "db5000292606.hosting-data.io";
$username = "dbu313598";
$password = "8uBPJRg87cNYTnp**";
$database = "dbs285845";

try {
    $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
} catch (Exception $e) {}

$queryins = $db->prepare("UPDATE pagecount set count = count + 1 WHERE page = 'home'");
$queryins->execute();


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css"/>

    <title>Final Project</title>
</head>
<body>

<nav class="navbar navbar-expand-lg fade2500 navbar-light bg-light star-wars-nav">
    <a class="navbar-brand" href="index.php">Matt's Final</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="link.php">Link Shortener</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="counter.php">Page Counter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guestbook.php">Guest Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="starwars.php">Star Wars</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container body-container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="display-4 d-none d-sm-block">
                Welcome to my site!
            </div>
            <div class="display-5-msb d-sm-none">
                Welcome to my site!
            </div>
            <div class="lead">
                This is my final project.
            </div>
            <div class="mt-1 mb-3 text-center">
                 To be honest, I ran out of requirements building the other
                four pages, so here is homestarrunner.com's "Everybody To The Limit."
            </div>
            <div class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/KFNcStdF_Ok" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col text-muted small text-center">
            2020 No Rights Reserved
        </div>
        <div class="col text-muted small text-center">
            Thanks for coming!
        </div>
    </div>
</div>


<!-- javascript libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>