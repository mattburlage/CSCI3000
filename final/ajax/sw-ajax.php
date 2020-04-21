<?php

$host = "db5000292606.hosting-data.io";
$username = "dbu313598";
$password = "8uBPJRg87cNYTnp**";
$database = "dbs285845";

try {
    $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
} catch (Exception $e) {}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title']) && $_POST['title'] != '' ) {

    $title = $_POST['title'];
    $data = $_POST['data'];

    $queryins = $db->prepare("INSERT INTO starwars (title, data) VALUES (?, ?)");
    $queryins->bindParam(1, $title);
    $queryins->bindParam(2, $data);

    $insres = $queryins->execute();

    $returndata = array("status"=>'ok');
    echo json_encode($returndata);

} else {
    $returndata = array("status"=>'No title');
    echo json_encode($returndata);
}
