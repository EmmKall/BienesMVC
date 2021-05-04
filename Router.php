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
        $currentRoute = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method === 'GET'){
            $fn = $this->GETroutes[$currentRoute] ?? null;
        } else {
            $fn = $this->POSTroutes[$currentRoute] ?? null;
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