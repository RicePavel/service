<?php

class Form {
    
    public static function routeInputs($page, $action) {
        $str = "<input type='hidden' name='page' value='" . $page . "' />";
        $str .= "<input type='hidden' name='action' value='" . $action . "' />";
        return $str;
    }
    
}