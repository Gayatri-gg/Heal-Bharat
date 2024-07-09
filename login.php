
<?php


// Check if form is submitted 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];


    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "doctor_appointments";

    // Create connection
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //  check login credentials
    $sql = "SELECT * FROM register WHERE fullname='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check number of rows in result set
        if (mysqli_num_rows($result) > 0) {
            
            echo "<script type='text/javascript'>alert('Login Successful');</script>";
            echo "<script type='text/javascript'>window.location.href = 'dashboard.php';</script>";
        } else {
            
            echo "<script type='text/javascript'>alert('Invalid username or password!');</script>";
        }
    } else {
        
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
