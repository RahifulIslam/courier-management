<?php
// Create connection
$connection = mysqli_connect('localhost', 'root');

//connection with database
mysqli_select_db($connection, 'courier_management');

// Check connection
if ($connection) {
    // echo "Connected successfully";
}else{
    echo "Connected failed";
}

?>