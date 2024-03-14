<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            width: 90%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

<body>
    <form name="hotelform" method="post" action="hoteladmincrud.php?mych=1" enctype="multipart/form-data">
        <center>
            <h2>Adding New Hotel</h2>
        </center>
        <label for="name">Hotel Name:</label>
        <input type="text" id="name" name="hname" required><br>
        <label for="image">Hotel Image:</label>
        <input type="file" id="image" name="himage" required><br>
        <label for="price">Hotel Price:</label>
        <input type="text" id="price" name="hprice" required><br>
        <label>Hotel Destination:</label>
        <select id="destination" name="hdest" onchange="populatePlaces();" required>
            <option value="">Select your destination</option>
            <option value="East">East</option>
            <option value="West">West</option>
            <option value="North">North</option>
            <option value="South">South</option>
            <option value="Central">Central</option>
        </select><br>
        <label>Hotel Location:</label>
        <select id="places" name="hlocat" required></select><br>
        <label for="address">Hotel Address:</label>
        <input type="text" id="address" name="haddress" required><br>
        <label for="phone">Hotel Phone:</label>
        <input type="number" id="phone" name="hphone" required><br>
        <label for="email">Hotel Email:</label>
        <input type="email" id="email" name="hemail" required><br>
        <label for="avail">Hotel Availability:</label>
        <input type="radio" id="avail" value="1" name="havail" required>Yes
        <input type="radio" id="avail" value="0" name="havail" required>No<br>
        <input type="submit" value="Submit" name="save">
    </form>
</body>

</html>