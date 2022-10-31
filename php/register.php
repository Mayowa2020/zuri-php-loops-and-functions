<?php

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($fullname, $email, $password);

} else {
    echo 'No data';
}
function registerUser($fullname, $email, $password)
{

    if (empty($_POST["fullname"])) {
        echo '<b>Please Enter your Name</b>';
    } else {
        $fullname = clean_text($_POST["fullname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            echo '<b>Only letters and white space allowed</b>';
        }
    }
    if (empty($_POST["email"])) {
        echo 'Please Enter your Email';
    } else {
        $email = clean_text($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Invalid email format';
        }
    }
    if (empty($_POST["password"])) {
        echo 'Password is required';
    } else {
        $password = clean_text($_POST["password"]);

    }

    $user_data = [$fullname, $email, $password];
    // Open/Create the file and append data
    $file = fopen('./../storage/users.csv', 'a');

    while (!feof($file)) {
        $row = fgetcsv($file);
        if ($row[0] == $fullname || $row[1] == $email) {
            echo "User already exists";
            exit();
        } else {
            //write to file
            fputcsv($file, $user_data);

        }
        echo "User Successfully Registered...";
    }
    fclose($file);

    echo $fullname . " ", $email, " ", $password;
    }