<html>
<?php include(dirname(__FILE__).'/../default_head.php'); ?>
<body>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="/">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/customers">Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/orders">Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/items">Items</a>
    </li>
</ul>
<?php
if(isset($childView)){
    include($childView);
}
?>
</body>
</html>