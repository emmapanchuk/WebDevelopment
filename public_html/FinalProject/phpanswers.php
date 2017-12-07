<?php 
	include('model.php');
	$questionID=$_POST['qid'];

	$result = get_answers($questionID);
	$answerID = array();
	$answers = array();  // []
	$poster = array();
	$date = array();
    $i = 0;
	if($result){
    while($row=mysqli_fetch_assoc($result)) {  // eof: end of file
		$answerID[$i] = $row["AnswerID"];
        $answer[$i] = $row["Answer"];
		$poster[$i] = $row["UserID"];
		$date[$i] = $row["Date"];
		$i++;
        
    }
	$tablecontent=array('answerID'=>$answerID, 'answer'=>$answer,'posters'=>$poster,'date'=>$date);

	echo json_encode($tablecontent);  // Convert the array to a JSON string, and send it back to the client
	}
	else{
		echo 0;
	}
	?>
