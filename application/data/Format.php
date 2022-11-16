<?php

class Format {
    
    public static function dateFromMysqlToShort($date) {
        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        if ($dateTime) {
            return $dateTime->format('d.m.Y');
        } else {
            return "";
        }
    }
    
}