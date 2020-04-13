<?php

    $host = "db5000292606.hosting-data.io";
    $username = "dbu313598";
    $password = "8uBPJRg87cNYTnp**";
    $database = "dbs285845";

    try {
        $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
    } catch (Exception $e) {}

    if(isset($_GET['room']) && strlen(trim($_GET['room'])) > 0) {
        $room = trim($_GET['room']);
    } else {
        $room = "lobby";
    }

    $name = $_POST['name'];
    $text = $_POST['text'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $queryins = $db->prepare("INSERT INTO chatroom (name, text, room) VALUES (?, ?, ?)");
        $queryins->bindParam(1, $name);
        $queryins->bindParam(2, $text);
        $queryins->bindParam(3, $room);

        $queryins->execute();
    }

    $query = $db->prepare("SELECT * FROM chatroom WHERE room = ? ORDER BY id DESC LIMIT 100");
    $query->bindParam(1, $room);

    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);

