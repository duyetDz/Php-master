<?php

$servername = "localhost";
$username = "GVDUYET";
$password = "GVDUYET";

// Check connection
$con = mysqli_connect($servername, $username, $password, "php_master");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>