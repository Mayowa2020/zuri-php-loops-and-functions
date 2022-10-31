<?php
// Initialize the session.
session_start();

// Unset all of the session variables.
$_SESSION = array($fullname, $email, $password);

function logout($fullname, $email, $password){
    /*
Check if the existing user has a session
if it does
*/

// remove all session variables
session_unset();
$_SESSION['fullname'] = $fullname;
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

}
// destroy the session
session_destroy();
header("location: ../../../forms/login.html");?>