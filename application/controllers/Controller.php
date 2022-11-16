<?php

class Controller {
    
    protected $model;
    
    protected function template($name) {
        return "application/templates/" . $name . ".php";
    }
    
    protected function redirect($page, $action, $params = array()) {
        header("Location: " . Link::getUrl($page, $action, $params));
    }
    
}