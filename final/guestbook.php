<?php

$colors = array (
    "" => "Select One",
    "white" => "White",
    "red" => "Red",
    "orange" => "Orange",
    "yellow" => "Yellow",
    "green" => "Green",
    "blue" => "Blue",
    "purple" => "Purple",
    "black" => "Black",
    "aliceblue" => "Alice Blue",
    "antiquewhite" => "Antique White",
    "aqua" => "Aqua",
    "aquamarine" => "Aquamarine",
    "azure" => "Azure",
    "beige" => "Beige",
    "bisque" => "Bisque",
    "blanchedalmond" => "Blanched Almond",
    "blueviolet" => "Blue Violet",
    "brown" => "Brown",
    "burlywood" => "Burly Wood",
    "cadetblue" => "Cadet Blue",
    "chartreuse" => "Chartreuse",
    "chocolate" => "Chocolate",
    "coral" => "Coral",
    "cornflowerblue" => "Corn Flower Blue",
    "cornsilk" => "Corn Silk",
    "crimson" => "Crimson",
    "cyan" => "Cyan",
    "darkblue" => "Dark Blue",
    "darkcyan" => "Dark Cyan",
    "darkgoldenrod" => "Dark Goldenrod",
    "darkgray" => "Dark Gray",
    "darkgreen" => "Dark Green",
    "darkkhaki" => "Dark Khaki",
    "darkmagenta" => "Dark Magenta",
    "darkolivegreen" => "Dark Olive Green",
    "darkorange" => "Dark Orange",
    "darkorchid" => "Dark Orchid",
    "darkred" => "Dark Red",
    "darksalmon" => "Dark Salmon",
    "darkseagreen" => "Dark Sea Green",
    "darkslateblue" => "Dark Slate Blue",
    "darkslategray" => "Dark Slate Gray",
    "darkturquoise" => "Dark Turquoise",
    "darkviolet" => "Dark Violet",
    "deeppink" => "Deep Pink",
    "deepskyblue" => "Deep Sky Blue",
    "dimgray" => "Dim Gray",
    "dodgerblue" => "Dodger Blue",
    "firebrick" => "Fire Brick",
    "floralwhite" => "Floral White",
    "forestgreen" => "Forest Green",
    "fuschia" => "Fuschia",
    "gainsboro" => "Gainsboro",
    "ghostwhite" => "Ghost White",
    "gold" => "Gold",
    "goldenrod" => "Goldenrod",
    "gray" => "Gray",
    "greenyellow" => "Green Yellow",
    "honeydew" => "Honeydew",
    "hotpink" => "Hot Pink",
    "indianred" => "Indian Red",
    "indigo" => "Indigo",
    "ivory" => "Ivory",
    "khaki" => "Khaki",
    "lavender" => "Lavender",
    "lavenderblush" => "Lavender Blush",
    "lemonchiffon" => "Lemon Chiffon",
    "lightblue" => "Light Blue",
    "lightcoral" => "Light Coral",
    "lightcyan" => "Light Cyan",
    "lightgoldenrodyellow" => "Light Goldenrod Yellow",
    "lightgreen" => "Light Green",
    "lightgrey" => "Light Grey",
    "lightpink" => "Light Pink",
    "lightsalmon" => "Light Salmon",
    "lightseagreen" => "Light Sea Green",
    "lightskyblue" => "Light Sky Blue",
    "lightslategray" => "Light Slate Gray",
    "lightsteelblue" => "Light Steel Blue",
    "lightyellow" => "Light Yellow",
    "lime" => "Lime",
    "limegreen" => "Lime Green",
    "linen" => "Linen",
    "magenta" => "Magenta",
    "maroon" => "Maroon",
    "mediumaquamarine" => "Medium Aquamarine",
    "mediumblue" => "Medium Blue",
    "mediumorchid" => "Medium Orchid",
    "mediumpurple" => "Medium Purple",
    "mediumseagreen" => "Medium Sea Green",
    "mediumslateblue" => "Medium Slate Blue",
    "mediumspringgreen" => "Medium Spring Green",
    "mediumturquoise" => "Medium Turquoise",
    "mediumvioletred" => "Medium Violet Red",
    "midnightblue" => "Midnight Blue",
    "mintcream" => "Mint Cream",
    "mistyrose" => "Misty Rose",
    "navajowhite" => "Navajo White",
    "navy" => "Navy",
    "oldlace" => "Old Lace",
    "olive" => "Olive",
    "olivedrab" => "Olive Drab",
    "orangered" => "Orange Red",
    "orchid" => "Orchid",
    "palegoldenrod" => "Pale Goldenrod",
    "palegreen" => "Pale Green",
    "paleturquoise" => "Pale Turquoise",
    "palevioletred" => "Pale Violet Red",
    "papayawhip" => "Papaya Whip",
    "peachpuff" => "Peach Puff",
    "peru" => "Peru",
    "pink" => "Pink",
    "plum" => "Plum",
    "powderblue" => "Powder Blue",
    "rosybrown" => "Rosy Brown",
    "royalblue" => "Royal Blue",
    "saddlebrown" => "Saddle Brown",
    "seagreen" => "Sea Green",
    "seashell" => "Sea Shell",
    "sienna" => "Sienna",
    "silver" => "Silver",
    "skyblue" => "Sky Blue",
    "slateblue" => "Slate Blue",
    "slategray" => "Slate Gray",
    "snow" => "Snow",
    "springgreen" => "Spring Green",
    "steelblue" => "Steel Blue",
    "tan" => "Tan",
    "teal" => "Teal",
    "thistle" => "Thistle",
    "tomato" => "Tomato",
    "turquoise" => "Turquoise",
    "violet" => "Violet",
    "wheat" => "Wheat",
    "whitesmoke" => "White Smoke",
    "yellowgreen" => "Yellow Green",
);

