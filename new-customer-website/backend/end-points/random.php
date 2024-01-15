<?php
include('../class.php');
$db = new global_class();
session_start();
$userId = $_SESSION['acc_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['requestType'])) {
        if ($_GET['requestType'] == 'GetPaymentTypes') {
            $paymentTypes = $db->getPaymentTypes();
            if ($paymentTypes->num_rows > 0) {
                $paymentTypesArray = [];
                while ($payment = $paymentTypes->fetch_assoc()) {
                    $data = [
                        'payment_id' => $payment['payment_id'],
                        'payment_code' => $payment['payment_code'],
                        'payment_name' => $payment['payment_name'],
                        'payment_number' => $payment['payment_number'],
                        'payment_image' => $payment['payment_image']
                    ];
                    $paymentTypesArray[] = $data;
                }

                echo json_encode($paymentTypesArray);
            }
        } else {
            echo 'Else';
        }
    } else {
        echo 'Access Denied! No Request Type.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
