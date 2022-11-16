<?php

class View {
    
    /*
    public function getRender($templateName, $data = array()) {
        include_once("application/templates/" . $templateName);
    }
    */
    
    public static function errorMessage($error) {
        $str = "";
        if ($error) {
	       $str = "<div>" . $error . "</div><br/>";
        }
        return $str;
    }
    
    
    
}