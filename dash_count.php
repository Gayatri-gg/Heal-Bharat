
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
<body>

      <link rel="stylesheet" href="dashstyle.css" />
  
      <div class="home-content">
       <?php
$host = 'localhost';
$dbname = 'doctor_appointments';
$username = 'root';
$password = '';


    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Execute the count query
    $stmt = $pdo->query("SELECT COUNT(*) FROM doctors");
    $tableCount = $stmt->fetchColumn();
	
	$stmt1 = $pdo->query("SELECT COUNT(*) FROM patients");
    $tableCount1 = $stmt1->fetchColumn();
	
	$stmt2 = $pdo->query("SELECT COUNT(*) FROM appointments");
    $tableCount2 = $stmt2->fetchColumn();
?>


        <br> <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic"><h3>Total Doctors</h3></div>
              <a href="doctors.php"><center>
              <div class="number"><br>	  
			  <?php
				   
				         $conn=mysqli_connect("localhost","root","","doctor_appointments");
						 
						 $q="SELECT * FROM `doctors` order by id";
						 $query=mysqli_query($conn,$q);
						 $row=mysqli_num_rows($query);
						 echo $row; 
				   ?>
				 </div>  </center></a>  
              <!--<div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
               
                <span class="text">For Diffrent Teams</span>
              </div> -->
            </div> 
  
</div>


          <div class="box">
            <div class="right-side">
              <div class="box-topic"><h3>Total Patients</h3></div>
             <a href="patients.php"><center>
              <div class="number"><br>
			      <?php
				   
				         $conn=mysqli_connect("localhost","root","","doctor_appointments");
						 
						 $q="SELECT * FROM `patients`order by id";
						 $query=mysqli_query($conn,$q);
						 $row=mysqli_num_rows($query);
						 echo $row; 
				   ?>
			  </div></center></a>
            
            </div>

          </div>


          <div class="box">
            <div class="right-side">
              <div class="box-topic"><h3>Total Appointments</h3></div>
             <a href="view_appointment.php"><center>
              <div class="number"><br>
			      <?php
				   
				         $conn=mysqli_connect("localhost","root","","doctor_appointments");
						 
						 $q="SELECT * FROM `appointments` order by id";
						 $query=mysqli_query($conn,$q);
						
						 $row=mysqli_num_rows($query);
						 echo $row; 
				   ?>
			  </div></center></a>
              <!--<div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
                <span class="text"> Till Yesterday</span>
              </div> -->
            </div>
        
          </div>
		  
     

 