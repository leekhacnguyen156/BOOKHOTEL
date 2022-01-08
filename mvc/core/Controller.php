<?php
class Controller{
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($folder, $view, $data=[]){
        require_once "./mvc/views/".$folder.'/'.$view.".php";
    }
    
    public function setModel($modelName, $variable = null)
    {
        $path = "./mvc/models/".$modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $variable = new $modelName();
        }
        return $variable;
    }
    
    public function Alert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
}
?>