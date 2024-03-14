<?php
include("assets/connection.php");
session_start();
function encryptId($id)
{
    $key = "your_secret_key";  // Replace with a strong secret key
    $cipher = "aes-256-cbc";   // AES encryption with a 256-bit key in CBC mode

    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher));
    $encryptedId = openssl_encrypt($id, $cipher, $key, 0, $iv);

    // Encode the encrypted data and IV for URL safety
    $encryptedId = base64_encode($iv . $encryptedId);

    return $encryptedId;
}
function decryptId($encryptedId)
{
    $key = "your_secret_key";  // Replace with the same secret key used for encryption
    $cipher = "aes-256-cbc";   // AES encryption with a 256-bit key in CBC mode

    // Decode the encrypted data and IV
    $data = base64_decode($encryptedId);
    $iv = substr($data, 0, openssl_cipher_iv_length($cipher));
    $encryptedId = substr($data, openssl_cipher_iv_length($cipher));

    // Decrypt the id
    $decryptedId = openssl_decrypt($encryptedId, $cipher, $key, 0, $iv);

    return $decryptedId;
}
$mych = $_REQUEST["mych"];
switch ($mych) {
    case 1:
        if (isset($_SESSION['user_id'])) {
            $_SESSION['prev_page'] = $_SERVER['HTTP_REFERER'];
            session_destroy();
        }
        $redirectURL = isset($_SESSION['prev_page']) ? $_SESSION['prev_page'] : 'http://localhost/tt';
        header("Location: $redirectURL");
        break;

    case 2:
        if (!isset($_SESSION['user_id'])) {
            header("Location: http://localhost/tt/");
            exit();
        }
        $userName = $_SESSION['user_name']; ?>
        <h1>Welcome, <?php echo $userName; ?>!</h1>
        <p><a href="trick.php?mych=1">Logout</a></p>
    <?php
        break;

    case 3:
        if (isset($_SESSION['user_id'])) {
            header("Location: http://localhost/tt");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username']; // Input validation
            $password = $_POST['password'];

            // Replace with your secure authentication logic, including password hashing
            
            $dummyUsername = 'useradmin';
            $dummyHashedPassword = password_hash('123456abcdef', PASSWORD_DEFAULT);

            if ($username == $dummyUsername && password_verify($password, $dummyHashedPassword)) {
                $_SESSION['user_id'] = 1; // Replace with the actual user ID from your database

                // Redirect back to the previous page or http://localhost/tt if not set
                $redirectURL = isset($_SESSION['prev_page']) ? $_SESSION['prev_page'] : 'http://localhost/tt';
                header("Location: $redirectURL");
                exit();
            } else {
                $userloginError = "Invalid username or password";
                // Log this failed userlogin attempt (without providing specific details to the user)
                error_log("Failed userlogin attempt for username: $username", 0);
            }
        }
        if ($_SERVER['HTTP_REFERER'] == null) {
            header("Location: http://localhost/tt");
            exit();
        }
        // Store the current page URL in the session
        $_SESSION['prev_page'] = $_SERVER['HTTP_REFERER']; ?>
        <title>userlogin</title>
        <div class="userlogin-container">
            <h2>User login</h2>
            <?php
            // Display a generic userlogin error message
            if (isset($userloginError)) {
                echo "<p class='error-message'>Invalid username or password</p>";
            }
            ?>
            <style>
                body {
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background: linear-gradient(to right, #ff4e50, #fc913a);
                    margin: 0;
                    padding: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                }

                h2 {
                    color: #333;
                }

                input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 15px;
                    display: inline-block;
                    border: 1px solid #ccc;
                    box-sizing: border-box;
                    border-radius: 4px;
                }

                button {
                    background-color: #4CAF50;
                    color: white;
                    padding: 12px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                button:hover {
                    background-color: #45a049;
                }

                .links {
                    margin-top: 20px;
                    display: flex;
                    justify-content: space-between;
                }

                .error-message {
                    color: red;
                    margin-bottom: 10px;
                }

                .success-message {
                    color: green;
                    margin-bottom: 10px;
                }

                .forgot-password {
                    margin-top: 0px;
                }

                .register-now {
                    margin-bottom: 20px;
                }

                a {
                    color: #0000ff;
                    text-decoration: none;
                    display: block;
                }

                a:hover {
                    text-decoration: underline;
                }

                .userlogin-container {
                    background: linear-gradient(to right, #3498db, #8e44ad);
                    /* Gradient background for the .userlogin-container */
                    position: relative;
                    width: 360px;
                    padding: 40px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    transition: background 0.5s ease;
                    /* Add smooth transition to background color */
                }
            </style>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">login</button>
            </form>
            <div class="links">
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="register-now">
                    <a href="trick.php?mych=4">Register Now</a>
                </div>
            <?php
            break;

        case 4: ?>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background: linear-gradient(to right, #ff4e50, #fc913a);
                        text-align: center;
                        margin: 0;
                        padding: 0;
                    }

                    .registration-form {
                        max-width: 400px;
                        margin: 20px auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }

                    input[type="text"],
                    input[type="email"],
                    input[type="tel"],
                    input[type="password"],
                    input[type="date"] {
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
                        width : 80%;
                        padding: 10px;
                        border: none;
                        border-radius: 4px;
                    }

                    input[type="submit"]:hover {
                        background-color: #45a049;
                    }

                    label {
                        text-align: left;
                        display: block;
                        margin-top: 10px;
                        font-weight: bold;
                        color: #333;
                    }

                    .registration-form {
                        background: linear-gradient(to right, #1abc9c, #3498db);
                        /* Gradient background for the .userregister-container */
                        position: relative;
                        width: 360px;
                        padding: 40px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        text-align: center;
                        transition: background 0.5s ease;
                        /* Add smooth transition to background color */
                    }
                </style>
                <div class="registration-form">
                    <h2>User Registration</h2>
                    <form name="registrationForm" action="assets/process_registration.php" method="POST" onsubmit="return validateForm()">
                        
                        <label for="name">Name:</label>
                        <input type="text" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" name="email" required>

                        <label for="phone">Phone Number:</label>
                        <input type="tel" name="phone" required>

                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" required>

                        <label for="address">Address:</label>
                        <input type="text" name="address" required>

                        <label for="password">Password:</label>
                        <input type="password" name="password" required>

                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" name="confirmPassword" required>

                        <div style="display: flex; align-items: center; ">
                            <input type="checkbox" name="terms" id="terms" required style="margin-right: 20px; margin-top: 3%;">
                            <label class="terms-label" for="terms" onclick="checkTerms()">I agree to the <a href="terms_and_conditions.html" target="_blank">Terms and Conditions</a></label>
                        </div><br>

                        <input type="submit" value="Register">

                    </form>

                    <script>
                        function checkTerms() {
                            var termsCheckbox = document.getElementById("terms");
                            termsCheckbox.checked = !termsCheckbox.checked; // Toggle the checkbox state
                        }

                        function validateForm() {
                            var username = document.forms["registrationForm"]["username"].value;
                            var name = document.forms["registrationForm"]["name"].value;
                            var email = document.forms["registrationForm"]["email"].value;
                            var phone = document.forms["registrationForm"]["phone"].value;
                            var dob = document.forms["registrationForm"]["dob"].value;
                            var password = document.forms["registrationForm"]["password"].value;
                            var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value;

                            // Check for empty fields
                            if (username == "" || name == "" || email == "" || phone == "" || dob == "" || password == "" || confirmPassword == "") {
                                alert("All fields must be filled out");
                                return false;
                            }

                            // Validate email format
                            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!email.match(emailRegex)) {
                                alert("Invalid email format");
                                return false;
                            }

                            // Validate phone number format
                            var phoneRegex = /^\d{10}$/;
                            if (!phone.match(phoneRegex)) {
                                alert("Invalid phone number format");
                                return false;
                            }

                            // Validate DOB
                            var currentDate = new Date();
                            var selectedDate = new Date(dob);
                            if (selectedDate >= currentDate) {
                                alert("Date of Birth must be in the past");
                                return false;
                            }

                            // Validate password strength
                            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
                            if (!password.match(passwordRegex)) {
                                alert("Password must include at least 8 characters, one uppercase letter, one lowercase letter, and one number.");
                                return false;
                            }

                            // Confirm password match
                            if (password !== confirmPassword) {
                                alert("Passwords do not match");
                                return false;
                            }

                            return true;
                        }
                    </script>

                </div>

            <?php
            break;
        case 5:
            $destination = $_POST["destination"];
            $check_in = $_POST["check_in"];
            $check_out = $_POST["check_out"];
            $duration = $_POST["duration"];
            $persons = $_POST["persons"]; ?>

                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }

                    .form-container {
                        max-width: 600px;
                        margin: 20px auto;
                        padding: 20px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }

                    .form-group {
                        margin-bottom: 15px;
                    }

                    label {
                        font-weight: bold;
                        display: block;
                        margin-bottom: 8px;
                    }

                    input[type="text"],
                    select {
                        width: 100%;
                        padding: 8px;
                        margin-top: 5px;
                        box-sizing: border-box;
                    }

                    button {
                        background-color: #4CAF50;
                        color: white;
                        padding: 10px 15px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                    }

                    button:hover {
                        background-color: #45a049;
                    }

                    .bg {
                        width: 100%;
                        height: 100vh;
                        position: fixed;
                        top: 0;
                        left: 0;
                        opacity: 0.7;
                        /* Adjust the opacity as needed */
                        z-index: -1;
                    }
                </style>
                <div class="form-container">
                    <img src="assets/images/booknow1.jpg" alt="booknow" class="bg">
                    <form id="tourForm" action="search_tours.php" method="post">
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" id="destination" name="destination" value="<?php echo $destination ?>" readonly>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="check_in">Check In:</label>
                            <input type="text" id="check_in" name="check_in" value="<?php echo $check_in ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="check_out">Check Out:</label>
                            <input type="text" id="check_out" name="check_out" value="<?php echo $check_out ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="text" id="duration" name="duration" value="<?php echo $duration ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="persons">Persons:</label>
                            <input type="text" id="persons" name="persons" value="<?php echo $persons ?>" readonly>
                        </div>

                        <input type="submit" value="Submit">
                    </form>
                </div>
            <?php
            break;
        case 6:
            ?>
                <!DOCTYPE html>
                <html lang="en">
                <?php
                include("assets/cssjs.php");
                ?>

                <head>
                    <!-- META DATA -->
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
                    <script>
                        function packages() {
                            window.location.href = "./index.php#pack";
                        }

                        function destination() {
                            window.location.href = "./index.php#gallery";
                        }

                        function soffers() {
                            window.location.href = "./index.php#spo";
                        }

                        function hotels() {
                            window.location.href = "./trick.php?mych=7";
                        }

                        function profile() {
                            window.location.href = "./trick.php?mych=2";
                        }

                        function logout() {
                            window.location.href = "./trick.php?mych=1";
                        }

                        function userlogin() {
                            window.location.href = "./trick.php?mych=3";
                        }
                    </script>
                </head>

                <body>
                    <section id="home">
                    </section>
                    <header class="top-area">
                        <div class="header-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="logo">
                                            <a href="http://localhost/tt">
                                                <span>Take A Trip</span>
                                            </a>
                                        </div>
                                        <!-- /.logo-->
                                    </div>
                                    <!-- /.col-->
                                    <div class="col-sm-10">
                                        <div class="main-menu">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                    <i class="fa fa-bars"></i></button><!-- / button-->
                                            </div>
                                            <!-- /.navbar-header-->
                                            <div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li class="smooth-menu"><a href="#home">home</a></li>
                                                    <li class="smooth-menu" onclick="destination();">
                                                        <a href="">Destination</a>
                                                    </li>
                                                    <li class="smooth-menu" onclick="packages();"><a href="">Packages </a></li>
                                                    <li class="smooth-menu" onclick="soffers();">
                                                        <a href="">Special Offer</a>
                                                    </li>
                                                    <li class="smooth-menu"><a href="#carspack">Cars</a></li>
                                                    <li class="smooth-menu" onclick="hotels();"><a href="">Hotels</a></li>
                                                    <li>
                                                        <!-- Changed by Anand -->
                                                        <form action="booknow.php" method="post">
                                                            <input type="submit" class="book-btn" action="booknow.php" value="book now " />
                                                        </form>
                                                        <!-- <button class="book-btn" action> book now  </button> -->
                                                    </li>
                                                    <!--/.project-btn-->
                                                    <?php
                                                    // Check if the user is logged in
                                                    if (isset($_SESSION['user_id'])) { ?>
                                                        <li class="smooth-menu" onclick="profile();"><a href="">Profile</a></li>
                                                        <li class="smooth-menu" onclick="logout();"><a href="">Logout</a></li>
                                                    <?php
                                                    } else { ?>
                                                        <li class="smooth-menu" onclick="userlogin();"><a href="">Login</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <!-- /.navbar-collapse -->
                                        </div>
                                        <!-- /.main-menu-->
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- /.row -->
                                <div class="home-border"></div>
                                <!-- /.home-border-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /.header-area -->
                    </header>
                    <section id="carspack" class="packages">
                        <div class="container">
                            <div class="gallary-header text-center">
                                <h2>Our Cars Section</h2>
                                <p>Introducing you to our Popular Cars.</p>
                            </div>
                            <div class="packages-content">
                                <div class="row">
                                    <?php
                                    include("assets/connection.php");
                                    $sql = "SELECT * FROM cars ORDER BY car_id";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $imageURL = 'ADMIN/caradmin/uploads/' . $row["car_image"];
                                        if ($row["car_availability"] == 1) {
                                    ?>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-package-item">
                                                    <img id="taj" src="<?php echo $imageURL; ?>" alt="package-place" />
                                                    <div class="single-package-item-txt">
                                                        <h3><?php echo $row["car_name"]; ?>
                                                            <span class="pull-right">
                                                                <?php echo '₹' . $row["car_price"] . '/Day'; ?>
                                                            </span>
                                                        </h3>
                                                        <div class="packages-para">
                                                            <p>
                                                                <i class="fa fa-angle-right"></i><?php echo $row["car_seats"]; ?> <!-- Additional car details can be added here -->
                                                            </p>

                                                            </p>
                                                            <span>
                                                                <i class="fa fa-angle-right"></i> <?php echo $row["fuel_type"]; ?>
                                                            </span><br>
                                                        </div>
                                                        <!--/.packages-para-->
                                                        <div class="packages-review">
                                                            <p>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </p>
                                                        </div>
                                                        <!--/.packages-review-->
                                                        <div class="about-btn">
                                                            <?php
                                                            if (isset($_SESSION['user_id'])) {
                                                                $encryptedId = encryptId($row['car_id']); ?>
                                                                <a href="booking.php?id=<?php echo urlencode($encryptedId); ?>&mych=cars"><button type="submit" class="about-view packages-btn">book now</button></a>
                                                            <?php
                                                            } else { ?>
                                                                <button type="submit" class="about-view packages-btn" onclick="userlogin();">book now</button>
                                                                <!--/.about-btn-->
                                                            <?php }    ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    include("assets/footer.php");
                    ?>
                </body>

                </html>
            <?php
            break;
        case 7: ?>

                <!DOCTYPE html>
                <html lang="en">
                <?php
                include("assets/cssjs.php");
                ?>

                <head>
                    <!-- META DATA -->
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
                    <script>
                        function packages() {
                            window.location.href = "./index.php#pack";
                        }

                        function destination() {
                            window.location.href = "./index.php#gallery";
                        }

                        function soffers() {
                            window.location.href = "./index.php#spo";
                        }

                        function cars() {
                            window.location.href = "./trick.php?mych=6";
                        }

                        function profile() {
                            window.location.href = "./trick.php?mych=2";
                        }

                        function logout() {
                            window.location.href = "./trick.php?mych=1";
                        }

                        function userlogin() {
                            window.location.href = "./trick.php?mych=3";
                        }
                    </script>
                </head>

                <body>
                    <section id="home">
                    </section>
                    <header class="top-area">
                        <div class="header-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="logo">
                                            <a href="http://localhost/tt">
                                                <span>Take A Trip</span>
                                            </a>
                                        </div>
                                        <!-- /.logo-->
                                    </div>
                                    <!-- /.col-->
                                    <div class="col-sm-10">
                                        <div class="main-menu">
                                            <!-- Brand and toggle get grouped for better mobile display -->
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                                    <i class="fa fa-bars"></i></button><!-- / button-->
                                            </div>
                                            <!-- /.navbar-header-->
                                            <div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav navbar-right">
                                                    <li class="smooth-menu"><a href="#home">home</a></li>
                                                    <li class="smooth-menu" onclick="destination();">
                                                        <a href="">Destination</a>
                                                    </li>
                                                    <li class="smooth-menu" onclick="packages();"><a href="">Packages </a></li>
                                                    <li class="smooth-menu" onclick="soffers();">
                                                        <a href="">Special Offer</a>
                                                    </li>
                                                    <li class="smooth-menu" onclick="cars();"><a href="">Cars</a></li>
                                                    <li class="smooth-menu"><a href="#hotelspack">Hotels</a></li>
                                                    <li>
                                                        <!-- Changed by Anand -->
                                                        <form action="booknow.php" method="post">
                                                            <input type="submit" class="book-btn" action="booknow.php" value="book now " />
                                                        </form>
                                                        <!-- <button class="book-btn" action> book now  </button> -->
                                                    </li>
                                                    <!--/.project-btn-->
                                                    <?php
                                                    // Check if the user is logged in
                                                    if (isset($_SESSION['user_id'])) { ?>
                                                        <li class="smooth-menu" onclick="profile();"><a href="">Profile</a></li>
                                                        <li class="smooth-menu" onclick="logout();"><a href="">Logout</a></li>
                                                    <?php
                                                    } else { ?>
                                                        <li class="smooth-menu" onclick="userlogin();"><a href="">Login</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <!-- /.navbar-collapse -->
                                        </div>
                                        <!-- /.main-menu-->
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- /.row -->
                                <div class="home-border"></div>
                                <!-- /.home-border-->
                            </div>
                            <!-- /.container-->
                        </div>
                        <!-- /.header-area -->
                    </header>
                    <section id="hotelspack" class="packages">
                        <div class="container">
                            <div class="gallary-header text-center">
                                <h2>Our Hotels Section</h2>
                                <p>Introducing you to our Popular Cars.</p>
                            </div>
                            <div class="packages-content">
                                <div class="row">
                                    <?php
                                    include("assets/connection.php");

                                    $sql = "SELECT * FROM hotels ORDER BY hotel_id";
                                    $result = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $imageURL = 'ADMIN/hoteladmin/uploads/' . $row["hotel_image"];
                                        if ($row["hotel_availability"] == 1) {
                                    ?>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="single-package-item">
                                                    <img id="taj" src="<?php echo $imageURL; ?>" alt="hotel-image" />
                                                    <div class="single-package-item-txt">
                                                        <h3><?php echo $row["hotel_name"]; ?>
                                                            <span class="pull-right">
                                                                <?php echo '₹' . $row["hotel_price"] . '/Day'; ?>
                                                            </span>
                                                        </h3>
                                                        <div class="packages-para">
                                                            <p>
                                                                <i class="fa fa-angle-right"></i><?php echo $row["hotel_location"]; ?> <!-- Additional car details can be added here -->
                                                            </p>

                                                            </p>
                                                            <span>
                                                                <i class="fa fa-angle-right"></i> <?php echo $row["hotel_email"]; ?>
                                                            </span><br>
                                                        </div>
                                                        <!--/.packages-para-->
                                                        <div class="packages-review">
                                                            <p>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </p>
                                                        </div>
                                                        <!--/.packages-review-->
                                                        <div class="about-btn">
                                                            <?php
                                                            if (isset($_SESSION['user_id'])) {
                                                                $encryptedId = encryptId($row['hotel_id']); ?>
                                                                <a href="booking.php?id=<?php echo urlencode($encryptedId); ?>&mych=hotels"><button type="submit" class="about-view packages-btn">book now</button></a>
                                                            <?php
                                                            } else { ?>
                                                                <button type="submit" class="about-view packages-btn" onclick="userlogin();">book now</button>
                                                                <!--/.about-btn-->
                                                            <?php }    ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    include("assets/footer.php");
                    ?>
                </body>

                </html>
        <?php
            break;
    } ?>