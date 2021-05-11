<?php

namespace MVC;

class Router{

    public $GETroutes = [];
    public $POSTroutes = [];

    public function get($url, $fn){
        $this->GETroutes[$url] = $fn;
    }
    public function post($url, $fn){
        $this->POSTroutes[$url] = $fn;
    }


    public function checkRoutes(){

        session_start();

        $auth = $_SESSION['login'] ?? null;

        $currentRoute = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        //Rutas protegidas
        $protected_url = ['/admin', '/property/create', '/property/update', '/property/delete', '/seller/create', '/seller//seller/update', '/seller/delete'];

        if($method === 'GET'){
            $fn = $this->GETroutes[$currentRoute] ?? null;
        } else {
            $fn = $this->POSTroutes[$currentRoute] ?? null;
        }

        //Proteger rutas
        if(in_array($currentRoute, $protected_url) && !$auth )
        {
            header('Location: /');
        }

        if($fn){
            call_user_func($fn, $this);
        } else {
            //Página 404
            header('Location: /admin');
        }

    }

    //Muestra una vista
    public function render($view, $dates = []){

        foreach ($dates as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }

}

?>