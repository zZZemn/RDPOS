<?php
session_start();



if (isset($_SESSION["acc_id"])) {   
    include("../connection.php");
    $acc_id = $_SESSION["acc_id"];
    $fullname = "";
    
  

$stmt = $connections->prepare("SELECT * FROM account 
LEFT JOIN user_address ON account.acc_code = user_address.user_acc_code 
LEFT JOIN tbl_address ON tbl_address.address_code = user_address.user_address_code 
WHERE account.acc_id = ? 
AND user_address.user_active_status  = '1' ");



    
    // Bind the parameter value
    $stmt->bind_param("s", $acc_id);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $db_acc_id = $row["acc_id"];
        $db_acc_code = $row["acc_code"];
        $db_acc_fname = $row["acc_fname"];
        $db_acc_lname = $row["acc_lname"];
        
        
        $fullname = ucfirst($db_acc_fname) . " " . $db_acc_lname;

        $db_emp_image = $row["emp_image"];
        $db_acc_contact = $row["acc_contact"];
    
        $db_acc_username = $row["acc_username"];
        $db_acc_password = $row["acc_password"];
        $db_acc_username = $row["acc_username"];
        $db_acc_type = $row["acc_type"];
        $db_acc_email = $row["acc_email"];


        
        $user_acc_code = $row["user_acc_code"];
    
        $user_address_id  = $row["id"];
        $address_code  = $row["address_code"];
        
        $address_rate  = $row["address_rate"];
        $address_status  = $row["address_status"];

        $user_complete_address = $row["user_complete_address"];
        $session_address_status	 = $row["address_status"];
        $session_address_cod	 = $row["address_cod"];
        $session_address_paynow	 = $row["address_paynow"];
        
        

        $user_address_fullname = $row["user_address_fullname"];
        $user_address_email = $row["user_address_email"];
        $user_address_phone = $row["user_address_phone"];


        
       
        $user_add_display_status = $row["user_add_display_status"];
        $user_add_Default_status = $row["user_add_Default_status"];

     


        
    } else {
		
        // Handle the case where no record is found
		// Redirect to customer
		date_default_timezone_set('Asia/Manila');
		$currentDateTime = date('Y-m-d g:i A');

		mysqli_query($connections, "UPDATE system_log SET sys_logout = '$currentDateTime' where sys_user_id ='$acc_id'");



    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    echo "<script>window.location.href='../Main/login.php';</script>";
}
?>
