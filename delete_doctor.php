

<?php
$conn = mysqli_connect("localhost", "root", "", "doctor_appointments");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];

if (!$id) {
    die("ID not provided");
}

$q = "DELETE FROM `doctors` WHERE id = '$id'";
$result = mysqli_query($conn, $q);

if ($result) {
    echo "<script>
        alert('Record deleted successfully...');
        window.location.href='doctors.php';
    </script>";
} else {
    echo "<script>
        alert('Failed to delete record: " . mysqli_error($conn) . "');
        window.location.href='doctors.php';
    </script>";
}

// Close the database connection
mysqli_close($conn);
?>