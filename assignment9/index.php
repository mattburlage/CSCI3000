<!DOCTYPE html>
<html>
<head>
    <title>Assignment 9</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <div class="row mb-5 mt-3">

        <div class="col-4 offset-4">
            <div class="display-4 mt-5 mb-5">Web Security</div>
            <div class="list-group">
                <a href="secure.php" class="list-group-item list-group-item-action">
                    Secure
                </a>
                <a href="insecure.php" class="list-group-item list-group-item-action">
                    Insecure</a>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="h4 text-center">Current Data</div>

            <?php

            $servername = "db5000292606.hosting-data.io";
            $username = "dbu313598";
            $password = "8uBPJRg87cNYTnp**";
            $dbname = "dbs285845";

            try {
                $db = new PDO("mysql:host=$servername; dbname=$dbname;", $username, $password);
            } catch (Exception $e) {
                echo $e;
            }

            $sql = $db->prepare("SELECT * FROM registration");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);


            if (sizeof($result) > 0) {
                // set up table html
                echo "<table class='table mt-5'>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Class</th>
								<th>Residence</th>
							</tr>
						</thead>
						<tbody>
							";
                // output data of each row
                foreach ($result as $row) {
                    echo "
					<tr>
						<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
						<td>" . $row['email'] . "</td>
						<td>" . $row['class_status'] . "</td>
						<td>" . $row['residence_status'] . "</td>
					</tr>
					
					";
                }
                // close table html
                echo "</tbody></table>";
            } else {
                echo "<div class='text-center display-4 mt-5'>0 results</div>";
            }
            $conn->close();


            ?>

        </div>
    </div>
</div>
</body>
</html>

