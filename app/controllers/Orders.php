<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;

class Orders extends Controller
{
    //show dashboard
    public function Index()
    {
        $this->model('Order');
        $this->view('orders/index');
    }
}