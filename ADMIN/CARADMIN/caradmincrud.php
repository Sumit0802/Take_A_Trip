<?php
include("connection.php");
$statusMsg = '';
// File upload directory 
$targetDir = "uploads/";
$mych = $_REQUEST["mych"];
switch ($mych) {
    case 1: // to insert data in car table
        if (isset($_POST["save"])) {
            $cname = $_POST["cname"];
            $cprice = $_POST["cprice"];
            $carSeats = $_POST["car_seats"];
            $fuelType = $_POST["fuel_type"];
            $cavail = $_POST["cavail"];
            if (!empty($_FILES["cimage"]["name"])) {
                $fileName = basename($_FILES["cimage"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into the database 
                        $sql = "INSERT INTO cars (car_name, car_image, car_price, car_seats, fuel_type, car_availability) VALUES ('$cname', '$fileName', '$cprice', '$carSeats', '$fuelType', $cavail)";
                        $result = mysqli_query($con, $sql);
                    }
                }
            }
        }
        header("Location:caradminshow.php");
        break;

    case 2: // get confirmation to delete data in cars table
        $carid = $_REQUEST["carid"];
        header("Location: confirmation.php?carid=$carid");
        break;

    case 3: //to update data in cars table
        $carid = $_POST["carid"];
        $cname = $_POST["cname"];
        $cimage = $_POST["cimage"];
        $cprice = $_POST["cprice"];
        $cseats = $_POST["car_seats"];
        $ftype = $_POST["fuel_type"];
        $cavail = $_POST["cavail"];
        if (isset($_POST["edit_data"])) {
            if (!empty($_FILES["cimage"]["name"])) {
                $fileName = basename($_FILES["cimage"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to server 
                    if (move_uploaded_file($_FILES["cimage"]["tmp_name"], $targetFilePath)) {
                        // Insert image file name into database 
                        $selQ = "update cars set car_name='$cname',car_image='$fileName',car_price='$cprice',car_seats='$cseats',fuel_type='$ftype',car_availability=$cavail where car_id=$carid";
                        $result = mysqli_query($con, $selQ);
                        if ($insert) {
                            $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                        }
                    }
                }
            }
        }
        header("Location:caradminshow.php");
        break;
        
    case 4: // to delete data in cars table
        $carid = $_REQUEST["carid"];
        $selQ = "delete from cars where car_id=$carid ";
        mysqli_query($con, $selQ);
        header("Location:caradminshow.php");
        break;
}
