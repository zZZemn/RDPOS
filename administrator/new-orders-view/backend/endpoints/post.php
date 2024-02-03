<?php
include('../class.php');
$db = new global_class();

if (isset($_POST['requestType'])) {
    if ($_POST['requestType'] == 'UpgradeOrderStatus') {
        echo $db->changeOrderStatus($_POST['orderId']);
    } elseif ($_POST['requestType'] == 'RejectOrder') {
        echo $db->rejectOrder($_POST['orderId']);
    }
}
