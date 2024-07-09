<?php
$username = "root";
$password = "";
$servername = "localhost";
$db = "doctor_appointments";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM specialization WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No record found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $sname = $_POST['sname'];

    $query = "UPDATE specialization SET sname='$sname' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: specialization.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
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
        body {
            background-color: #f5f5f5;
        }

        .container {
            background: rgba(14, 71, 161, 0.0500);
            border: 4px solid skyblue;
            border-radius: 6px;
            box-shadow: 0px 0px 4px var(--primary-color),
                0px 0px 8px var(--primary-color),
                0px 0px 16px var(--primary-color);
            padding: 32px;
            margin-top: 50px;
        }

        @media only screen and (max-width: 767px) {
            .container {
                border-radius: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="sname">Specialization Name:</label>
                <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $row['sname']; ?>" required>
            </div>
            <div class="form-row">
                <div class="col-12 my-3 text-center">
                    <input type="submit" class="btn btn-success" name="update" value="Update">
                    <a href="specialization.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
