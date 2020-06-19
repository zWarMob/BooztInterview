<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;

class Customers extends Controller
{
    //show dashboard
    public function Index()
    {
        $this->model('Customer');
        $this->view('customers/index');
    }
}