<?php
$conn = mysqli_connect("localhost", "root", "", "doctor_appointments");
error_reporting(0);

$id = $_GET['id'];

if (!$id) {
    die("ID not provided");
}

$q = "SELECT * FROM doctors WHERE id='$id'";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $time = $_POST['time'];

    $update_query = "UPDATE doctors SET name='$name', specialization='$specialization', time='$time' WHERE id='$id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>
            alert('Doctor details updated successfully');
            window.location.href='doctors.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to update doctor details: " . mysqli_error($conn) . "');
        </script>";
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
        #jyBank {
            padding-bottom: 25px;
        }
    </style>
</head>
<body>
    <div class="container my-md-4 my-0">
        <form method="POST" class="needs-validation" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="4000000" />

            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Doctor Name:<span class="text-danger">*</span></label>
                    <input type="text" placeholder="Enter Doctor Name" class="form-control" id="name" name="name" pattern="[a-zA-Z][a-zA-Z0-9\s]*" value="<?php echo $row['name']; ?>" required>
                    <div class="invalid-feedback">Please Enter Doctor Name</div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Select Specialization:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="specialization" id="specialization" style="width:100%; height:35px;border-radius:4px;border: 1px grey;">
                            <option value="" disabled selected>Specialization</option>
                            <option value="Cardiology" <?php echo ($row['specialization'] == 'Cardiology') ? 'selected' : ''; ?>>Cardiology</option>
                            <option value="Neurology" <?php echo ($row['specialization'] == 'Neurology') ? 'selected' : ''; ?>>Neurology</option>
                            <option value="Orthopedics" <?php echo ($row['specialization'] == 'Orthopedics') ? 'selected' : ''; ?>>Orthopedics</option>
                            <option value="Pediatrics" <?php echo ($row['specialization'] == 'Pediatrics') ? 'selected' : ''; ?>>Pediatrics</option>
                            <option value="General" <?php echo ($row['specialization'] == 'General') ? 'selected' : ''; ?>>General</option>
                            <!-- Add other specializations as needed -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-12 my-3">
                    <label>Available Time:<span class="text-danger">*</span></label>
                    <input type="time" placeholder="Enter Available Time" class="form-control" id="time" name="time" value="<?php echo $row['time']; ?>" required>
                    <div class="invalid-feedback">Please Enter Available Time</div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-12 my-3 text-center">
                    <input type="submit" class="btn btn-success" value="Update">
                    <a href="doctors.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>