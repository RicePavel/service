<?php

class DeviceTypeModel extends Model {
    
    public function __construct() {
        $this->tableName = "device_type";
        $this->dataFieldsNames = array("name");
        $this->idFieldName = "id";
    }
    
    public function select() {
        return $this->_select($this->tableName, array("name"));
    }
    
    public function insert($request) {
        return $this->_insert($request, $this->tableName, $this->dataFieldsNames);
    }
    
    public function update($request) {
        return $this->_update($request, $this->tableName, $this->dataFieldsNames, $this->idFieldName);
    }
    
    public function selectOne($id) {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("select * from " . $this->tableName . " where id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        foreach ($stmt as $row) {
            return $row;
        }
        return array();
    }
    
    public function delete($id) {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("delete from " . $this->tableName . " where id = :id");
        $id = (int) $id;
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    
}