<?php

$username="root";
	$password="";
	$servername="localhost";
	$db="doctor_appointments";

	$conn = mysqli_connect($servername,$username,$password,$db);
//connecting database
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#0e47a1">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
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
	<div class="container my-md-4 my-0">
		
		<!-- main form -->
		<form  method="POST"  class="needs-validation" enctype="multipart/form-data" >
			
			<input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="4000000" />
			
			<h5>Manage Doctors</h5>
			<hr>
			<div class="form-row">
				<div class="col-12 my-2 errors">
					<!-- submit form error -->
				</div>
				<div class="col-12 my-3">
			
		<input type="submit" name="click" value=" Add +" href="dashup3.php" target="home" onclick="createfunction()" style="background-color: #4CAF50;
    border: none;
    color: white;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
    cursor: pointer;
    border-radius: 4px;
	margin-left: 950px;
	
	">
		<br><br><table  id="mytable">
		
		<th style="font-size:15px;">Id</th>                         <!--color:#097969;-->
		<th style="font-size:15px;">Name</th>
		<th style="font-size:15px;">Specialization</th>
		<th style="font-size:15px;">Available Time</th>
		<th style="font-size:15px;">View Details</th>
		<th style="font-size:15px;">Edit</th>
		<th style="font-size:15px;">Delete</th>
				
				
				 <?php
    $conn = mysqli_connect("localhost", "root", "", "doctor_appointments");
    $q = "SELECT * FROM `doctors`";
    $res = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_assoc($res)) {
    ?>
				 <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td><?php echo $row['time']; ?></td>
            <td><a href="view_D.php?id=<?php echo $row['id']; ?>">View Doctors</a></td>
            <td><a href="edit_doctor.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete_doctor.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</a></td>
        </tr>
    <?php 
    } 
    ?>
</table>
			
</div>			
			</div>
		
			
			
		</form>
		<!-- main form closing -->

	</div>
	<!-- container closing -->
	</html>
<?php
if(isset($_POST['click'])){
	echo"<script>window.location.href='add_doctor.php'</script>";
}
?>
<?php
// Connect to the database
$host = 'localhost';
$dbname = 'doctor_appointments';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute the count query
    $stmt = $pdo->query("SELECT COUNT(*) FROM doctors");
    $tableCount = $stmt->fetchColumn();

    // Check if table is empty
    if ($tableCount == 0) { 
        // Redirect to sample page ?>
       <script>let b= document.getElementById('mytext').style.display='block';
	   let c= document.getElementById('mytable').style.display='none';</script>
       
   <?php } else { 
        // Redirect to another page ?>
      <script>let d= document.getElementById('mytable').style.display='block';
	    let e= document.getElementById('mytext').style.display='none';</script>
     <?php 
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>