<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    $insertUser = "INSERT INTO users (username, password_hash) 
                       VALUES ('$email', '$password')";

    mysqli_query($con, $insertUser);

    $user_id = mysqli_insert_id($con);

    $insertUserData = "INSERT INTO user_data (user_id, name, email, phone, dob, address) 
                           VALUES ('$user_id', '$name', '$email', '$phone', '$dob', '$address')";

    mysqli_query($con, $insertUserData);

    mysqli_close($con);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
