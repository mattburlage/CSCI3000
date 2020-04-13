<!DOCTYPE html>
<html>
<head>
    <title>Assignment 4</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row mb-5 mt-3">
        <div class="col">
            <div class="display-4">Student Registration</div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form method="POST">
                <label>First Name:
                    <input type="text" name="first_name" class="form-control">
                </label>
                <br>
                <label>Last Name:
                    <input type="text" name="last_name" class="form-control">
                </label>
                <br>
                <label>Class Status:
                    <select name="class_status" class="form-control">
                        <option value="" selected>---------</option>
                        <option value='Freshman'>Freshman</option>
                        <option value='Sophomore'>Sophomore</option>
                        <option value='Junior'>Junior</option>
                        <option value='Senior'>Senior</option>
                    </select>
                </label>
                <br>
                <label>Resident Status:<br>
                    <input type="radio" name="resident" value="yes" > Resident
                    <input type="radio" name="resident" value="no"> Commuter
                </label>
                <br>
                <br>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

        </div>
        <div class="col-6">

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {

                $values = array(
                    "first_name" => $_POST["first_name"],
                    "last_name" => $_POST["last_name"],
                    "class_status" => $_POST["class_status"],
                    "resident" => $_POST["resident"],
                );
                $validated = array(
                    "first_name" => false,
                    "last_name" => false,
                    "class_status" => false,
                    "resident" => false,
                );
                $all_valid = true;

                foreach ($values as $key => $value) {
                    if ($value != "") {
                        $validated[$key] = true;
                    } else {
                        $all_valid = false;
                    }
                }

                $all_valid_str = $all_valid ? "true" : "false";

                if ($all_valid) {
                    echo("All data is valid!<br><br>");
                    echo('
                        <table class="table table-bordered table-sm">
                            <tr>
                                <td>First Name:</td>
                                <td>' . $values['first_name'] . '</td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td>' . $values['last_name'] . '</td>
                            </tr>
                            <tr>
                                <td>Class Status:</td>
                                <td>' . $values['class_status'] . '</td>
                            </tr>
                            <tr>
                                <td>Resident Status:</td>
                                <td>' . ($values['resident'] == 'yes' ? 'Resident' : 'Commuter') . '</td>
                            </tr>
                        </table>
			        ');
                } else {
                    echo("Errors: <br><br>");
                    if (!$validated['first_name']) echo('First name is required.<br>');
                    if (!$validated['last_name']) echo('Last name is required.<br>');
                    if (!$validated['class_status']) echo('Class status is required.<br>');
                    if (!$validated['resident']) echo('Residence status is required.<br>');
                }
            }

            function clean_data($dirty_data) {
                return trim(stripslashes(htmlspecialchars($dirty_data)));
            }




            ?>

        </div>
    </div>
</div>
</body>
</html>