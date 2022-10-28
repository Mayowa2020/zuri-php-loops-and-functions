<?php
// Initialize the session.
session_start();

// Unset all of the session variables.
$_SESSION = array();

function logout(){
    /*
Check if the existing user has a session
if it does
*/
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
);
}else{
    
}

// Finally destroy the session and redirect to login page.
session_destroy();
header("location: ../../../forms/login.html");

?>