<?php
include("connection.php");
$hotel_id = $_REQUEST["hotel_id"];
$selQ = "select * from hotels where hotel_id=$hotel_id";
$result = mysqli_query($con, $selQ);
if ($rec = mysqli_fetch_array($result, MYSQLI_BOTH)) {
  $hname = $rec["hotel_name"];
  $himage = $rec["hotel_image"];
  $hprice = $rec["hotel_price"];
  $hdest = $rec["hotel_destination"];
  $hlocat = $rec["hotel_location"];
  $haddress = $rec["hotel_address"];
  $hphone = $rec["hotel_phone"];
  $hemail = $rec["hotel_email"];
  $havail = $rec["hotel_availability"];
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
        input[type="submit"],
        input[type="number"],
        input[type="email"],
        select {
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

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
    <script>
        function populatePlaces() {
            var destination = document.getElementById("destination").value;
            var placeDropdown = document.getElementById("places");

            // Clear the existing options
            placeDropdown.innerHTML = "";

            // Populate the places based on the selected destination
            if (destination === "East") {
                var places = ["", "Arunachal Pradesh", "Sikkim", "Assam", "Nagaland", "Meghalaya", "West Bengal"];
            } else if (destination === "West") {
                var places = ["", "Mumbai", "Goa", "Gujarat", "Daman And Diu", "Dadra And Nagar Haveli", "Rajasthan"];
            } else if (destination === "North") {
                var places = ["", "Jammu And Kashmir", "Uttar Pradesh", "Uttrakhand", "Himachal Pradesh", "Punjab", "Delhi"];
            } else if (destination === "South") {
                var places = ["", "Telangana", "Andhra Pradesh", "Kerala", "Karnataka", "Tamil Nadu", "Andaman And Nicobar Islands"];
            } else if (destination === "Central") {
                var places = ["", "Madhya Pradesh", "Chattisgarh"];
            }

            // Add the places as options to the second dropdown
            for (var i = 0; i < places.length; i++) {
                var option = document.createElement("option");
                option.text = places[i];
                placeDropdown.add(option);
            }
        }
    </script>
</head>

<BODY>
  <FORM NAME="hoteleditform" METHOD="POST" ACTION="hoteladmincrud.php?mych=3" enctype="multipart/form-data">
    <input type="HIDDEN" name="hotel_id" value="<?php echo $hotel_id; ?>" readonly>
    <label for="name">Hotel Name:</label>
    <input type="text" id="name" name="hname" value="<?php echo $hname; ?>" required><br>
    <label for="image">Hotel Image:</label>
    <input type="file" id="image" name="himage" value="<?php echo $himage; ?>" required><br>
    <label for="price">Hotel Price:</label>
    <input type="text" id="price" name="hprice" value="<?php echo $hprice; ?>" required><br>
    <label>Hotel Destination:</label>
    <select id="destination" name="hdest" onchange="populatePlaces()" required>
      <option value="">Select your destination</option>
      <option value="East">East</option>
      <option value="West">West</option>
      <option value="North">North</option>
      <option value="South">South</option>
      <option value="Central">Central</option>
    </select><br>
    <label>Hotel Location:</label>
    <select id="places" name="hlocat" value="<?php echo $hlocat; ?>" required></select><br>
    <label for="address">Hotel Address:</label>
    <input type="text" id="address" name="haddress" value="<?php echo $haddress; ?>" required><br>
    <label for="phone">Hotel Phone:</label>
    <input type="number" id="phone" name="hphone" value="<?php echo $hphone; ?>" required><br>
    <label for="email">Hotel Email:</label>
    <input type="email" id="email" name="hemail" value="<?php echo $hemail; ?>" required><br>
    <label for="avail">Hotel Availability:</label>
    <input type="radio" id="avail" name="havail" value="1" <?php if ($havail == 1) echo 'checked'; ?> required>Yes
    <input type="radio" id="avail" name="havail" value="0" <?php if ($havail == 0) echo 'checked'; ?> required>No<br>
    <input type="submit" name="edit_data" value="Edit data">
  </FORM>
  <a href="javascript:history.go(-1)">Go Back</a>
</BODY>

</HTML>