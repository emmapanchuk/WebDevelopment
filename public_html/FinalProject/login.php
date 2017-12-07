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
}

.container{
	color: black;
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
/* Filter dialog styling */

.filter-li {
	padding: 4px;
}

.container.filter {
	margin-top: 90px;
	padding-top: 10px;
	padding-right: 10px;
	padding-left: 50px;
	height: calc(100vh - 100px);
	overflow: auto;
}

.container.filter > ul > ul > li {
	margin-top: 4px;
	margin-bottom: 4px;
}

.primary-list{

}

.course-checkbox {
	float: right;
	margin-right: 10px !important; 
	margin-top: 15px !important;
	/* margin-bottom: 40px;  ?????? */ 
}

.image{
	display:none;
	width:10px; 
	height:10px;
}

.image-left{
	width:10px; 
	height:10px;
}
.image-inner{
	display:none;
	width:10px; 
	height:10px;
}

.image-left-inner{
	width:10px; 
	height:10px;
}

.secondary-list{
	list-style-type: none;
	display: none;
}

.third-list {
	list-style-type: none;
	display: none;
	padding-left: 14px;
}

.third-list > li{
	border: solid black 1px;
	border-bottom: none;
	display:block;
	width: 90%;
}

.third-list > li:last-child{
	border-bottom: solid black 1px;
}

.list-group-item {
	margin-top: 8px;
}


li:hover {
	
	color: #003e51;
	background-color: #e0e2e5;
	 /* border: 1px solid  #003e51; */
	cursor: pointer;
	/* font-weight: bold; */
}

.schedule-box{
	background-color: #e0e2e5;
	color: #003e51;
	text-align:center;
	padding-left: 10px;
	margin-top: 65px;
}

.button-box{
	
	margin-top: 80px;
	text-align:center;
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



</style>

<style>



</style>



<body>
<div class='banner-bar'>


<h1 class="header-text">TRU Forum</h1>
</div>
<div class="container main-content">

<div class='container button-box' >



<h2>  Please sign in to your account  </h2>



<p> 

<button type='submit' class='btn btn-danger btn-lg' id ='signinButton' role='button'>
Sign in </button>
<button type='submit' class='btn btn-danger btn-lg' id='registerButton' role='button'> Register </button>


</p>


</div>
<div class="centered-box">
    <div class='container' id='signinBox' style="display:none">
        <h2 style='text-align:center'>Sign In</h2>
		<br />
        <form method='post' action='controller.php'>
		<input type='hidden' name='page' value='login'></input>
        <input type='hidden' name='command' value='SignIn'></input>
		<table>
		<tr>
		<td>
            <label>Username:</label> 
			</td>
			<td>
            <input type='text' name='username' placeholder='Enter username' required></input>
			</td>
		</tr>
		<tr>
		<td>
            <label >Password:</label> </td>
			<td>
            <input type='password' name='password' placeholder='Enter password' required></input> </td>
			</tr>
         <tr>
		 <td>
		 </td>
		 <td>
            <button type='submit' value='Submit' id='signinSubmit'>Submit</button> </td>
			</table>
 
        </form>
    </div>
	
</div>

<div class="centered-box">
	<div class='container' id='registerBox' style="display:none ">
	
	<h2 style='text-align:center'>Register</h2>
	<form method='post' action='controller.php'>
	
	<input type='hidden' name='page' value='login'></input>
    <input type='hidden' name='command' value='Register'></input>
	<table>
	<tr>
	<td>
	<label>Username: </label> </td>
	<td>
	<input type='text' name='username' placeholder='Enter a username' required></input></td>
	
	</tr>
	<tr>
	<td>


    <label>Password:</label> </td>
	<td>
    <input type='password' name='password' placeholder='Enter a password' required></input> </td>
	</tr>
	<tr>
	<td>
	
		
	<label >Re-enter:</label> </td>
	<td>
    <input type='password' name='re-password' placeholder='Re-enter your password' required ></input> </td>
	</tr>
	<tr>
	<td>
	
	
	
	<label>Email:</label> </td>
	<td>
    <input type='text' name='email' placeholder='Enter your email address' required></input></td>
	</tr>
	<tr>
	<td>
	
	</td>
	<td>
         
    <button type='submit' value='Submit' id='registerSubmit'>Submit</button> </td>
	
	<table>
	
</div>

</div>

</div>




</body>

</html>

<script>

$(document).ready(function() {
        $('#signinButton').click(function() {
           document.getElementById('signinBox').style.display = "table-cell";
		   document.getElementById('registerBox').style.display = "none";
        });
    });

	$(document).ready(function() {
        $('#registerButton').click(function() {
           document.getElementById('registerBox').style.display = "table-cell";
		   document.getElementById('signinBox').style.display = "none";
        });
    });
	

</script> 