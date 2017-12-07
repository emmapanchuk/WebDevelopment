<?php
if (empty($_POST['page'])) {  // When no page is sent from the client; The initial display
                                // You may use if (!isset($_POST['page'])) instead of empty(...).
    $display_type = 'no-signin';  // This variable will be used in 'view_startpage.php'.
                              // It will display the start page without any box, i.e., no SignIn box, no Join box, ...
    include 'w5_view_startpage.php';  // Include the first page
    exit();
}

require 'w5_model.php';  // This file includes some routines to use DB.
               // E.g., is_valid() to check the validity of username and password.
//...

// When commands come from StartPage
if ($_POST['page'] == 'StartPage')  // Check the page value
{
    $command = $_POST['command'];
    switch($command) {  // When a command is sent from the client
        case 'SignIn':  // With username and password
//            if (there is an error in username and password) {
				$username = $_POST['username'];
				$password = $_POST['password'];
            if (!is_valid($username, $password)) {
                $error_msg_username = '* Wrong username, or';
                $error_msg_password = '* Wrong password'; // Set an error message into a variable.
                                                        // This variable will used in the form in 'view_startpage.php'.
                $display_type = 'signin';  // It will display the start page with the SignIn box.
                                           // This variable will be used in 'view_startpage.php'.
                include 'w5_view_startpage.php';  // Include the start page
            } else
                include 'w5_view_mainpage.php';  // Include the main page
            exit();
            
        case 'Join':  // With username, password, email, some other information
            //...
            exit();
        //...
    }
}

// When commands come from 'MainPage'
else {
    //...
}
?>   