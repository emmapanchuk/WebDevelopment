<?php
$conn = mysqli_connect('localhost', 'epanchuk', 'epanchukf7', 'COMP3540_epanchuk');

function insert_new_user($username, $password, $email)
{
    global $conn;
    
    if (does_exist($username))
        return false;
    else {
        $current_date = date('Ymd');
		$hashed_password = md5($password);
        $sql = "insert into Users values (NULL, '$username', '$hashed_password', '$email', '$current_date')";
        $result = mysqli_query($conn, $sql);

        return $result;
    }
}

function is_valid($username, $password) 
{
    global $conn;
	$hashed_password = md5($password); 
    $sql = "select * from Users where (Username = '$username' and Password = '$hashed_password')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function does_exist($username) 
{
    global $conn;
    
    $sql = "select * from Users where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)
        return true;
    else
        return false;
}

function get_questions($category){
	
	global $conn;
	
	$sql = "Select * from Questions where (category = '$category')";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
		return $result;
		
	else
		return false;
	
	
}

function get_answers($questionID){
	
	global $conn;
	
	$sql = "Select * from Answers where (QuestionID = '$questionID')";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
		return $result;
		
	else
		return false;
	
	
}

function insert_question($question, $category, $username){
	
	global $conn;
    $current_date = date('Ymd');
	$sql = "insert into Questions values (NULL, '$question', '$category', '$username', '$current_date')";
        $result = mysqli_query($conn, $sql);

        return $result;
	
	
}

function insert_answer($questionID, $answer, $username){
	
	global $conn;
    $current_date = date('Ymd');
	$sql = "insert into Answers values (NULL, '$questionID', '$answer', '$username', '$current_date')";
        $result = mysqli_query($conn, $sql);

        return $result;
	
	
}

?>   