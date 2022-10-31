<?php
session_start();
$email = $_POST['email'];
if(isset($_POST['submit'])){    
    $password = $_POST['password'];
       
    loginUser($email, $password);
    
}

$user_data = array(
    'fullname' => $fullname,
    'email' => $email,
    'password' => $password);
    
function loginUser($email, $password)
{
    
$user_data = array(
    'email' => $email,
    'password' => $password);
    /*
     Finish this function to check if email and password 
     from file match that which is passed from the form
     */

    // open the csv file in read mode
$file_read = fopen('../storage/users.csv', 'r');
// $file_write = fopen('../storage/users.csv', 'w');
while(($user_data == fgetcsv($file_read))!== false) {
    if ($user_data[1] == $email) {
        $user_data[2] == $password;
        echo '<scripts>
        alert("Succesfully signed in");
        window.location.href="../dashboard.php.html";
        </scripts>';
    }
    else {
        echo '<scripts>
        alert("Sign in unsuccessful, try logging in again");
              </scripts>';
    }
}

fclose($file_read);

}