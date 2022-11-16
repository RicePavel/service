<?php

class Route {
    
    static function start() {
        $controllerName = "clientController";
        $actionName = "actionIndex";
        
        if (!empty($_REQUEST["page"])) {
            $controllerName = ucfirst($_REQUEST["page"]) . "Controller";
        }
        if (!empty($_REQUEST["action"])) {
            $actionName = "action" . ucfirst($_REQUEST["action"]);
        }


        $controller = new $controllerName();
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            echo "404 Not Found";
        }
        
    }
    
}