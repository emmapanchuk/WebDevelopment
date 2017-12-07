<?php
    // For the case this mainpage is accessed withouth going through controller
    // Let's check whether the session is established.
    if (!isset($_SESSION['signedin']) || $_SESSION['signedin'] != 'YES') {
        $display_type = 'no-signin';
		include ('w7_view_startpage.php');
		// StartPage with no SignIn or Join modal window
        exit();
    }

    $username = $_SESSION['username'];  // recover the session variable, so that username can be used below.
?>

<!DOCTYPE html>

<html>
<head>
    <title>TruQA</title>
    
    <!-- for Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> </link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
    </style>
    
    <script>
        /*
        *   Timeout
        */
        
        var timer = setTimeout(timeout, 10 * 1000);
        window.addEventListener('mousemove', function() {  // mouse movement action
            clearTimeout(timer);
            timer = setTimeout(timeout, 10 * 1000);
        });
        window.addEventListener('keydown', function() {  //  key down action 
            clearTimeout(timer);
            timer = setTimeout(timeout, 10 * 1000);
        });
        // when the window is unloaded, i.e., closed
        window.addEventListener('unload', function() {
            // $.post('???', { page: 'MainPage', command: 'SignOut' }, function(data, status) {});
            timeout();  // Just call the timeout function. It might not work. Why ???????
        });
        function timeout() {
	
            document.getElementById('form-signout').submit();  // submit the 'form-signout' form.
                  // A similar example is at the end of this file.
        }
    </script>
</head>

<body>
    <div class='container-fluid'>
        <!-- Header -->
        <div class='header'>
            <div class='bg-primary'>
                <h1 style='text-align:center; padding-top: 10px;'>TRU Questions & Answers</h1>
                <h3 style='text-align:center; padding-bottom: 10px;'>- User: <?php echo $_SESSION['username'] ?> -</h3>
            </div>
        </div>

        <!-- Navigation bars and content -->
        <div class='nav'>
            <!-- Navigation bars -->
            <div class='col-sm-2 bg-info'>
                <ul class="nav nav-pills nav-stacked">
                    <li><a id='post-question' data-toggle='modal' data-target="#modal-post-question">Post a question</a></li>
                    <li><a id='list-questions'>List questions</a></li>
                    <li><a id='list-answers'>List answers</a></li>
                    <li><a id='search-questions'>Search questions</a></li>
                    <li><a id='search-answers'>Search answers</a></li>
                    <li><a id='signout'>Sign out</a></li>
                </ul>
            </div>
            
            <!-- Content -->
            <div class='col-sm-2 bg-success'>
                <div id='content'>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class='row'>
            <div>
            </div>    
        </div>
        
        <!-- Sign out, using an invisible form -->

        <form id='form-signout' method='post' action='w7_controller.php' style='display:none'>
            <input type='hidden' name='page' value='MainPage'>
            <input type='hidden' name='command' value='SignOut'>
        </form>
        <script>
            // When the 'SignOut' button is clicked
            document.getElementById('signout').addEventListener('click', function() {
                document.getElementById('form-signout').submit();  // submit the above form
            });
        </script>
    </div>
</body>
</html>