$host = "db5000292606.hosting-data.io";
$username = "dbu313598";
$password = "8uBPJRg87cNYTnp**";
$database = "dbs285845";

try {
    $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
} catch (Exception $e) {}

$message = "Please leave a nice comment below. Or don't. Whatever.";
$messageClass = '';
$defaultColor = '';

$defaultValues = array (
    "name" => '',
    "color" => '',
    "catchphrase" => '',
    "message" => '',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $values = array(
        "name" => trim($_POST['name']),
        "color" => trim($_POST['color']),
        "catchphrase" => trim($_POST['catchphrase']),
        "message" => trim($_POST['message']),
    );

    $errorField = '';
    foreach ($values as $key => $value) {
        if (strlen($value) == 0){
            $errorField = $key;
        }
    }

    if ($errorField == '') {
        $queryins = $db->prepare("INSERT INTO guestbook (name, color, catchphrase, message) VALUES (?, ?, ?, ?)");
        $queryins->bindParam(1, $values['name']);
        $queryins->bindParam(2, $values['color']);
        $queryins->bindParam(3, $values['catchphrase']);
        $queryins->bindParam(4, $values['message']);

        $queryins->execute();
    } else {
        $message = ucfirst($errorField)." cannot be blank.";
        $messageClass = 'text-danger';
        $defaultValues = $values;
        $defaultColor = $values['color'];
    }

}

$query = $db->prepare("SELECT * FROM guestbook ORDER BY id DESC LIMIT 100");

$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>

    <title>Final Project</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Matt's Final</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Page 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Page 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Page 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Page 4</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Guest Book</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container body-container">
    <div class="row mt-5 mb-2">
        <div class="col-12">
            <div class="jumbotron">
                <h1 class="display-4">Thank you!</h1>
                <p class="lead">for visiting my site.</p>
                <p class="<? echo $messageClass ?>"><? echo $message ?></p>
                <hr class="my-4">
                <form method="post">

                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <label for="id_name">Name:</label>
                            <input value="<? echo $defaultValues['name'] ?>" class="form-control mb-2" id="id_name" name="name" />
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="id_color">Favorite Color:</label>
                            <select class="form-control mb-2" id="id_color" name="color">
                                <?
                                foreach ($colors as $key => $color) {
                                    if ($color == $defaultColor) {
                                        echo "<option selected value='".$key."'>".$color."</option>";

                                    } else {
                                        echo "<option value='".$key."'>".$color."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <label for="id_phrase">Catchphrase:</label>
                            <input value="<? echo $defaultValues['catchphrase'] ?>" class="form-control mb-2" id="id_phrase" name="catchphrase" />
                        </div>
                        <div class="col-12">
                            <label for="id_message">Message:</label>
                            <textarea name="message" class="form-control" id="id_message" rows="7">
                                <? echo $defaultValues['message'] ?>
                            </textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary mt-2">Submit Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <?
        foreach ($results as $row) {
            echo "
            <div class=\"col-3\">
                <div class=\"card\" style='background-color: ".$row['color'].";'>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">".$row['name']."</h5>
                        <h6 class=\"card-subtitle mb-2 text-muted\">".$row['catchphrase']."</h6>
                        <p class=\"card-text\">".$row['message']."</p>
                    </div>
                </div>
            </div>
            ";
        }
        ?>

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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>