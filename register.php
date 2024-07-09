

<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "doctor_appointments";

 // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . $conn->connect_error);
    }

    //  insert new user into database
    $sql = "INSERT INTO register (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if (mysqli_query($conn, $sql))
		{
        echo "<script type='text/javascript'>alert('Register Successfull')</script>";
		echo "<script type='text/javascript'>window.location.href = 'dlogin.html';</script>";
    } 
	else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
}
?>
