<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");

class Order
{
    public $id;
    public $customer_id;
    public $purchase_date;
    public $device_info;

    public static function get_all(){
        $query = "SELECT * FROM orders";

        $db_handle = new DBController();

        return $db_handle->runBaseQuery($query);
    }
}