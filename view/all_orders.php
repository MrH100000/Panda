<?php require_once __DIR__ . '/partials/header.php'; ?>
<center>
    <h1>All Orders:</h1>
</center>
<div>
    <form action="all_orders.php" method="get">
        <strong>Search by:</strong>
        <select name="type" class="search-type">
            <option value="product"> Product ID </option>
            <option value="username"> Username </option>
        </select>
        <input type="text" class="search-field" name="query" placeholder="Enter Product ID or Username">
        <input type="submit" class="button middle" value="Search"></input>
    </form>    
    <br>
    <table class="cart-table">
        <tr>
            <th>OrderID</th>
            <th>Username</th>
            <th>Date Ordered</th>
            <th>Payment Type</th>
            <th>Address</th>
            <th>Shipping Cost</th>
            <th>Total</th>
            <th class="spacing">Remove</th>
        </tr>
        <?php foreach ($orderList as $order): ?>
        <tr>
            <td><?php echo $order["OrderID"]; ?></td>
            <td><?php echo $order["Username"]; ?></td>
            <td><?php echo $order["Date"]; ?></td>
            <td><?php echo $order["PaymentType"]; ?></td>
            <td><?php echo $order["Address"] . ", ". $order["City"] . ", ". $order["State"] . " ". $order["ZipCode"] . ", ". $order["Country"]; ?></td>
            <td><?php echo "$". number_format($order["ShippingCost"]); ?></td>
            <td><?php echo "$". number_format($order["Total"]); ?></td>
            <td><form action="all_orders.php" method="post">
                <input type="hidden" name="delete">
                <input type="hidden" name="id" value="<?php echo $order['OrderID']?>">
                <input class="button spacing" type="submit" value="Delete Item">
            </form></td>
        </tr>
        <?php endforeach ?>
    </table>
</div>

<?php require_once __DIR__ . '/partials/footer.php';?>