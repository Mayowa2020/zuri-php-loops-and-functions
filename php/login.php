<?php
if(isset($_POST['submit'])){
    $email = $POST['email'];
    $password = $POST ['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
    /*
        Finish this function to check if email and password 
    from file match that which is passed from the form
    */
    
    // open the csv file in read mode

    $file = fopen('../storage/users.csv', 'r');
    if ($file) { // check if file opened successfully
        //loop through the file to checkif data exist
    while (($row = fgetcsv($file)) !==false) {
        // if ($row[1] == $email && $row[2] == $password) {
        //     $success = true;
        //     break;
        //     }
        // }
        // fclose($file);

        // if ($success) {
        //     session_start();
        //     $_SESSION['email'] = $email;
        //     $_SESSION['password'] = $password;
        //     session_write_close();
        //     header("location: ./../");
        // }else{
        //     echo
        // }    
            
        
        // $rows[] = $row;
        
        switch($email && $password) {
            case ($row[1] == $email && $row[2] == $password);
                    echo 'Login successful';
                    break;

            case ($row[1] == $email && $row[2] != $password);
            echo ' Invalid Password';
            break;

            case($row[1] =! $email && $row[2] == $password);
            echo 'Invalid Email';
            break;
            
            default: echo 'Incorrect Credentials';
        }
    }}
        
        // check both email and password match
        // if ($row[0] == $email && $row[1] == $password) {
        //     echo 'Login successful';
        //     exit();
        //     } 
        //     // email matches but password does not match
        //     else if ($row[0] == $email && $row[1] != $password) {
        //         echo ' Invalid Password';
        //     // exit();    
        //     }
        //     // password matches but email does not match
        //     else if ($row[0] =! $email && $row[1] == $password) {
        //         echo ' Wrong Email';
        //     // exit();    
        //     } 
        //     // both email and password does not match
        //     else {
        //         echo 'Incorrect Credentials';
        //         // exit();
        //   
     // close the file
     fclose($file);      }
                
    
   