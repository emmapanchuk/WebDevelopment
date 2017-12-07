<?php
	$username = $_POST['username'];
	$phone_number = $_POST['phone-number'];
	$password = $_POST['password'];

	/*
	*	check if the username syntax is valid
	*/
	
    $pattern = '/^[a-zA-Z_][a-zA-Z0-9_]{0,13}$/';
	if (preg_match($pattern, $username))
		echo 'The username ' . $username . ' is valid.<br>';
	else
		echo 'The username ' . $username . ' is not valid.<br>';
	echo '<br>';
	
	/*
	*	check if the phone number syntax is valid
	*/
	
    $pattern = '/^((\([1-9][0-9]{2}\))|[1-9][0-9]{2}\-) *[1-9][0-9]{2}-[0-9]{4,4}$/';
	if (preg_match($pattern, $phone_number))
		echo 'The phone number ' . $phone_number . ' is valid.<br>';
	else
		echo 'The phone number ' . $phone_number . ' is not valid.<br>';
	echo '<br>';
	
	/*
	*	check if the password syntax is valid
	*/
	
    $pattern = '/^[0-9](?=.*[!@#$%^&*\-])[0-9a-zA-Z!@#$%^&*\-]{4,}[a-zA-Z]$/';
	if (preg_match($pattern, $password))  // valid password
		echo 'The password ' .$password . ' is valid. <br>';
	else  // invalid password
		echo 'The password ' .$password . ' is not valid.<br>';
	echo '<br>';
?>
