<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DatabaseEntity;
use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");
require_once("app/core/DatabaseEntity.php");

class Order extends DatabaseEntity
{
    public $id;
    public $customer_id;
    public $purchase_date;
    public $device_info;
}