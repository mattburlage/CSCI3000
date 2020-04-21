<?php

$host = "db5000292606.hosting-data.io";
$username = "dbu313598";
$password = "8uBPJRg87cNYTnp**";
$database = "dbs285845";

try {
    $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
} catch (Exception $e) {}

$queryins = $db->prepare("UPDATE pagecount set count = count + 1 WHERE page = 'counter'");
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
<body onresize="drawChart()">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Matt's Final</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Page 2</a>
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
        </ul>
    </div>
</nav>

<div class="container body-container text-center">
    <div class="row mt-3 mb-2">
        <div class="col-12">
            This page uses AJAX to get the current page view counts for all five pages in my project.
            Each page has PHP code to increment it's counter in the database, and this page grabs that
            data via AJAX and formats it for Google's Chart API. The button also reloads the count.
        </div>
        <div class="col-12 mt-2">
            Open this in a new tab and navigate around to change the counts.
            Then come back and press the button to see the effects.
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <button type="button" class="btn btn-primary mb-5" onclick="drawChart()">Update Page Views</button>
            <div id="chart_div"></div>

        </div>
        <div class="col-9">
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>