<?php
session_start();

echo "<pre>";
print_r($_POST);
echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["address_id"])) {
    $address_id = $_POST["address_id"];
    $user_acc_code = $_POST["user_acc_code"];

    include "../../../connection.php";

    // Gawing "0" ang user_active_status para sa lahat ng record maliban sa nakuha na address_id at ibang user_acc_code
    $sqlUpdateAll = "UPDATE user_address SET user_active_status = '0' WHERE user_acc_code = ? AND id != ?";
    $stmtUpdateAll = $connections->prepare($sqlUpdateAll);
    $stmtUpdateAll->bind_param("si", $user_acc_code, $address_id);

    if ($stmtUpdateAll->execute()) {
        // I-update ang user_active_status para sa na-select na address_id
        $sqlUpdateSelected = "UPDATE user_address SET user_active_status = '1' WHERE id = ? AND user_acc_code = ?";
        $stmtUpdateSelected = $connections->prepare($sqlUpdateSelected);
        $stmtUpdateSelected->bind_param("is", $address_id, $user_acc_code);

        if ($stmtUpdateSelected->execute()) {
            echo $address_id;
        } else {
            echo "error";
        }

        $stmtUpdateSelected->close();
    } else {
        echo "error";
    }

    $stmtUpdateAll->close();
} else {
    echo "Invalid request.";
}
?>
