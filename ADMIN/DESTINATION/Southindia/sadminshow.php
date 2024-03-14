<?php
include("connection.php");
$sql = "select * from south_india";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #3498db;
            width: 90%;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 95%;
            margin-top: 20px;
            background-color: #ecf0f1;
            border-radius: 20px;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #bdc3c7;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        img {
            display: block;
            margin: auto;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 200px;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        tr:nth-child(even) {
            background-color: #d5dbdb;
        }

        a {
            text-decoration: none;
            color: #27ae60;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #2ecc71;
        }

        .status-indicator {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .active {
            background-color: #27ae60;
            color: #ffffff;
        }

        .inactive {
            background-color: #e74c3c;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <center>
        <h2>South India Trips Information</h2>
    </center>
    <table border="1" align="center">
        <tr>
            <th>SL NO</th>
            <th>Trip ID</th>
            <th>Trip NAME</th>
            <th>Trip IMAGE</th>
            <th>Trip PRICE</th>
            <th>Trip Duration</th>
            <th>Accommodation</th>
            <th>Food Facilities</th>
            <th>Status</th>
        </tr>
        <?php
        $ctr = 1;
        $sql2 = "SELECT * FROM south_india ORDER BY id";
        $query = mysqli_query($con, $sql2);
        if ($query->num_rows > 0)
            while ($rec = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                $row = $query->fetch_assoc();
                $imageURL = 'http://localhost/tt/assets/images/packages/' . $rec["image"]; ?>
            <tr>
                <td><?php echo $ctr; ?></td>
                <td><?php echo $rec["id"]; ?></td>
                <td><?php echo $rec["name"]; ?></td>
                <td>
                    <img src="<?php echo $imageURL; ?>" alt="" width="50" height="50">
                </td>
                <td><?php echo $rec["price"]; ?></td>
                <td><?php echo $rec["duration"]; ?></td>
                <td><?php echo $rec["accommodation"]; ?></td>
                <td><?php echo $rec["food_facilities"]; ?></td>
                <td>
                    <span class="status-indicator <?php echo ($rec['availability'] == 1) ? 'active' : 'inactive'; ?>" data-tripid="<?php echo $rec['id']; ?>" data-status="<?php echo $rec['availability']; ?>">
                        <?php echo ($rec['availability'] == 1) ? 'Active' : 'Inactive'; ?>
                    </span>
                </td>
            </tr>
        <?php
                $ctr++;
            }
        ?>
    </table>
    <!-- Include jQuery library -->
    <script src="http://localhost/tt/assets/js/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".status-indicator").on("click", function() {
                var tripId = $(this).data("tripid");
                var currentStatus = $(this).data("status");

                // Toggle the status (1 to 0, and vice versa)
                var newStatus = (currentStatus == 1) ? 0 : 1;

                // Create a form dynamically
                var form = $('<form action="http://localhost/tt/ADMIN/DESTINATION/Southindia/update_status.php" method="post"></form>');
                form.append('<input type="hidden" name="tripId" value="' + tripId + '" />');
                form.append('<input type="hidden" name="newStatus" value="' + newStatus + '" />');

                // Append the form to the body and submit it
                $('body').append(form);
                form.submit();
            });
        });
    </script>
</body>

</html>