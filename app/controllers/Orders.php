<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;

class Orders extends Controller
{
    //show dashboard
    public function Index()
    {
        $order = $this->model('Order');

        $this->view('orders/index');
    }
}