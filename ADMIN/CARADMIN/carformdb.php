<?php
include("connection.php");

$cname = $_POST["cname"];
$cimage = $_POST["cimage"];
$cprice = $_POST["cprice"];
$car_seats = $_POST["car_seats"];
$fuel_type = $_POST["fuel_type"];
$cavail = $_POST["cavail"];

$sql = "INSERT INTO cars (car_name, car_image, car_price, car_seats, fuel_type, car_availability) VALUES ('$cname', '$cimage', '$cprice', '$car_seats', '$fuel_type', $cavail)";
mysqli_query($con, $sql);
?>
