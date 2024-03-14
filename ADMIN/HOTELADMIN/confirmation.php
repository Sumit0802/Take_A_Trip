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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .confirmation-container {
            text-align: center;
            background-color: #ecf0f1;
            border-radius: 10px;
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        a {
            text-decoration: none;
            color: #27ae60;
            font-weight: bold;
            margin: 0 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #ecf0f1;
            transition: background-color 0.3s ease-in-out;
        }

        a:hover {
            background-color: #2ecc71;
        }
    </style>
</head>

<body>
    <div class="confirmation-container">
    <?php $hotel_id = $_REQUEST["hotel_id"]; ?>
        <h2>Are you sure you want to delete this hotel data?</h2>
        <a href='hoteladmincrud.php?mych=4&hotel_id=<?php echo $hotel_id; ?>'>Yes, delete</a>
        <a href='hoteladminshow.php'>No, cancel</a>
    </div>
</body>

</html>