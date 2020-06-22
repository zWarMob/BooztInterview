<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DatabaseEntity;
use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");
require_once("app/core/DatabaseEntity.php");

class Customer extends DatabaseEntity
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;

    public static function create($first_name, $last_name, $email){
        $query = "INSERT INTO customers (first_name, last_name, email) VALUES (?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $first_name,
            $last_name,
            $email
        );

        $db_handle = new DBController();

        return $db_handle->insert($query, $paramType, $paramValue);
    }

}