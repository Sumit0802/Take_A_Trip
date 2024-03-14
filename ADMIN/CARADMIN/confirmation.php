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
    <?php $carid = $_REQUEST["carid"]; ?>
        <h2>Are you sure you want to delete this car data?</h2>
        <a href='caradmincrud.php?mych=4&carid=<?php echo $carid; ?>'>Yes, delete</a>
        <a href='caradminshow.php'>No, cancel</a>
    </div>
</body>

</html>