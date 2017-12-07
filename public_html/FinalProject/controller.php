<?php

session_start();  // start session


// When the controller is accessed without a command
if (empty($_POST['page'])) {  // When no page is sent from the client; The initial display
                              // You may use if (!isset($_POST['page'])) instead of empty(...).
    if (!isset($_SESSION['signedin'])) {  // if the 'signedin' session variable is not set, then StartPage 
        $display_type = 'no-signin';  // This variable will be used in 'view_startpage.php'.
        include ('login.php');
    }
    else {  // if the 'signedin' session variable is set, then display MainPage
            // it can happen when MainPage is reloaded.
        include ('mainPage.php');
    }
    exit();
}


require('model.php');  // This file includes some routines to use DB.


// When commands come from StartPage
if ($_POST['page'] == 'login')
{
    $command = $_POST['command'];
    switch($command) {  // When a command is sent from the client
        case 'SignIn':  // With username and password
            // if (there is an error in username and password) {
            if (!is_valid($_POST['username'], $_POST['password'])) {
                $error_msg_username = '* Wrong username, or';
                $error_msg_password = '* Wrong password'; // Set an error message into a variable.
                                                        // This variable will used in the form in 'view_startpage.php'.
                $display_type = 'signin';  // It will display the start page with the SignIn box.
                                           // This variable will be used in 'view_startpage.php'.
				echo "<script>alert('Wrong username or password. Please try again.');</script>";
                include('login.php');
            } 
            // when the user is valid
            else {
                // let's save username and 'YES' to the 'signedin' session variable.
                $_SESSION['signedin'] = 'YES';
                $_SESSION['username'] = $_POST['username'];  // it is recovered in MainPage.
                include ('mainPage.php');  // view_mainpage.php
            }
            exit();

        case 'Register':  // With username, password, email, some other information
            if (does_exist($_POST['username'])) {
                $error_msg_username = '* The user exists.';
                $display_type = 'Register';
					echo "<script>alert('User exists');</script>";
                include('login.php');
            } else {
                if (insert_new_user($_POST['username'], $_POST['password'], $_POST['email'])) {
                    $display_type = 'signin';
				
                    include('mainPage.php');
                } else {
                    $error_msg_username = '* Insertion error';
                    $display_type = 'join';
						echo "<script>alert('Insertion error.');</script>";
                    include('login.php');
                }
            }
            exit();
     
    }
}


// When commands come from 'MainPage'
else if ($_POST['page'] == 'MainPage') 
{
    // check if this session is broken using $_SESSION['signedin']
    if (!isset($_SESSION['signedin'])) {  // if the 'signedin' session variable is not set, then display StartPage.
                // it happens when StartPage is reloaded after 'SignOut' from MainPage.
                //   'Form Resubmission' happens.
        $display_type = 'no-signin'; 
        include ('mainPage.php');  // stop here.
    }
    
    // support commands
    
    $command = $_POST['command'];
    
    switch($command) {
        case 'SignOut':
            // destroy session variables and the session
            session_unset();
            session_destroy();
            // go to 'StartPage'
            $display_type = 'no-signin';
            include('login.php');
            break;
            
		case 'PostQuestion':
		
			if (!insert_question($_POST['question'], $_POST['category'], $_SESSION['username'])) {
				echo "<script>alert('A problem has occured. Please try again.');</script>";
                include('mainPage.php');
            } 
            // when question is stored to database successfully 
            else {
                
				include('categories.php');
				echo "<script>alert('Your question has been successfully posted! Please select the appropriate category to view it.');</script>";
				break;
               // include ('categories.php');  // 
			}
			
		case 'CategoryPage':
			include('categories.php');
			break;
		
		case 'Home':
			include('mainPage.php');
			break;
		
        
    }
}

else if($_POST['page'] == 'Categories'){

	$command = $_POST['command'];
	
	switch($command){
		case 'arts':
			include('arts.php');
		break;
		case 'computer-science':
			include('computer-science.php');
		break;
		
		case 'addAnswer':
		if (!insert_answer($_POST['questionID'], $_POST['answer'], $_SESSION['username'])) {
				echo "<script>alert('A problem has occured. Please try again.');</script>";
            } 
		else{
			echo "<script>alert('Answer successfully posted');</script>";
				include('arts.php');
			break;
			
		}
		case 'addAnswerComp':
		if (!insert_answer($_POST['questionID'], $_POST['answer'], $_SESSION['username'])) {
				echo "<script>alert('A problem has occured. Please try again.');</script>";
            } 
		else{
			echo "<script>alert('Answer successfully posted');</script>";
				include('computer-science.php');
			break;
			
		}
			
			

		
		
	}
}

?>   
