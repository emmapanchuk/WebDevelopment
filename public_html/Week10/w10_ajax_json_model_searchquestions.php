<?php
    $file = fopen('lab10.json', 'r');  // open your json file for reading
    $table = array();  // []
    $i = 0;
    while(!feof($file)) {  // eof: end of file
        $row = fgets($file);  // read a line from the file
        if (strlen($row) > 0) {
            $row = json_decode($row);  // convert a JSON string to an associative array
            $table[$i] = $row;  // add it 
			$i++;
        }
    }

    echo json_encode($table);  // Convert the array to a JSON string, and send it back to the client
?>

