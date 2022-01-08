<?php
class App{
    protected $controller="cError";
    protected $action="v404";
    protected $params=[];

    function __construct(){
        $arr = $this->Urlprocess();
        if($arr){
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
            }
        }
        //neu gõ controller k có trong thư mục controller thì mặc định là home.
        require_once "./mvc/controllers/".$this->controller.".php";
        $this->controller = new $this->controller;
        
        if(isset($arr[1])){
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }

        $this->params = $arr?array_values($arr):[];
        call_user_func_array([new $this->controller, $this->action], $this->params);
    }

    function Urlprocess(){
        if(isset($_GET["url"])){
            return explode("/", filter_var(trim($_GET["url"], "/" )));
        }
    }
}
?>