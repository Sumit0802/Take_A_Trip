<?php
include("connection.php");
$carid = $_REQUEST["carid"];
$selQ = "SELECT * FROM cars WHERE car_id=$carid";
$result = mysqli_query($con, $selQ);
if ($rec = mysqli_fetch_array($result, MYSQLI_BOTH)) {
    $carid = $rec["car_id"];
    $cname = $rec["car_name"];
    $cimage = $rec["car_image"];
    $cprice = $rec["car_price"];
    $cseats = $rec["car_seats"];
    $ftype = $rec["fuel_type"];
    $cavail = $rec["car_availability"];
}
?>
<HTML>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 10px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            color: #333;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        label.image-label {
            display: block;
            text-align: left;
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        label.image-label small {
            color: #777;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<BODY>
    <FORM NAME="careditform" METHOD="POST" ACTION="caradmincrud.php?mych=3" enctype="multipart/form-data">
        <input type="HIDDEN" name="carid" value="<?php echo $carid; ?>" readonly>
        <label for="name">Car Name:</label>
        <input type="text" id="name" name="cname" value="<?php echo $cname; ?>" required><br>
        <label for="image">New Car Image:</label>
        <input type="file" id="image" name="cimage" required><br>
        <label for="price">Car Price:</label>
        <input type="text" id="price" name="cprice" value="<?php echo $cprice; ?>" required><br>
        <label for="seats">Number of Car Seats:</label>
        <input type="text" id="seats" name="car_seats" value="<?php echo $cseats; ?>" required><br>
        <label for="ftype">Fuel Type:</label>
        <input type="text" id="ftype" name="fuel_type" value="<?php echo $ftype; ?>" required><br>
        <label for="avail">Car Availability:</label>
        <input type="radio" id="avail" name="cavail" value="1" <?php if ($cavail == 1) echo 'checked'; ?> required>Yes
        <input type="radio" id="avail" name="cavail" value="0" <?php if ($cavail == 0) echo 'checked'; ?> required>No<br>
        <input type="submit" name="edit_data" value="Edit data">
    </FORM>
    <a href="javascript:history.go(-1)">Go Back</a>
</BODY>
</HTML>