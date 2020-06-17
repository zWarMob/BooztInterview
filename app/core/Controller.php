<?php

namespace SalesDashboard\Core;

//use SalesDashboard\Models;
use SalesDashboard\Core;

class Controller
{
    public function model($model)
    {
        require_once  'app/models/'.$model.'.php';
        $fullyQualifiedModel = App::modelQualifier.$model;
        return new $fullyQualifiedModel();
    }

    public function view($view, $data = [])
    {
        require_once 'app/views/'.$view.'.php';
    }
}