<?php

$host = "db5000292606.hosting-data.io";
$username = "dbu313598";
$password = "8uBPJRg87cNYTnp**";
$database = "dbs285845";

try {
    $db = new PDO("mysql:host=$host; dbname=$database;", $username, $password);
} catch (Exception $e) {}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vote_option = $_POST['vote_option'];

    $queryins = $db->prepare("INSERT INTO votes (vote_option) VALUES (?)");
    $queryins->bindParam(1, $vote_option);

    $queryins->execute();
}

$query = $db->prepare("SELECT * FROM votes");

$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
$count5 = 0;

foreach ($results as $vote) {
    if ($vote['vote_option'] == 1) $count1++;
    if ($vote['vote_option'] == 2) $count2++;
    if ($vote['vote_option'] == 3) $count3++;
    if ($vote['vote_option'] == 4) $count4++;
    if ($vote['vote_option'] == 5) $count5++;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            const rows = [
                ['Web Programming', <? echo $count1 ?>],
                ['Algorithms', <? echo $count2 ?>],
                ['Operating Systems', <? echo $count3 ?>],
                ['Software Engineering', <? echo $count4 ?>],
                ['Senior Project', <? echo $count5 ?>]
            ]

            console.log(rows)

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows(rows);

            // Set chart options
            var options = {'title':'Favorite CSCI Classes',
                'width':600,
                'height':400};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

</head>
<body>
<div class="container">
    <div class="row mt-5 mb5">
        <div class="col-4">
            <form method="POST">
                <label for="vote_option">Favorite CSCI Course:</label>
                <select class="form-control" name="vote_option" id="vote_option">
                    <option>------</option>
                    <option value="1">Web Programming</option>
                    <option value="2">Algorithms</option>
                    <option value="3">Operating Systems</option>
                    <option value="4">Software Engineering</option>
                    <option value="5">Senior Project</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Submit Vote</button>
            </form>
        </div>
        <div class="col-8">
            <div id="chart_div"></div>
        </div>
    </div>
</div>

</body>
</html>
