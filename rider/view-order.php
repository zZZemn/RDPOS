<?php
include('components/header.php');
if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
    $checkOrderId = $db->getOrderUsingOrderId($user['acc_id'], $orderId);
    if ($checkOrderId->num_rows > 0) {
        $order = $checkOrderId->fetch_assoc();
    } else {
        header('Location: index.php?page=Ready For Delivery');
        exit;
    }
} else {
    header('Location: index.php?page=Ready For Delivery');
    exit;
}
?>
<?php
include('components/footer.php');
?>