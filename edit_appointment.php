<?php
$conn = mysqli_connect("localhost", "root", "", "doctor_appointments");
error_reporting(0);

$id = $_GET['id'];

if (!$id) {
    die("ID not provided");
}

$q = "SELECT * FROM appointments WHERE id='$id'";
$res = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($res);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $a = $_POST['pname'];
    $b = $_POST['dname'];
    $c = $_POST['date'];
    $d = $_POST['time'];
    $e = $_POST['status'];
    

    $update_query = "UPDATE `appointments` SET `patient_name`='$a',`doctor_name`='$b',`date`='$c',`time`='$d',`status`='$e' WHERE id='$id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "<script>
            alert('Appointment updated successfully');
            window.location.href='view_appointment.php';
        </script>";
    } else {
        echo "<script>
            alert('Failed to update : " . mysqli_error($conn) . "');
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
            <input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="4000000" />
            <div class="form-row">
                <div class="col-12 my-2 errors">
                    <!-- submit form error -->
                </div>
                <div class="col-12 my-3">
                    <label>Patient:<span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="pname" id="pname" class="form-control" required>
							<option value="saurabh" <?php echo ($row['patient_name'] == 'saurabh') ? 'selected' : ''; ?>>saurabh</option>
                            <option value="Smita" <?php echo ($row['patient_name'] == 'Smita') ? 'selected' : ''; ?>>Smita</option>
                            
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
                            <option value="Gayatri G" <?php echo ($row['doctor_name'] == 'Gayatri G') ? 'selected' : ''; ?>>Gayatri G</option>
                            <option value="Gauri" <?php echo ($row['doctor_name'] == 'Gauri') ? 'selected' : ''; ?>>Gauri</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-6 mb-2">
                    <label>Appointment Date <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo $row['date']; ?>"required>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <label>Appointment Slots <span class="text-danger">*</span></label>
                    <div class="input-group mb-3">
                        <select name="time" id="time" class="form-control" required>
                            <option value="09:00 AM" <?php echo ($row['time'] == '09:00 AM') ? 'selected' : ''; ?>>09:00 AM</option>
                            <option value="09:30 AM" <?php echo ($row['time'] == '09:30 AM') ? 'selected' : ''; ?>>09:30 AM</option>
                            <option value="10:00 AM" <?php echo ($row['time'] == '10:00 AM') ? 'selected' : ''; ?>>10:00 AM</option>
                            <option value="10:30 AM" <?php echo ($row['time'] == '10:30 AM') ? 'selected' : ''; ?>>10:30 AM</option>
                            <option value="11:00 AM" <?php echo ($row['time'] == '11:00 AM') ? 'selected' : ''; ?>>11:00 AM</option>
                            <option value="11:30 AM" <?php echo ($row['time'] == '11:30 AM') ? 'selected' : ''; ?>>11:30 AM</option>
                            <option value="12:00 PM" <?php echo ($row['time'] == '12:00 PM') ? 'selected' : ''; ?>>12:00 PM</option>
                            <option value="12:30 PM" <?php echo ($row['time'] == '12:30 PM') ? 'selected' : ''; ?>>12:30 PM</option>
                            <option value="01:00 PM" <?php echo ($row['time'] == '01:00 PM') ? 'selected' : ''; ?>>01:00 PM</option>
                            <option value="01:30 PM" <?php echo ($row['time'] == '01:30 PM') ? 'selected' : ''; ?>>01:30 PM</option>
                            <option value="02:00 PM" <?php echo ($row['time'] == '02:00 PM') ? 'selected' : ''; ?>>02:00 PM</option>
                            <option value="02:30 PM" <?php echo ($row['time'] == '02:30 PM') ? 'selected' : ''; ?>>02:30 PM</option>
                            <option value="03:00 PM" <?php echo ($row['time'] == '03:00 PM') ? 'selected' : ''; ?>>03:00 PM</option>
                            <option value="03:30 PM" <?php echo ($row['time'] == '03:30 PM') ? 'selected' : ''; ?>>03:30 PM</option>
                            <option value="04:00 PM" <?php echo ($row['time'] == '04:00 PM') ? 'selected' : ''; ?>>04:00 PM</option>
                            <option value="04:30 PM" <?php echo ($row['time'] == '04:30 PM') ? 'selected' : ''; ?>>04:30 PM</option>
                            <option value="05:00 PM" <?php echo ($row['time'] == '05:00 PM') ? 'selected' : ''; ?>>05:00 PM</option>
                            <option value="05:30 PM" <?php echo ($row['time'] == '05:30 PM') ? 'selected' : ''; ?>>05:30 PM</option>
                            <option value="06:00 PM" <?php echo ($row['time'] == '06:00 PM') ? 'selected' : ''; ?>>06:00 PM</option>
                            <option value="06:30 PM" <?php echo ($row['time'] == '06:30 PM') ? 'selected' : ''; ?>>06:30 PM</option>
                            <option value="07:00 PM" <?php echo ($row['time'] == '07:00 PM') ? 'selected' : ''; ?>>07:00 PM</option>
                            <option value="07:30 PM" <?php echo ($row['time'] == '07:30 PM') ? 'selected' : ''; ?>>07:30 PM</option>
                            <option value="08:00 PM" <?php echo ($row['time'] == '08:00 PM') ? 'selected' : ''; ?>>08:00 PM</option>
                            <option value="08:30 PM" <?php echo ($row['time'] == '08:30 PM') ? 'selected' : ''; ?>>08:30 PM</option>
                            <option value="09:00 PM" <?php echo ($row['time'] == '09:00 PM') ? 'selected' : ''; ?>>09:00 PM</option>
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
                            <option value="Active" <?php echo ($row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                            <option value="Attended" <?php echo ($row['status'] == 'Attended') ? 'selected' : ''; ?>>Attended</option>
                            <option value="Cancelled" <?php echo ($row['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                </div>
            </div>
        
			 <div class="form-row">
                <div class="col-12 my-3 text-center">
                    <input type="submit" class="btn btn-success" value="Update"> 
                    <a href="view_appointment.php" class="btn btn-primary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
