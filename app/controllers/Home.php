<?php

namespace SalesDashboard\Controllers;

use SalesDashboard\Core\Controller;
use SalesDashboard\Models\RichOrderViewModel;

class Home extends Controller
{
    //show dashboard
    public function Index()
    {
        $this->model('RichOrderViewModel');
        $this->view('home/index');
    }

    public function QueryRichOrderView()
    {
        $this->model('RichOrderViewModel');

        http_response_code(200);

        echo json_encode(RichOrderViewModel::query($_GET['from'],$_GET['to']));
    }
}