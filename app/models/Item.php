<?php

namespace SalesDashboard\Models;

use SalesDashboard\Core\DatabaseEntity;
use SalesDashboard\Core\DBController;

require_once("app/core/DBController.php");
require_once("app/core/DatabaseEntity.php");

class Item extends DatabaseEntity
{
    public $id;
    public $name;
    public $EAN;
    public $quantity;
    public $price;
}