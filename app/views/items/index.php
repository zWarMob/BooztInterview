<?php
include('default_layout.php');
$items = \SalesDashboard\Models\Item::get_all();
?>

<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Email</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody><?php
    foreach ($items as $k => $v) { ?>

        <tr>
            <th scope="row"><?php echo $items[$k]["id"]; ?></th>
            <td><?php echo $items[$k]["name"]; ?></td>
            <td><?php echo $items[$k]["EAN"]; ?></td>
            <td><?php echo $items[$k]["quantity"]; ?></td>
            <td><?php echo $items[$k]["price"]; ?></td>
            <td><span class="material-icons">edit</span></td>
            <td><span class="material-icons">delete_outline</span></td>
        </tr>
    <?php } ?>
    </tbody>
</table>


