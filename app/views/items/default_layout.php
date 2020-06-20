<html>
<?php include(dirname(__FILE__).'/../default_head.php'); ?>
<body class="p-3">
<nav class="mb-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/customers">Customers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/orders">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/items">Items</a>
        </li>
    </ul>
</nav>
<?php
if(isset($childView)){
    include($childView);
}
?>
</body>
</html>