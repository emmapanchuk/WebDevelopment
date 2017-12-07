<!DOCTYPE html>
<html>

<head>
	<title>TRU Forum</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	
	<!-- Colour resources: https://www.tru.ca/brandguide/colours.html   !-->
	


</head>

<style>
/* Banner styling */

body{
	background-color:  #fff5de;
	overflow-x: hidden; /* Fix horizontal scroll bar appearing bug */
	height: 100%;
}

.container{
	color: black;
	height: 100%;
	/* text-align:center; */
}

.main-content{
	background-color:#f3f3f3;
	padding-left: 0px;
	width: 90vw;
	height: 100%;
}

.list-group {
	padding-right: 30px;
}

.banner-bar {
	background-color:#003e51;
	color: white;
	text-align:center;
	position: fixed;
	width: 100%;

	border-bottom: white 1px solid;
	z-index: 999;
	height: 80px;
	
/*
grey100 #f5f5f5
grey200 #eeeeee
grey300 #e0e0e0
grey400 #bdbdbd
grey500 #9e9e9e
grey600 #757575
grey700 #616161
*/
}





</style>

<style>



li:hover {
	
	color: #003e51;
	background-color: #e0e2e5;
	 /* border: 1px solid  #003e51; */
	cursor: pointer;
	/* font-weight: bold; */
}



.btn-danger{

	background-color: #003e51;
	border: #f3f3f3 1px solid;

}

.btn-danger:hover{

	background-color: #f3f3f3;
	border: 1px solid #003e51;
	color: #003e51;
}

.centered-box{
	vertical-align: middle;
	text-align:center;
}

#registerBox, #signinBox{

	vertical-align: middle;
	text-align:center;
	
	
}
form{

text-align:center;

width:100%;

}

table{
	margin:auto;
	text-align: right;
	
	}
	
td{
	padding-right: 5px;
}

.nav-bar{
	margin-top:80px;
	background-color: #003e51;
	color: white;
	font-size: 150%;
	
	height: 600px;
	min-height: 100%;

	
}

.content{
	margin-top:80px;
}

	

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}


#logout-button{
	
	float: right;
	
}

.category-item{
	
	border: 1 px solid #003e51;
	background-color: #003e51;
	border-radius: 25;
	color: white;
	padding: 15px;
	margin: 15px;
	text-size: 200%;
	
}

.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color:#003e51;
    color: white;
    text-align: right;
	padding-right: 10px;
	border-top: white 1px solid;
	
}

.logo-image{
	width: 150px;
}

.question-box{
	text-align:left; 
	border: 1 px solid black;
	
}
</style>

<style>



</style>


<div class='banner-bar'>


<h1 class="col-md-11" > TRU Forum </h1>

<button type='submit' class='btn btn-danger btn-lg col-md-1' id ='logout-button' role='button'>
Logout </button>
 
</div>
<body>


<div class="container nav-bar col-md-2">

<ul>
  <li id="home-button">Home</li>
  <li id="categories-button">Categories</li>

</ul>






</div>

<div class="content col-md-8">
<br>



</div> 

<div class="content col-md-8">

<div class="centered-box" style="border: 1px solid black;">
	
    <div class='question-box' id='question-box'>

			
 
	
    </div>
	
	
	
	
</div>	
	<div class='container' id='answer-box' style="display:none">
<br>
        <form method='post' action='controller.php'>
		<input type='hidden' name='page' value='Categories'>
		<input type='hidden' name='command' value='addAnswer'>
		<table>
		<tr>
		<td>
            <label>Answer:</label> 
			</td>
			<td>
           <textarea rows="4" cols="50" name="answer"></textarea>
			</td>
		</tr>
		<tr>
			</tr>
         <tr>
		 <td>
		 </td>
		 <td>
		 <input type='hidden' id='questionIDtoReplace' name='questionID' value=questionID>
            <button type='submit' value='Submit' id='signinSubmit'>Submit</button> </td>
			</table>
 
        </form>
    </div>
	
</div>

</div>

</div>




</body>
<form id='form-signout' method='post' action='controller.php' style='display:none'>
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='SignOut'>
        </form>
