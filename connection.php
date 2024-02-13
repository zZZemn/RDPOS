<?php
// $connections = mysqli_connect ("localhost:8888","root","root","u722452653_rdpos");
//$connections = mysqli_connect ("localhost","u722452653_rdpos","Rdpos12345678","u722452653_rdpos");


$dbhost='localhost:8889';
$dbuser ='root';
$dbpassword ='root';
$dbdatabase= 'u722452653_rdpos';

$connections = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);

// Check connection
if($connections === false){
    die("ERROR: Could not connect. " . $connections->connect_error);
}

// Print host information
// echo "Connect Successfully. Host info: " . $connections->host_info;
?>