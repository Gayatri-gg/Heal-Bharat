<?php
  include "connect.php";

 
  $sql1 = "INSERT INTO employee(id, first_name, last_name, department, salary) VALUES ('101','John ','Doe','HR','45000')";
  if (mysqli_query($conn, $sql1)) 
	    {
  			echo "1st record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
     }
  $sql2 = "INSERT INTO employee(id, first_name, last_name, department, salary) VALUES ('102','Jane ','Smith','IT','75000')";
	if (mysqli_query($conn, $sql2)) 
	    {
  			echo "<br>2nd record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
     } 
 
  $sql3 = "INSERT INTO employee(id, first_name, last_name, department, salary) VALUES ('103','Mike ','Johnson','Finance','85000')";
  if (mysqli_query($conn, $sql3)) 
	    {
  			echo "<br>3rd record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
     }
	 
  $sql4 = "INSERT INTO employee(id, first_name, last_name, department, salary) VALUES ('104','Emily ','Davis','IT','60000')";
 
	if (mysqli_query($conn, $sql4)) 
	    {
  			echo "<br>4th record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
     }
	 
	$sql5 = "INSERT INTO employee(id, first_name, last_name, department, salary) VALUES ('105','Sarah ','Wilson','Marketing','50000')";
	if (mysqli_query($conn, $sql5)) 
	    {
  			echo "<br>5th record inserted successfully";
	    }
    else 
      {
        echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);
     }

$q="SELECT first_name, last_name, department FROM `employee` WHERE salary>50000";
$res=mysqli_query($conn,$q);
if(mysqli_num_rows($res)>0)
{
	echo"<br><br>Salary Is greater than 50000 =><br>";
	while($row=mysqli_fetch_assoc($res))
	{
		
		echo "<br>".$row['first_name']." ".$row['last_name']."  ".$row['department'];
	
	}
}


mysqli_close($conn);

?>