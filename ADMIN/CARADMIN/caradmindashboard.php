<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .dashboard-heading {
            background: linear-gradient(to bottom, #3498db, #2980b9);
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
            font-size: 36px;
            text-transform: uppercase;
        }


        hr {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ddd;
        }

        #dashboard {
            display: flex;
            height: 600px;
            margin: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #sidebar {
            width: 30%;
            background: linear-gradient(to bottom, #3498db, #2980b9);
            color: #fff;
            padding: 30px;
            box-sizing: border-box;
        }


        #content {
            width: 70%;
            padding: 20px;
            box-sizing: border-box;
        }

        ul li {
            margin-bottom: 15px;
            font-size: 16px;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #ecf0f1;
        }

        iframe {
            width: 100%;
            height: 540px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media only screen and (max-width: 768px) {
            #dashboard {
                flex-direction: column;
            }

            #sidebar,
            #content {
                width: 100%;
            }
        }

        h2 {
            background: linear-gradient(to bottom, #3498db, #2980b9);
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #content {
            width: 70%;
            padding: 20px;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Additional styling for LI tag */
li {
    padding: 12px;
    border-radius: 5px;
    margin-bottom: 12px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    list-style-type: none;
    position: relative;
    transition: background-color 0.3s ease, color 0.3s ease;
    background-color: #e67e22; /* Change this to the desired background color */
    color: #fff;
    text-align: center;
}

/* Logo in place of the dot */
li::before {
    content: url('your-logo.png'); /* Replace 'your-logo.png' with the path to your logo image */
    display: inline-block;
    margin-right: 12px;
}

/* Hover effect */
li:hover {
    background-color: #d35400; /* Change this to the desired hover background color */
    color: #fff;
    cursor: pointer;
}

/* Box shadow on hover */
li:hover::before {
    box-shadow: 0 0 10px rgba(52, 152, 219, 0.8);
}

/* Special styling for certain items */
.custom-li-1 {
    background-color: #27ae60;
}

.custom-li-2 {
    background-color: #3498db;
}

.custom-li-3 {
    background-color: #e74c3c;
}

/* Badge styling */
.badge {
    background-color: #34495e;
    color: #fff;
    padding: 4px 8px;
    font-size: 12px;
    border-radius: 3px;
    margin-left: 8px;
}
    </style>
</head>

<body>

    <h1>
        <div class="dashboard-heading">Admin Dashboard</div>
    </h1>
    <hr>

    <div id="dashboard">
        <div id="sidebar">
            <h2>CARS</h2>
            <ul>
                <li class="custom-li custom-li-1"><a href="carform.php" target="cont">ADD</a></li>
                <li class="custom-li custom-li-3"><a href="caradminshow.php" target="cont">LIST</a></li>
            </ul>
        </div>

        <div id="content">
            <iframe name="cont"></iframe>
        </div>
    </div>

</body>

</html>