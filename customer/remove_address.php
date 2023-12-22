<?php
include "../connection.php";


echo "<pre>";
print_r($_POST);
echo "</pre>";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Delacc_code = $_POST["Delacc_code"];
    $DelDefault_status = $_POST["DelDefault_status"];
    $user_address_id = $_POST["Deluser_address_id"];

    $removeToDisplay = "UPDATE user_address 
                        SET user_add_display_status = '0',
                        user_active_status = '0'
                        WHERE id = $user_address_id 
                        AND user_add_Default_status = '0'";

    $backtoDefault = "UPDATE user_address 
                      SET user_add_display_status = '1',
                      user_active_status = '1'
                      WHERE user_acc_code = '$Delacc_code' 
                      AND user_add_Default_status = '1'";

    // Execute the first query
    if (mysqli_query($connections, $removeToDisplay)) {
        // Execute the second query
        if (mysqli_query($connections, $backtoDefault)) {
            echo "success";
            exit();
        } else {
            echo "Failed to update user address (backtoDefault): " . mysqli_error($connections);
            exit();
        }
    } else {
        echo "Failed to update user address (removeToDisplay): " . mysqli_error($connections);
        exit();
    }
}


?>
