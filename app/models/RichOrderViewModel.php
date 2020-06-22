<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DatabaseEntity;
use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");
require_once("app/core/DatabaseEntity.php");

class RichOrderViewModel extends DatabaseEntity
{
    public static function get_all(){
        $query = "SELECT * FROM rich_order_view";

        $db_handle = new DBController();

        return $db_handle->runBaseQuery($query);
    }

    public static function query($dateFrom, $dateTo){
        //'2020-06-20' as date format
        $query = "SELECT * FROM `rich_order_view` WHERE `purchase_date` BETWEEN CAST( ? AS DATE) AND CAST( ? AS DATE)";
        $paramType = "ss";
        $paramValue = array(
            $dateFrom,
            $dateTo
        );

        $db_handle = new DBController();

        return $db_handle->runQuery($query, $paramType, $paramValue);
    }
}