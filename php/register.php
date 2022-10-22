<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);

}

function registerUser($username, $email, $password){
    // open the file
    $file = fopen('../storage/users.csv', 'a');
    // open the file for writing
    if($file === false){
        echo 'Could not open file';
    } 
            
    //save data into the file
    foreach ($rows as $row) {
        fputcsv($file, $row);
    }
    fclose($file); //close the file
    
    echo "Successfully registered";
}