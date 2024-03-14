<!DOCTYPE html>
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
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            width: 90%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form name="carform" method="post" action="caradmincrud.php?mych=1" enctype="multipart/form-data">
        <center>
            <h2>Adding New Car</h2>
        </center>
        <label for="name">Car Name:</label>
        <input type="text" id="name" name="cname" required><br>
        <label for="image">Car Image:</label>
        <input type="file" id="image" name="cimage" required><br>
        <label for="price">Car Price:</label>
        <input type="text" id="price" name="cprice" required><br>
        <label for="saets">Number of Car Seats:</label>
        <input type="text" id="seats" name="car_seats" required><br>
        <label for="ftype">Fuel Type:</label>
        <input type="text" id="ftype" name="fuel_type" required><br>
        <label for="avail">Car Availability:</label>
        <input type="radio" id="avail" value="1" name="cavail" required>Yes
        <input type="radio" id="avail" value="0" name="cavail" required>No<br>
        <input type="submit" value="Submit" name="save">
    </form>
</body>

</html>