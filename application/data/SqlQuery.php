<?php

class SqlQuery {
    
    public static function getSelect(string $tableName, array $orderFields = array()) {
        $str = "select * from " . $tableName;
        if (!empty($orderFields)) {
            $str .= " order by ";
            for ($i = 0; $i < count($orderFields); $i++) {
                if ($i > 0) {
                    $str .= ", ";
                }
                $str .= $orderFields[$i];
            }
        }
        return $str;
    }
    
    public static function getInsert(string $tableName, array $fieldsNames) {
        $sql = "insert into " . $tableName . " (";
        $i = 0;
        foreach ($fieldsNames as $field) {
            if ($i > 0) {
                $sql .= ",";
            }
            $sql .= $field;
            $i++;
        }
        $sql .= ") VALUES (";
        $i = 0;
        foreach ($fieldsNames as $field) {
            if ($i > 0) {
                $sql .= ",";
            }
            $sql .= ":" . $field;
            $i++;
        }
        $sql .= ")";
        return $sql;
    }
    
    public static function getUpdate(string $tableName, array $fieldsNames, string $idFieldName) {
        $sql = "update " . $tableName . " set ";
        $i = 0;
        foreach ($fieldsNames as $field) {
            if ($i > 0) {
                $sql .= ",";
            }
            $sql .= $field . " = :" . $field;
            $i++;
        }
        $sql .= " where " . $idFieldName . " = :" . $idFieldName;
        return $sql;
    }
    
}