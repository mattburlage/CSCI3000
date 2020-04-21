<?php

    $host = "db5000292606.hosting-data.io";
    $username = "dbu313598";
    $password = "8uBPJRg87cNYTnp**";
    $database = "dbs285845";

    try {
        $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
    } catch (Exception $e) {}

    $query = $db->prepare("SELECT * FROM pagecount ORDER BY count DESC");
    $query->bindParam(1, $room);

    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

