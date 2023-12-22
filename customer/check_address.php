<?php
include "../connection.php";
include("backend/session.php");





$query = "SELECT * FROM tbl_address WHERE address_code = '$address_code'";
$result = mysqli_query($connections, $query);

if (mysqli_num_rows($result) > 0) {
    if ($address_status == "1") {
        echo '1'; // Place Order is available
    } else {
        echo '0'; // Cannot deliver in this barangay
    }
} else {
    echo "3";
}

?>
