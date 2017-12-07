<?php
$conn = mysqli_connect('localhost', 'epanchuk', 'epanchukf7', 'COMP3540_epanchuk');  // connect to your DB

/*
*   username value is passed to this function.
*   This function is used to check if the user exists.
*/

function does_exist($username) 
{
    global $conn;  // inorderto use a global variable
    
    $sql = "SELECT * from Users where (Username = '$username')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)  // check the number of selected rows
        return true;
    else
        return false;
}

/*
*   username and password values are passed to this function.
*   This function is used to check if the user is valid.
*/
 
function is_valid($username, $password) 
{
    global $conn;
    
    $sql = "SELECT * FROM Users WHERE ((Username ='$username') and (Password = '$password'))";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0)  // check the number of selected rows
        return true;
    else
        return false;
}

/*
*   username, password, email are passed to this function.
*   This function tries to insert of new row with those passed values.
*/

function insert_new_user($username, $password, $email)
{
    global $conn;
    
    if (does_exist($username))  // if the user exist
                         // You can use a function defined in the above
        return false;
    else {
        $current_date = date('Ymd');
        $sql = "INSERT into Users (username, password, email, date)VALUES ('$username', '$password', '$email', '$current_date')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
}

?>   