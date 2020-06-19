<?php
include('default_layout.php');
$customers = \SalesDashboard\Models\Customer::get_all();
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
    foreach ($customers as $k => $v) { ?>

        <tr>
            <th scope="row"><?php echo $customers[$k]["id"] ?></th>
            <td><?php echo $customers[$k]["first_name"]; ?></td>
            <td><?php echo $customers[$k]["last_name"]; ?></td>
            <td><?php echo $customers[$k]["email"]; ?></td>
            <td><span class="material-icons">edit</span></td>
            <td><span class="material-icons">delete_outline</span></td>
        </tr>
    <?php } ?>
    </tbody>
</table>


