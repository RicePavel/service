<?php

class Link {
    
    public static function getUrl(string $page = "", string $action = "", array $params = array()) {
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        $url .= "/service/index.php";
        
        if (!empty($page) && !empty($action)) {
            $url = $url . "?page=" . $page . "&action=" . $action;
            foreach ($params as $name => $value) {
                $url .= "&" . $name . "=" . $value;
            }
        }
        return $url;
    }
    
}