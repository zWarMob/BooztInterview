<?php

class Home extends Controller
{
    //show dashboard
    public function Index()
    {
        $customer = $this->model('Customer');

        $this->view('home/index');
    }
}