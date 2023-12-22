<?php
// Include ang iyong database configuration file
include("../../../../connection.php");

$session_code = $_POST["session_code"];
$adminsPassword = $_POST["adminsPassword"];

// Gumawa ng query sa database
$query = "SELECT acc_password FROM account WHERE acc_code = '$session_code' AND acc_type = 'administrator'";

$result = mysqli_query($connections, $query); // $connection ay iyong database connection

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $adminPasswordFromDatabase = $row["acc_password"];
    
    if ($adminsPassword === $adminPasswordFromDatabase) {
        echo "match";
    } else {
        echo "no_match";
    }
} else {
    echo "no_match";
}

// Huwag kalimutang isara ang database connection pagkatapos ng query.
mysqli_close($connections);
?>
