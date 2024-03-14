<?php
include("connection.php");
$statusMsg = '';
// File upload directory 
$targetDir = "uploads/";
$mych = $_REQUEST["mych"];
switch ($mych) {

	case 1: //to insert data in hotel table
		if (isset($_POST["save"])) {
			$hname = $_POST["hname"];
			//$himage=$_POST["himage"];
			$hprice = $_POST["hprice"];
			$hdest = $_POST["hdest"];
			$hlocat = $_POST["hlocat"];
			$haddress = $_POST["haddress"];
			$hphone = $_POST["hphone"];
			$hemail = $_POST["hemail"];
			$havail = $_POST["havail"];
			if (!empty($_FILES["himage"]["name"])) {
				$fileName = basename($_FILES["himage"]["name"]);
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
				// Allow certain file formats 
				$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
				if (in_array($fileType, $allowTypes)) {
					// Upload file to server 
					if (move_uploaded_file($_FILES["himage"]["tmp_name"], $targetFilePath)) {
						// Insert image file name into database 
						$sql = "insert into hotels(hotel_name,hotel_image,hotel_price,hotel_destination,hotel_location,hotel_address,hotel_phone,hotel_email,hotel_availability) values(
                            '$hname','$fileName','$hprice','$hdest','$hlocat','$haddress','$hphone','$hemail',$havail)";
						$result = mysqli_query($con, $sql);
					}
				}
			}
		}
		header("Location:hoteladminshow.php");
		break;

	case 2: //get confirmation to delete data in hotels table
		$hotel_id = $_REQUEST["hotel_id"];
		header("Location: confirmation.php?hotel_id=$hotel_id");
		break;

	case 4: //to delete data in hotels table
		$hotel_id = $_REQUEST["hotel_id"];
		$selQ = "delete from hotels where hotel_id=$hotel_id ";
		mysqli_query($con, $selQ);
		header("Location:hoteladminshow.php");
		break;

	case 3: //to update data in hotels table
		if (isset($_POST["edit_data"])) {
			$hotel_id = $_POST["hotel_id"];
			$hname = $_POST["hname"];
			//$himage=$_POST["himage"];
			$hprice = $_POST["hprice"];
			$hdest = $_POST["hdest"];
			$hlocat = $_POST["hlocat"];
			$haddress = $_POST["haddress"];
			$hphone = $_POST["hphone"];
			$hemail = $_POST["hemail"];
			$havail = $_POST["havail"];
			if (!empty($_FILES["himage"]["name"])) {
				$fileName = basename($_FILES["himage"]["name"]);
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
				// Allow certain file formats 
				$allowTypes = array('jpg', 'png', 'jpeg', 'gif');
				if (in_array($fileType, $allowTypes)) {
					// Upload file to server 
					if (move_uploaded_file($_FILES["himage"]["tmp_name"], $targetFilePath)) {
						// Insert image file name into database 
						$selQ = "update hotels set hotel_name='$hname',hotel_image='$fileName',hotel_price='$hprice',hotel_destination='$hdest',hotel_location
						='$hlocat',hotel_address='$haddress',hotel_phone='$hphone',hotel_email='$hemail',hotel_availability=$havail where hotel_id=$hotel_id";
						$result = mysqli_query($con, $selQ);
					}
				}
			}
		}
		header("Location:hoteladminshow.php");
		break;
}
