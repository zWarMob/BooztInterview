<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");

class RichOrderViewModel
{
    public static function get_all(){
        $query = "SELECT * FROM rich_order_view";

        $db_handle = new DBController();

        return $db_handle->runQuery($query);
    }
}