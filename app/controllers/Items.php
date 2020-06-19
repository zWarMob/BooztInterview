<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;

class Items extends Controller
{
    //show dashboard
    public function Index()
    {
        $this->model('Item');
        $this->view('items/index');
    }
}