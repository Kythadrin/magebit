<?php

class Route
{
    public static function build() 
    {
        $controllerName = "IndexController";
        $modelName = "IndexModel";
        $action = "loadPage";

        $route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        $i = 0;

        for ($i = 0; $i < count($route); $i++) {
            if ($route[$i] != "") {
                $controllerName = ucfirst($route[1]. "Controller");
                $modelName = ucfirst($route[1]. "Model");
            }
        }
        
        try {
            if (!file_exists(CONTROLLER_PATH . $controllerName . ".php")) {
                throw new Exception ($controllerName . ' not exist');
            }
            if (!file_exists(MODEL_PATH . $modelName . ".php")) {
                throw new Exception ($modelName . ' not exist');
            }

            include CONTROLLER_PATH . $controllerName . ".php";
            include MODEL_PATH . $modelName . ".php";
        } catch (Exception $e) {
            include ROOT . "/404page.php";
            return 0;
        }

        if (isset($route[2]) && $route[2] != '') {
            $action = $route[2];
        }

        $controller = new $controllerName();
        $controller->$action();
    }
}