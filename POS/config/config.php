<?php
$connections = mysqli_connect ("localhost:8889","root","root","u722452653_rdpos");
//$connections = mysqli_connect ("localhost","u722452653_rdpos","Rdpos12345678","u722452653_rdpos");
?>

<?php
// Database credentials
$hostname = 'localhost:8889';      // Change this to your database hostname
 $username = 'root';   // Change this to your database username
$password = 'root';   // Change this to your database password
$database = 'u722452653_rdpos';   // Change this to your database name


//$hostname = 'localhost';      // Change this to your database hostname
//$username = 'u722452653_rdpos';   // Change this to your database username
//$password = 'Rdpos12345678';   // Change this to your database password
//$database = 'u722452653_rdpos';   // Change this to your database name

// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}


?>