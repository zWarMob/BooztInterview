<?php


namespace SalesDashboard\Core;

use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");


abstract class DatabaseEntity
{
    protected static $extendedClass;

    function __construct()
    {
        self::$extendedClass = get_class($this);
    }

    public static function get_all()
    {
        $query = "SELECT * FROM " . strtolower(basename(self::$extendedClass)) . "s";

        $db_handle = new DBController();

        return $db_handle->runBaseQuery($query);
        //return(self::$extendedClass);
    }
}