<?php 
include('../connection.php');


//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the JSON data from the API endpoints
    $regionData = json_decode(file_get_contents('../ph-json/region.json'), true);
    $provinceData = json_decode(file_get_contents('../ph-json/province.json'), true);
    $cityData = json_decode(file_get_contents('../ph-json/city.json'), true);
    $barangayData = json_decode(file_get_contents('../ph-json/barangay.json'), true);

    // Get user input
    $gmail = $_POST["gmail"];
    $fullname = $_POST["fullname"];
    $phoneNumber = $_POST["phoneNumber"];   
    $user_acc_code = $_POST["user_acc_code"];
  
   
    $toggleSwitch2 = isset($_POST["toggleSwitch2"]) && $_POST["toggleSwitch2"] === "true" ? 1 : 0;

    if ($_POST["ConfirmButtonClicked"] == "ConfirmSelectAddress") {
        $streetDescription = $_POST["streetDescription"];
        $regionId = $_POST["region"];
        $provinceId = $_POST["province"];
        $cityId = $_POST["city"];
        $barangayId = $_POST["barangay"];

     
    


        // Find the names based on the selected IDs
        $region = getNameById($regionData['data'], $regionId, 'region_code', 'region_name');
        $province = getNameById($provinceData['data'], $provinceId, 'province_code', 'province_name');
        $city = getNameById($cityData['data'], $cityId, 'city_code', 'city_name');
        $barangay = getNameById($barangayData['data'], $barangayId, 'brgy_code', 'brgy_name');

        $completeAddress = $region . " " . $province . " " . $city . " " . $barangay ." ".$streetDescription;

    } elseif ($_POST["ConfirmButtonClicked"] == "ConfirmPinAddress") {
        $region = $_POST["RegionName"];
        $regionId = $_POST["region"];
        $completeAddress = $_POST["completeAddress"];
       
    }

    // Update user_address records if the toggle switch is on
    if ($toggleSwitch2 == 1) {
        $sqlUpdateAll = "UPDATE user_address SET user_active_status = '0' WHERE user_acc_code = ? AND id != ?";
        $stmtUpdateAll = $connections->prepare($sqlUpdateAll);
        $stmtUpdateAll->bind_param("si", $user_acc_code, $address_id);
        if (!$stmtUpdateAll->execute()) {
            echo "Error updating user_address records.";
        }
        $stmtUpdateAll->close();


        $sqlUpdateAllActive = "UPDATE user_address SET user_active_status = '0' WHERE id != ? AND user_acc_code = ?";
        $sqlUpdateAllActive = $connections->prepare($sqlUpdateAllActive);
        $sqlUpdateAllActive->bind_param("ii", $user_acc_code, $user_acc_code);
        if (!$sqlUpdateAllActive->execute()) {
            echo "Error updating user_address records.";
        }
        $sqlUpdateAllActive->close();


    }
if($toggleSwitch2==1){
    $sql = "INSERT INTO user_address (user_acc_code,
            user_address_code,
            user_complete_address,
            user_address_fullname,
            user_address_phone,
            user_address_email,
            user_active_status,
            user_add_display_status,
            user_add_Default_status)
            VALUES (?, ?, ?, ?, ?, ?,1,1, 1)";
}else{
    $sql = "INSERT INTO user_address (user_acc_code,
    user_address_code,
    user_complete_address,
    user_address_fullname,
    user_address_phone,
    user_address_email,
    user_active_status,
    user_add_display_status,
    user_add_Default_status)
            VALUES (?, ?, ?, ?, ?, ?,0,1, 0)";

}
    
    $stmt = $connections->prepare($sql);
    $stmt->bind_param("ssssss", $user_acc_code, $barangayId, $completeAddress, $fullname, $phoneNumber,$gmail);

    if ($stmt->execute()) {
        echo "success"; // This will be the response received by the AJAX request
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Function to get name by ID from JSON data
function getNameById($data, $id, $idKey, $nameKey) {
    foreach ($data as $item) {
        if ($item[$idKey] === $id) {
            return $item[$nameKey];
        }
    }
    return "";
}


?>
