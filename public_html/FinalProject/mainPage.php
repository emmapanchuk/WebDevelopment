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

.question-box{
	
	display: block;
}

</style>

<style>



</style>


<div class='banner-bar'>


<h1 class="col-md-11" > TRU Forum </h1>

<button type='submit' class='btn btn-danger btn-lg col-md-1' id ='logout-button' role='button' onclick="logout()">
Logout </button>
 
</div>
<body>


<div class="container nav-bar col-md-2">

<ul>
  <li id="home-button">Home</li>
  <li id="categories-button">Categories</li>
  <li id="question-box-selector">Post New Thread</li>
</ul>






</div>

<div class="content col-md-10">

<div class="centered-box">
    <div class='container' id='question-box' style="display:none">
        <h2 style='text-align:center'>Please write your question and select the appropriate category:</h2>
		<br />
        <form method='post' action='controller.php'>
		<input type='hidden' name='page' value='MainPage'>
        <input type='hidden' name='command' value='PostQuestion'>
		<table>
		<tr>
		<td>
            <label>Question:</label> 
			</td>
			<td>
           <textarea rows="4" cols="50" name="question"></textarea>
			</td>
		</tr>
		<tr>
		<td>
            <label >Category:</label> </td>
			<td>
  <select name="category">
			<option value="1">Arts</option>
			<option value="2">Computer Science</option>

  </select></td>
			</tr>
         <tr>
		 <td>
		 </td>
		 <td>
            <button type='submit' value='Submit' id='questionSubmit'>Submit</button> </td>
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

</html>

<script>

$(document).ready(function() {
        $('#question-box-selector').click(function() {
           document.getElementById('question-box').style.display = "table-cell";
		
        });
    });

	
 
   
// When the 'SignOut' button is clicked
document.getElementById('logout-button').addEventListener('click', function() {
    document.getElementById('form-signout').submit();  // submit the above form
            });
document.getElementById('categories-button').addEventListener('click', function() {
    document.getElementById('categories-selected').submit();  // submit the above form
            });

</script> 