<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;

class Home extends Controller
{
    //show dashboard
    public function Index()
    {
        $this->model('RichOrderViewModel');
        $this->view('home/index');
    }
}