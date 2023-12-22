<?php
// Connect to your database
include("../../../connection.php");

if (!$connections) {
    die("Database connection failed: " . mysqli_connect_error());
}

$account_id = $_GET["account_id"];
$enteredPassword = $_GET['Oldpassword'];

// Hash the entered password using SHA-256
$hashedEnteredPassword = hash('sha256', $enteredPassword);

$query = "SELECT COUNT(*) FROM account WHERE acc_id = ? AND acc_password = ?";
$stmt = mysqli_prepare($connections, $query);

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, "is", $account_id, $hashedEnteredPassword);
mysqli_stmt_execute($stmt);

// Bind the result variable
mysqli_stmt_bind_result($stmt, $count);

// Fetch the result
mysqli_stmt_fetch($stmt);

// Check the count
if ($count > 0) {
    echo '';
} else {
    echo 'Enter Correct Password';
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connections);
?>
