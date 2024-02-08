<?php
include('components/header.php');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page != 'Ready For Delivery' && $page != 'Shipped' && $page != 'Delivered') {
        header('Location: index.php?page=Ready For Delivery');
        exit;
    }
} else {
    header('Location: index.php?page=Ready For Delivery');
    exit;
}
?>
<h5>Hello, <?= $user['acc_fname'] . ' ' . $user['acc_lname'] ?>!</h5>
<ul class="nav nav-tabs remove-when-767px-sc-width">
    <li class="nav-item">
        <a class="nav-link <?= ($page == 'Ready For Delivery') ? 'active' : '' ?>" href="index.php?page=Ready For Delivery"><i class="bi bi-box-fill"></i> Ready To Pick Up</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($page == 'Shipped') ? 'active' : '' ?>" href="index.php?page=Shipped"><i class="bi bi-truck"></i> Shipped</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($page == 'Delivered') ? 'active' : '' ?>" href="index.php?page=Delivered"><i class="bi bi-check-square"></i> Delivered</a>
    </li>
</ul>

<div class="orders-container">
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Subtotal</th>
                <th>VAT</th>
                <th>Shipping Fee</th>
                <th>Total</th>
                <th>Order Date</th>
                <?= ($page == 'Delivered') ? '<th>Delivery Date</th>' : '' ?>
            </tr>
        </thead>
        <tbody id="OrdersContainer">

        </tbody>
    </table>
</div>
<?php
include('components/footer.php');
?>