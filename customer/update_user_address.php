<?php
include "../connection.php";


echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   
        // Retrieve the form 


        $fullname = $_POST["fullname"];
        
        $EditphoneNumber = $_POST["EditphoneNumber"];
        $gmail = $_POST["email"];

        
        $EditstreetDescript=$_POST["EditstreetDescript"];

        $isDefault=$_POST["isDefault"];

        $region_code = $_POST["region_code"];
       
        
        $province_code = $_POST["province_code"];
        
        $city_code = $_POST["city_code"];
        $brgy_code = $_POST["brgy_code"];
        
        $userAccCode=$_POST["user_acc_code"];
  
        $complete_address = $_POST["complete_address"];

        $user_address_id = $_POST["user_address_id"];
      
        //user_address_id
      

      



if($isDefault==true){


       $get_user_address_record = mysqli_query ($connections,"SELECT * FROM user_address where user_acc_code='$userAccCode' ");
		$row = mysqli_fetch_assoc($get_user_address_record);



     // Handle the condition outside the SQL query


// Construct the SQL query
$query = "UPDATE user_address 
          SET 
            user_address_fullname = '$fullname',
            user_address_phone = '$EditphoneNumber',
            user_address_email = '$gmail',
            user_address_code = '$brgy_code',
            user_complete_address = '$complete_address $EditstreetDescript',
            user_add_Default_status = '1'
          WHERE user_acc_code = '$userAccCode' AND id = $user_address_id";


$setZeroAllDefault = "UPDATE user_address 
SET user_add_Default_status = '0' 
WHERE user_acc_code = '$userAccCode' AND id != $user_address_id";

mysqli_query($connections, $setZeroAllDefault);

        

}else{
      // Construct the SQL 	
      $query = "UPDATE user_address 
          SET user_address_fullname = '$fullname',
              user_address_phone = '$EditphoneNumber',
              user_address_email = '$gmail',
              user_acc_code = '$userAccCode',
              user_address_code = '$brgy_code',
              user_complete_address = '$complete_address $EditstreetDescript',
              user_add_Default_status = '0'
          WHERE user_acc_code = '$userAccCode' AND id = $user_address_id";


}

        
        if (mysqli_query($connections, $query)) {
            
            echo "success";
            exit();
        } else {
           
            echo "Failed to update user address: " . mysqli_error($connections);
            exit();
        }
   
}
?>
