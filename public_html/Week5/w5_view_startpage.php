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
            display:none;  /* initially not displayed */
            width:100%;
            height:100%;
            position:fixed;
            top:0px;
            left:0px;
            opacity:50%;  /* for the transparency */
            background-color:Grey;
            z-index:100;
        }

        .modal-window {
            display: none;  /* initially not displayed */
            width: 400px;
            height: 300px;
            position: absolute;
            top: 200px;
            left: calc(50vw - 200px);  /* should be at the horizontal center of the viewport */
            border: 1px solid black;
            background-color:White;
            padding: 20px;
            z-index:101;
        }
        .modal-label {
            display:inline-block;
            width:80px;
        }
    </style>
    
    <script>
        window.addEventListener('load', function() {
            // Registration of event handlers
            document.getElementById('menu-signin').addEventListener('click', show_signin_modal_window);
            document.getElementById('menu-join').addEventListener('click', show_join_modal_window);
            document.getElementById('blanket').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-signin').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-join').addEventListener('click', hide_all_modal_windows);
            
            // Some initial activities
            <?php   // You need to remember that this file is included in //controller.php, and 
                    //   this variable is defined before the inclusion of this file.
                if ($display_type == 'signin')
                    echo 'show_signin_modal_window();';
                else if ($display_type == 'join')
                    echo 'show_join_modal_window();';
                else
                   ;
            ?>
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
        <form method='post' action='w5_controller.php'>  <!-- to your controller -->
            <input type='hidden' name='page' value='StartPage'></input>
            <input type='hidden' name='command' value='SignIn'></input>
            <label class='modal-label'>Username:</label> 
            <input type='text' name='username' placeholder='Enter username' required></input>
            <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
            <br>
            <label class='modal-label'>Password:</label> 
            <input type='password' name='password' placeholder='Enter password' required></input>
            <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
            <br>
            <br>
            <button type='submit' value='Submit'>Submit</button>
            <button type='reset' value='Reset'>Reset</button>
            <button id='cancel-signin' type='reset' value='Cancel'>Cancel</button>
        </form>
    </div>

    <div id='join' class='modal-window'>
        <h2 style='text-align:center'>Join</h2>
        <br>
        <form method='post' action='w5_controller.php'>  <!-- to your controller -->
            <input type='hidden' name='page' value='StartPage'></input>
            <input type='hidden' name='command' value='Join'></input>
            
            <label class='modal-label'>Username:</label> 
            <input type='text' name='username' placeholder='Enter username' required></input>
            <?php if (!empty($error_msg_username)) echo $error_msg_username; ?>
            <br>
            <label class='modal-label'>Password:</label> 
            <input type='password' name='password' placeholder='Enter password' required></input>
            <?php if (!empty($error_msg_password)) echo $error_msg_password; ?>
            <br>
            <label class='modal-label'>Email:</label> 
            <input type='email' name='email' placeholder='Enter email address' required></input>
            <?php if (!empty($error_msg_email)) echo $error_msg_email; ?>
            <br>
            <br>
            <button type='submit' value='Submit'>Submit</button>
            <button type='reset' value='Reset'>Reset</button>
            <button id='cancel-join' type='reset' value='Cancel'>Cancel</button>
        </form>
    </div>
</body>
</html>
