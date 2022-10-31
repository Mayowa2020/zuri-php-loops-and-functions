<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $newpassword = $_POST['password'];

    resetPassword($email, $password);
}

function resetPassword($email, $password){
    //open file and check if the username exist inside
    //if it does, replace the password

    $file = fopen('./../storage/users.csv', 'r');
    while (!feof($file)) {
        $line = fgetcsv($file);
        if($line[1] == $email) {
            $line[2 ] == $password;
            $file = fopen('./../storage/users.csv', 'w');
            
            fputcsv($file, $line);
            echo '<scripts>
            alert("Password was successfully changed");
            window.location.href="../login.php.html";
            </scripts>';
            fclose($file);
    }
    echo "email Not Found";
    }}