<?php
include('default_layout.php');
$orders = \SalesDashboard\Models\Order::get_all();
?>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Customer</th>
        <th scope="col">Date</th>
        <th scope="col">Device</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody><?php
    foreach ($orders as $k => $v) { ?>

        <tr>
            <th scope="row"><?php echo $orders[$k]["id"] ?></th>
            <td><?php echo $orders[$k]["customer_id"]; ?></td>
            <td><?php echo $orders[$k]["purchase_date"]; ?></td>
            <td><?php echo $orders[$k]["device_info"]; ?></td>
            <td><span class="material-icons">edit</span></td>
            <td><span class="material-icons">delete_outline</span></td>
        </tr>
    <?php } ?>
    </tbody>
</table>


