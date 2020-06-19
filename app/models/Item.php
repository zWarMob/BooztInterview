<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");

class Item
{
    public $id;
    public $name;
    public $EAN;
    public $quantity;
    public $price;

    public static function get_all(){
        $query = "SELECT * FROM items";

        $db_handle = new DBController();

        return $db_handle->runQuery($query);
    }
}