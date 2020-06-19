<?php

namespace SalesDashboard\Core;

/*
 * None of this works. Autoloader is needed when using variable names for classes as PHP assumes global scope
 *
 * use SalesDashboard\Controllers;
 * use SalesDashboard\Controllers\Home;
 *
 * use SalesDashboard\Models;
 * use SalesDashboard\Models\Customer;
 * use SalesDashboard\Models\Item;
 * use SalesDashboard\Models\Order;
*/
class App
{
    //defaults
    public const controllerQualifier = 'SalesDashboard\\Controllers\\';
    protected $controller = 'Home';

    public const modelQualifier = 'SalesDashboard\\Models\\';
    protected $method = 'index';
    protected $params = [];


    public function __construct()
    {
        $url = $this->parseUrl();

        if(file_exists('app/controllers/'.$url[0].'.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once 'app/controllers/'.$this->controller.'.php';

        $fullyQualifiedController = ($this::controllerQualifier.$this->controller);

        $this->controller = new $fullyQualifiedController;

        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        return explode('/', $url);
    }
}