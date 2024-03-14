<?php
include("connection.php");
$hname=$_POST["hname"];
$himage=$_POST["himage"];
$hprice=$_POST["hprice"];
$hdest=$_POST["hdest"];
$hlocat=$_POST["hlocat"];
$haddress=$_POST["haddress"];
$hphone=$_POST["hphone"];
$hemail=$_POST["hemail"];
$havail=$_POST["havail"];
$sql="insert into hotels(hotel_name,hotel_image,hotel_price,hotel_destination,hotel_location,hotel_address,hotel_phone,hotel_email,hotel_availability) values(
'$hname','$himage','$hprice','$hdest','$hlocat','$haddress','$hphone','$hemail',$havail)";
mysqli_query($con,$sql);
?>