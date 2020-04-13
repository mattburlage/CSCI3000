<!DOCTYPE html>
<html>
<head>
    <title>Assignment 5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<form method="POST">
<div class="container mt-5">
    <div class="row mb-5 mt-3">
        <div class="col">
            <div class="display-4">Student Registration</div>
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

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed.");
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
					
					$sql = "INSERT INTO registration (first_name, last_name, email,
						class_status, residence_status)
						VALUES ('" . $values['first_name'] . "', '" . $values['last_name'] . 
						"', '" . $values['email'] . "', '" . $values['class_status'] . "',
						'" . $values['resident'] . "')";

					if ($conn->query($sql) !== TRUE) {
						die("Error: New record not created.");
					}
				} else {
					echo("Errors: <br>");
                    if (!$validated['first_name']) echo('First name is required.<br>');
                    if (!$validated['last_name']) echo('Last name is required.<br>');
                    if (!$validated['email']) echo('Email is required.<br>');
                    if (!$validated['class_status']) echo('Class status is required.<br>');
                    if (!$validated['resident']) echo('Residence status is required.<br>');
				}
			}
			
			$sql = "SELECT * FROM registration";
			$result = $conn->query($sql);
				

			if ($result->num_rows > 0) {
				// set up table html
				echo("<table class='table mt-5'>
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Class</th>
								<th>Residence</th>
							</tr>
						</thead>
						<tbody>
							");
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo("
					<tr>
						<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
						<td>" . $row['email'] . "</td>
						<td>" . $row['class_status'] . "</td>
						<td>" . $row['residence_status'] . "</td>
					</tr>
					
					");
				}
				// close table html
				echo ("</tbody></table>");
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

