<?php

abstract class Model {
    
    protected $tableName = "";
    protected $dataFieldsNames = array();
    protected $idFieldName = "";
    
    protected $error = "";
    
    protected $lastInsertId= "";
    
    public function getError() : string {
        return $this->error;
    }
    
    public function lastInsertId() : string {
        return $this->lastInsertId;
    }
    
    protected function getPdo() {
        $pdo = new PDO("mysql:host=localhost;dbname=service", "service", "_fm*08UOVbkdGeVi");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    
    protected function arrayByStatement(PDOStatement $stmt) : array {
        $list = array();
        while ($row = $stmt->fetch()) {
            $list[] = $row;
        }
        return $list;
    }
    
    protected function _select(string $tableName, array $orderFields = array()) {
        $pdo = $this->getPdo();
        $st = $pdo->query(SqlQuery::getSelect($tableName, $orderFields));
        return $this->arrayByStatement($st);
    }
    
    protected function _insert(array $request, string $tableName, array $fieldsNames) : void {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare(SqlQuery::getInsert($tableName, $fieldsNames));
        foreach ($fieldsNames as $field) {
            $stmt->bindValue(":" . $field, $request[$field]);
        }
        $stmt->execute();
        $this->lastInsertId = $pdo->lastInsertId();
    }
    
    protected function _update(array $request, string $tableName, array $fieldsNames, string $idFieldName) : void {
        $pdo = $this->getPdo();
        $sql = SqlQuery::getUpdate($tableName, $fieldsNames, $idFieldName);        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":" . $idFieldName, $request[$idFieldName]);
        foreach ($fieldsNames as $field) {
            $stmt->bindValue(":" . $field, $request[$field]);
        }
        $stmt->execute();
    }
    
    protected function validateRussianPhoneNumber($tel)
    {
        $tel = trim((string)$tel);
        if (!$tel) return false;
        $tel = preg_replace('#[^0-9+]+#uis', '', $tel);
        if (!preg_match('#^(?:\\+?7|8|)(.*?)$#uis', $tel, $m)) return false;
        $tel = '+7' . preg_replace('#[^0-9]+#uis', '', $m[1]);
        if (!preg_match('#^\\+7[0-9]{10}$#uis', $tel, $m)) return false;
        return true;
    }
    
    protected function validatePositiveNumber($val) {
        return (($val = intval($val)) && ($val >= 0));
    }
    
   
    
}