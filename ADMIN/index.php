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
            height: 582px;
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

        .dropdown {
            position: relative;
            display: inline;
        }

        .dropdown-content {
            display: none;
            position: flex;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }



        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
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
            background-color: #e67e22;
            /* Change this to the desired background color */
            color: #fff;
            text-align: center;
        }

        /* Logo in place of the dot */
        li::before {
            content: url('your-logo.png');
            /* Replace 'your-logo.png' with the path to your logo image */
            display: inline-block;
            margin-right: 12px;
        }

        /* Hover effect */
        li:hover {
            background-color: #d35400;
            /* Change this to the desired hover background color */
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

        .dropdown-content a:hover {
            background-color: #eee;
            /* Lighter background color on hover */
            color: #333;
            /* Change text color on hover */
        }

        li a {
            color: #333;
            /* Default text color for links */
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
            <div class="dropdown" onclick="toggleDropdown('carsDropdown')">
                <a class="custom-li custom-li-1">
                    <h2>CARS</h2>
                </a>
                <div class="dropdown-content" id="carsDropdown">
                    <a href="caradmin\carform.php" target="cont">ADD</a>
                    <a href="caradmin\caradminshow.php" target="cont">LIST</a>
                </div>
            </div>
            <div class="dropdown" onclick="toggleDropdown('hotelsDropdown')">
                <a class="custom-li custom-li-1">
                    <h2>HOTELS</h2>
                </a>
                <div class="dropdown-content" id="hotelsDropdown">
                    <a href="hoteladmin\hotelinstform.php" target="cont">ADD</a>
                    <a href="hoteladmin\hoteladminshow.php" target="cont">LIST</a>
                </div>
            </div>
            <div class="dropdown" onclick="toggleDropdown('destinationsDropdown')">
                <a class="custom-li custom-li-1">
                    <h2>DESTINATIONS</h2>
                </a>
                <div class="dropdown-content" id="destinationsDropdown">
                    <a href="DESTINATION\Centralindia\cadminshow.php" target="cont">Central India Packages</a>
                    <a href="DESTINATION\Eastindia\eadminshow.php" target="cont">East India Packages</a>
                    <a href="DESTINATION\Northindia\nadminshow.php" target="cont">North India Packages</a>
                    <a href="DESTINATION\Southindia\sadminshow.php" target="cont">South India Packages</a>
                    <a href="DESTINATION\Westindia\wadminshow.php" target="cont">West India Packages</a>
                    <a href="DESTINATION\Special\spadminshow.php" target="cont">Special Packages</a>
                </div>
            </div>
        </div>

        <div id="content">
            <iframe name="cont"></iframe>
        </div>
    </div>

    <script>
        var lastOpenedDropdown = null;

        function toggleDropdown(dropdownId) {
            var dropdownContent = document.getElementById(dropdownId);

            // Close the last opened dropdown, if any
            if (lastOpenedDropdown && lastOpenedDropdown !== dropdownContent) {
                lastOpenedDropdown.style.display = 'none';
            }

            // If the selected dropdown is not the last opened one, display it
            if (lastOpenedDropdown !== dropdownContent) {
                dropdownContent.style.display = 'block';

                // Display the clicked dropdown
                dropdownContent.style.display = 'block';

                // Apply alternating colors to links
                var links = dropdownContent.querySelectorAll('a');
                var color1 = '#66cc99'; // Light green color
                var color2 = '#ff9999'; // Light red color

                for (var i = 0; i < links.length; i++) {
                    links[i].style.backgroundColor = (i % 2 === 0) ? color1 : color2;
                }
            }

            // Update the last opened dropdown
            lastOpenedDropdown = dropdownContent;
        }
    </script>
</body>

</html>