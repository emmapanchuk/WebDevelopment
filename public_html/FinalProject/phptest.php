<?php 
	include('model.php');
	$category = $_POST['cat'];
	
	
	$result = get_questions($category);
	$questionID = array();
	$questions = array();  // []
	$poster = array();
	$date = array();
    $i = 0;
    while($row=mysqli_fetch_assoc($result)) {  // eof: end of file
		$questionID[$i] = $row["QuestionID"];
        $questions[$i] = $row["Question"];
		$poster[$i] = $row["UserID"];
		$date[$i] = $row["Date"];
		$i++;
        
    }
	$tablecontent=array('questionID'=>$questionID, 'questions'=>$questions,'posters'=>$poster,'date'=>$date);
    echo json_encode($tablecontent);  // Convert the array to a JSON string, and send it back to the client
?>
