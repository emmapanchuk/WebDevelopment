<!DOCTYPE html>

<html>
<head>
    <title>Sign In - TruQA</title>
    <style>
        #ddm {
            position:fixed;
            top:0px;
            left:0px;
        }
        #ddm li, #ddm ul {
            list-style: none;
            padding: 0;
            background-color: Gray;
            cursor:pointer;
        }
        #ddm ul {
            border:1px solid black;
        }
        #ddm > li {
            position: relative;
        }
        #ddm > li > ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
        }
        #ddm > li > ul > li { padding: 5px; }
        #ddm li:hover {
            background-color: #eee;
        }
        #ddm > li:hover > ul {
            display: block;
        }
        
        #blanket {
            display:none;
            width:100vw;
            height:100vh;
            position:fixed;
            top:0px;
            left:0px;
            opacity:0.5;  /* for the transparency */
            background-color:Grey;
            z-index:9000;
        }

        .modal-window {
            display: none;
            width: 400px;
            height: 300px;
            position: absolute;
            top: 200px;
            left: calc(50vw - 200px);  /* should be at the horizontal center of the viewport */
            border: 1px solid black;
            background-color:White;
            z-index:9001;
        }
        .modal-label {
            display:inline-block;
            width:80px;
        }
        .modal-window > form {
            margin-left: 20px;
        }
        .modal-window > form > button[type=submit] {  /* submit button */
            display: inline-block;
            position: absolute;
            left: 0;
        }
        .modal-window > form > button[type=reset] {  /* reset button */
            display: inline-block;
            position: absolute;
            right: 70px;
        }
        .modal-window > form > button[type=button] {  /* cancel button */
            display: inline-block;
            position: absolute;
            right: 0;
        }
    </style>
    
    <script>
        window.addEventListener('load', function() {
            document.getElementById('menu-signin').addEventListener('click', show_signin_modal_window);
            document.getElementById('menu-join').addEventListener('click', show_join_modal_window);
            document.getElementById('blanket').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-signin').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-join').addEventListener('click', hide_all_modal_windows);
        });
        function show_signin_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('signin').style.display = 'block';
        }
        function show_join_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('join').style.display = 'block';
        }
        function hide_all_modal_windows() {
            document.getElementById('blanket').style.display = 'none';
            document.getElementById('signin').style.display = 'none';
            document.getElementById('join').style.display = 'none';
        }
    </script>
</head>

<body>
    <h1 style='text-align:center'>TRU Questions & Answers</h1>
    <hr>
    
    <ul id='ddm'>
        <li style='width: 50px;'><img src='menu_icon.png' width='50px' height='50px'></img>
            <ul style='width:120px'>
                <li id='menu-signin'>Sign In</li>
                <li id='menu-join'>Join</li>
                <li id='menu-forgot-password'>Forgot Password</li>
                <li id='menu-unsubscribe'>Unsubscribe</li>
            </ul>
        </li>
    </ul>
    
    <div id='blanket'>
    </div>

    <div id='signin' class='modal-window'>
        <h2 style='text-align:center'>Sign In</h2>
        <br>
        <form method='get' action='http://cs.tru.ca/~mlee/comp3540/Software/test_display_inputs.php'>
            <input type='hidden' name='page' value='StartPage'></input>
            <input type='hidden' name='command' value='SignIn'></input>
            <label class='modal-label'>Username:</label> 
            <input type='text' name='username' placeholder='Enter username' required></input>
            <?php if (!empty($error_username)) echo $error_username; ?>
            <br>
            <label class='modal-label'>Password:</label> 
            <input type='password' name='password' placeholder='Enter password' required></input>
            <?php if (!empty($error_password)) echo $error_password; ?>
            <br>
            <br>
            <button type='submit' value='Submit'>Submit</button>
            <button type='reset' value='Reset'>Reset</button>
            <button id='cancel-signin' type='button' value='Cancel'>Cancel</button>
        </form>
    </div>

    <div id='join' class='modal-window'>
        <h2 style='text-align:center'>Join</h2>
        <br>
        <form method='get' action='http://cs.tru.ca/~mlee/comp3540/Software/test_display_inputs.php'>
            <input type='hidden' name='page' value='StartPage'></input>
            <input type='hidden' name='command' value='Join'></input>
            
            <label class='modal-label'>Username:</label> 
            <input type='text' name='username' placeholder='Enter username' required></input>
            <?php if (!empty($error_username)) echo $error_username; ?>
            <br>
            <label class='modal-label'>Password:</label> 
            <input type='password' name='password' placeholder='Enter password' required></input>
            <?php if (!empty($error_password)) echo $error_password; ?>
            <br>
            <label class='modal-label'>Email:</label> 
            <input type='email' name='email' placeholder='Enter email address' required></input>
            <?php if (!empty($error_email)) echo $error_email; ?>
            <br>
            <br>
            <button type='submit' value='Submit'>Submit</button>
            <button type='reset' value='Reset'>Reset</button>
            <button id='cancel-join' type='button' value='Cancel'>Cancel</button>
        </form>
    </div>
</body>
</html>