<form id='categories-selected' method='post' action='controller.php' style='display:none'>
     <input type='hidden' name='page' value='MainPage'>
     <input type='hidden' name='command' value='CategoryPage'>
</form>
<form id='home-selected' method='post' action='controller.php' style='display:none'>
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='Home'>
</form>

<div class="footer">
  <p>Made by Emma Panchuk</p>
</div>
<script>

document.getElementById('logout-button').addEventListener('click', function() {
    document.getElementById('form-signout').submit();  // submit the above form
            });
document.getElementById('categories-button').addEventListener('click', function() {
    document.getElementById('categories-selected').submit();  // submit the above form
            });
document.getElementById('home-button').addEventListener('click', function() {
    document.getElementById('home-selected').submit();  // submit the above form
            });

document.getElementById('logout-button').addEventListener('click', function() {
    document.getElementById('form-signout').submit();  // submit the above form
            });			

var questionID = 0;


$.ajax({
	url:'./phptest.php',
	data:{cat:1},
	type:'post',

	success:function(data){
		var val = JSON.parse(data);
		construct_table(val['questionID'], val['questions'], val['posters'], val['date']);
		
	}
});



function construct_table(questionID, questions, posters, date)
	{
	
	var q = questions.length;
	var table='';
	
	
    for(var i = 0; i < q; i++){
		var tableFormat = "<table> <tr><td><h1>Question: </h1></td><td><h2>%question%</h2></td></tr><tr><td>Question ID: %questionID% </td><td>";
		tableFormat += "Posted by: %posters%</td></tr><tr><td></td><td>Posted on: %date%" ;
		tableFormat += " </td><tr><td></td><td>";
		tableFormat += "<button name='addAnswerForm' class='btn btn-danger btn-lg col-md-1' value='%questionID%' id ='%questionID%-answer-button' role='button' ";
		tableFormat += "onclick='answerBox(this)' style=\"width:150px; float:right\"> Add an answer </button></td>";
		tableFormat += "<td><button name='questionID' class='btn btn-danger btn-lg col-md-1' id='questionID'";
		tableFormat += "role='button' value='%questionID%'  style=\"width:150px; float:right\" onclick='showanswer(this)'> View Answers</button> </td><tr><td><div id='display-%questionID%'></div></td></tr></table>";

		
	
		tableFormat = tableFormat.replace('%question%',questions[i]);
		tableFormat = tableFormat.replace('%posters%',posters[i]);
		tableFormat = tableFormat.replace('%date%',date[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);
		tableFormat = tableFormat.replace('%questionID%', questionID[i]);

		$('#question-box').append(tableFormat);

		
	}	
		
    
	
	
	
		}	




function answerBox(e){


           $('#answer-box').toggle();
		   questionID = e.value;
		   document.getElementById("questionIDtoReplace").value = questionID;
	
}


function showanswer(e){
	var str='#display-'+e.value;

$.ajax({
	url:'./phpanswers.php',
	data:{'qid':e.value},
	type:'post',
	success:function(data){

		if(data==0){
			$(str).html("There are no answers to this question");
			}
		else{
		var val = JSON.parse(data);
		var str2 = construct_answer_table(val['answerID'], val['answer'], val['posters'], val['date']);
		var val = JSON.parse(data);
			$(str).html(str2);
	}
		
	}
});



}

function construct_answer_table(answerID, answer, posters, date){
{
	
	var a = answer.length;
	str = '';
	
	
    for(var i = 0; i < a; i++){
		var tableFormat = "<tr><td><h2>Answer: </h2></td><td><h3>%answer%</h3></td></tr><tr><td></td><td>";
		tableFormat += "Posted by: %posters%</td></tr><tr><td></td><td>Posted on: %date%" ;
		tableFormat += " </td><tr>";
	
	
		
	
		tableFormat = tableFormat.replace('%answer%',answer[i]);
		tableFormat = tableFormat.replace('%posters%',posters[i]);
		tableFormat = tableFormat.replace('%date%',date[i]);
	
		str += tableFormat;
	
		
	}	
		
    return str;
	
	
	
		}	
	


}

</script> 



</html>

