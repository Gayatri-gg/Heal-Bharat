<?php
$username = "root";
$password = "";
$servername = "localhost";
$db = "doctor_appointments";

$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL); // Show all errors during development

// Fetch patients
$squery = "SELECT * FROM patients";
$sres = mysqli_query($conn, $squery);

// Fetch doctors
$squery1 = "SELECT * FROM doctors";
$sres1 = mysqli_query($conn, $squery1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#0e47a1">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<style>
		:root {
			--primary-color: #0e47a1;
		}

		body {
			background-color: #f5f5f5;
		}

		form {
			padding: 32px;
			margin-bottom: 16px;
		}

		.container {
			background: rgba(14, 71, 161, 0.0500);
			border: 4px solid skyblue;
			border-radius: 6px;
			box-shadow: 0px 0px 4px var(--primary-color),
				0px 0px 8px var(--primary-color),
				0px 0px 16px var(--primary-color);
			
		}

		@media only screen and (max-width:767px) {
			.container {
				border-radius: 0px;
			}
		}

		#jyHeading {
			border: 5px solid rgba(14, 71, 161, 0.7);
		}

		#jyHeading {
			background: #f5f5f5;
			position: relative;
			top: 25px;
			left: 6%;
			padding: 32px;
			width: 90%;
			text-shadow: 0px 0px 2px var(--primary-color);
			box-shadow: 0px 4px 8px #333;
		}

		#jyHeading:after,
		#jyHeading:before {
			content: '';
			position: absolute;
			top: -46px;
			z-index: -1;
			height: 42px;
			width: 4px;
			background: rgba(14, 71, 161, 0.7);
			box-shadow: 0px -1px 2px #111;
		}

		#jyHeading:after {
			left: 64px;
		}

		#jyHeading:before {
			right: 64px;
		}


		span {
			padding: 3px;
		}

		hr {
			border: 0;
			height: 1px;
			background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
		}

		a.jyLinks {
			text-decoration: none;
		}

		.jySupportIcon {
			height: 40px;
			width: 40px;
		}

		.btn {
			transition: all 0.5s ease;
		}

		input,
		select {
			box-shadow: 0px 0px 1px #333 !important;
		}

		input[type="submit"],
		.btn-success {
			box-shadow: 0px 0px 0px 4px rgba(34, 136, 57, 0.5) !important;
		}

		input[type="submit"]:hover,
		.btn-success:hover {
			box-shadow: 0px 0px 0px 4px rgba(34, 136, 57, 0.8) !important;
		}

		.btn-primary {
			box-shadow: 0px 0px 0px 4px rgba(0, 105, 217, 0.5);
		}

		.btn-primary:hover {
			box-shadow: 0px 0px 0px 4px rgba(0, 105, 217, 0.8);
		}

		.impHeading {
			color: #ff1111;
		}

		.blinking {
			animation: blinkingText 1.5s infinite;
		}

		@keyframes blinkingText {
			0% {
				color: #ff1111;
			}

			49% {
				color: #ff1111;
			}

			60% {
				color: transparent;
			}

			99% {
				color: transparent;
			}

			100% {
				color: #ff1111;
			}
		}
		#jyBank{
         padding-bottom: 25px;
		}
	</style>
	
	
<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Roboto');
table {
    border-collapse: separate;
    text-indent: initial;
    white-space-collapse: collapse;
    text-wrap: wrap;
    line-height: normal;
    font-weight: normal;
    font-size: medium;
    font-style: normal;
    color: -internal-quirk-inherit;
    text-align: start;
    border-spacing: 2px;
    font-variant: normal;
}
td , th{
 padding: 15px 20px;
 text-align: center;
 border-color: 1px white;

}
th{
	border-color: 1px white;
 background-color: #ba68c8;
 color: #fafafa;
 font-family: 'Open Sans',Sans-serif;
 font-weight: 200;
 		
 text-transform: uppercase;

}
tr{
 width: 100%;
 background-color: #fafafa;
 font-family: 'Montserrat', sans-serif;
}
tr:nth-child(even){
 background-color: #fafafa;
}
	</style>
</head>
<body>
    <div class="container">
        <form method="POST" class="needs-validation" enctype="multipart/form-data">
            <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="4000000" />
            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Patient:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="pname" id="pname" class="form-control" required>
                            <?php
                            if (mysqli_num_rows($sres) > 0) {
                                while ($row = mysqli_fetch_assoc($sres)) {
                                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Doctor:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="dname" id="dname" class="form-control" required>
                            <?php
                            if (mysqli_num_rows($sres1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($sres1)) {
                                    echo "<option value='" . $row1['name'] . "'>" . $row1['name'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-6 mb-2">
                    <label>Appointment Date <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label>Appointment Slots <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="time" id="time" class="form-control" required>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Status <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="status" id="status" class="form-control" required>
                            <option value="Active">Active</option>
                            <option value="Attended">Attended</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 offset-md-4">
                <input type="submit" class="btn btn-success btn-block btn-lg" id="submit" name="submit" value="Submit">
            </div>
            <div class="form-row mb-3">
                <div class="col-12">
                    <hr>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

		<?php
$username = "root";
$password = "";
$servername = "localhost";
$db = "doctor_appointments";

$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL); // Show all errors during development

if (isset($_POST['submit'])) {
    $a = $_POST['pname'];
    $b = $_POST['dname'];
    $c = $_POST['date'];
    $d = $_POST['time'];
    $e = $_POST['status'];
    
    // Insert data into database
    $q = "INSERT INTO `appointments`( `patient_name`, `doctor_name`, `date`, `time`, `status`) VALUES ('$a','$b','$c','$d','$e')";
    
    if (mysqli_query($conn, $q)) {
        echo "
        <script>
            alert('Data inserted successfully');
            window.location.href='view_appointment.php'; // Redirect to a confirmation page or another page
        </script>";
    } else {
        echo "Error: " . $q . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
