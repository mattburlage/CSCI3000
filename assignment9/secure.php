<!DOCTYPE html>
<html>
<head>
    <title>Assignment 9</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form method="POST">
    <div class="container mt-5">
        <div class="row mb-5 mt-3">
            <div class="col">
                <div class="display-4">Student Registration</div>
                <div>
                    To try and delete all of my data, type the following into the Email field:<br><br>
                    <pre>email@email.com'); TRUNCATE TABLE registration; --</pre>
                    Or try on the <a href="insecure.php">insecure page.</a>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-4">
                <label>First Name:</label>
                <input type="text" name="first_name" class="form-control">

            </div>
            <div class="col-4">
                <label>Last Name:</label>
                <input type="text" name="last_name" class="form-control">

            </div>
            <div class="col-4">
                <label>Email:</label>
                <input type="text" name="email" class="form-control">

            </div>
            <div class="col-4">
                <label>Class Status:</label>
                <select name="class_status" class="form-control">
                    <option value="" selected>---------</option>
                    <option value='Freshman'>Freshman</option>
                    <option value='Sophomore'>Sophomore</option>
                    <option value='Junior'>Junior</option>
                    <option value='Senior'>Senior</option>
                </select>

            </div>
            <div class="col-4">
                <label>Resident Status:</label>
                <select name="resident" class="form-control">
                    <option value="" selected>---------</option>
                    <option value='Resident'>Resident</option>
                    <option value='Commuter'>Commuter</option>
                </select>

            </div>
            <div class="col-4 mt-4">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

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

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    $values = array(
                        "first_name" => $_POST["first_name"],
                        "last_name" => $_POST["last_name"],
                        "email" => $_POST["email"],
                        "class_status" => $_POST["class_status"],
                        "resident" => $_POST["resident"],
                    );
                    $validated = array(
                        "first_name" => false,
                        "last_name" => false,
                        "email" => false,
                        "class_status" => false,
                        "resident" => false,
                    );
                    $all_valid = true;

                    foreach ($values as $key => $value) {
                        if ($value == "") {
                            $all_valid = false;
                        } else {
                            $validated[$key] = true;
                        }
                    }

                    if ($all_valid) {

                        $query = $db->prepare("INSERT INTO registration (first_name, last_name, email,
						class_status, residence_status)
						VALUES  (?, ?, ?, ?, ?)");
                        $query->bindParam(1, $values['first_name']);
                        $query->bindParam(2, $values['last_name']);
                        $query->bindParam(3, $values['email']);
                        $query->bindParam(4, $values['class_status']);
                        $query->bindParam(5, $values['resident']);

                        $query->execute();

                    } else {
                        echo("Errors: <br>");
                        if (!$validated['first_name']) echo('First name is required.<br>');
                        if (!$validated['last_name']) echo('Last name is required.<br>');
                        if (!$validated['email']) echo('Email is required.<br>');
                        if (!$validated['class_status']) echo('Class status is required.<br>');
                        if (!$validated['resident']) echo('Residence status is required.<br>');
                    }
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
</form>
</body>
</html>

