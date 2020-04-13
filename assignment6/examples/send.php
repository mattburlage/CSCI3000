<?
    $host = "db5000292606.hosting-data.io";
    $username = "dbu313598";
    $password = "8uBPJRg87cNYTnp**";
    $database = "dbs285845";

    try {
        $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
    } catch (Exception $e) {

    }




    $query = $db->prepare("SELECT * FROM registration WHERE first_name LIKE ? OR last_name LIKE ? LIMIT 5");
    $query->bindParam(1, $name);
    $query->bindParam(2, $name);

    if(isset($_GET['name']) && strlen(trim($_GET['name'])) > 0) {
        $name = trim($_GET['name'])."%";
    } else {
        $name = "j%";
    }

    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    /*
        Example Row
        [id] => 27
        [timestamp] => 2020-02-10 18:10:00
        [first_name] => Matthew
        [last_name] => Smith-Burlage
        [class_status] => Senior
        [residence_status] => Commuter
        [email] => mattburlage@gmail.com
     */

    if(isset($_GET['format']) && strtolower(trim($_GET['format'])) == 'json') {
        echo json_encode($results);
    } else {
        if (count($results) > 0) {
            echo "<ul>";
            foreach ($results as $row) {
                echo "<li>".$row['first_name']." " . $row['last_name'].": ".$row['email']."</li>";
            }
            echo "</ul>";
        } else {
            echo "No results found.";
        }
    }