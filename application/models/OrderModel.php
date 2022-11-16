<?php

class OrderModel extends Model {
    
    public function __construct() {
        $this->tableName = "orders";
        $this->dataFieldsNames = ["device_type_id", "client_id", "device", "comment", "price", "payment", "status", "create_date"];
        $this->idFieldName = "id";
    }
    
    private $statuses = array(
        "NEW" => "Новый", 
        "DIAGNOSTIC" => "Диагностика", 
        "AGREEMENT" => "На согласовании",  
        "IN_WORK" => "В работе", 
        "READY" => "Готов", 
        "CLOSE" => "Закрыт");
    
    public function getStatuses() : array {
        return $this->statuses;
    }
    
    public function select() {
        $pdo = $this->getPdo();
        $st = $pdo->query("Select o.*, 
                            c.name client_name, c.surname client_surname, c.middlename client_middlename,
                            dt.name device_type_name
                            from orders o left join client c on o.client_id = c.id
                            left join device_type dt on o.device_type_id = dt.id 
                            order by o.id desc ");
        $orders = $this->arrayByStatement($st);
        foreach ($orders as &$order) {
            if (array_key_exists($order['status'], $this->statuses)) {
                $order['status_name'] = $this->statuses[$order['status']];
            } else {
                $order['status_name'] = "";
            }
        }
        return  $orders;
    }
    
    public function selectByClient($clientId) {
              return $this->_selectNew($clientId);  
    }
    
    private function _selectNew($clientId = "") {
        $pdo = $this->getPdo();
        $sql = "Select o.*,
                            c.name client_name, c.surname client_surname, c.middlename client_middlename,
                            dt.name device_type_name
                            from orders o left join client c on o.client_id = c.id
                            left join device_type dt on o.device_type_id = dt.id ";
        if (!empty($clientId)) {
            $sql .= " where o.client_id = :client_id ";
        }
        $sql .= " order by o.id desc ";
        $st = $pdo->prepare($sql);   
        if (!empty($clientId)) {
            $st->bindValue(":client_id", $clientId);
        }
        $st->execute();    
        $orders = $this->arrayByStatement($st);
        foreach ($orders as &$order) {
            if (array_key_exists($order['status'], $this->statuses)) {
                $order['status_name'] = $this->statuses[$order['status']];
            } else {
                $order['status_name'] = "";
            }
        }
        return  $orders;
    }
    
    public function insert($request) : bool {
        $request['create_date'] = date('Y-m-d H:i:s');
        $request = $this->prepareRequestBeforeSave($request);
        $valid = $this->validateRequest($request);
        if (!$valid) {
            return false;
        }
        $this->_insert($request, $this->tableName, $this->dataFieldsNames);
        return true;
    }
    
    public function update($request) : bool {
        $request = $this->prepareRequestBeforeSave($request);
        $valid = $this->validateRequest($request);
        if (!$valid) {
            return false;
        }
        $fieldsNames = $this->dataFieldsNames;
        $fieldsNames = array_diff($fieldsNames, array('create_date'));
        $this->_update($request, $this->tableName, $fieldsNames, $this->idFieldName);
        return true;
    }
    
    public function selectOne($id) {
        $pdo = $this->getPdo();
        $st = $pdo->prepare("Select o.id, o.device_type_id, o.client_id, o.device, o.comment, o.price, o.payment, o.status, o.create_date,
                            c.name client_name, c.surname client_surname, c.middlename client_middlename,
                            dt.name device_type_name
                            from orders o left join client c on o.client_id = c.id
                            left join device_type dt on o.device_type_id = dt.id
                            where o.id = :id ");
        $st->bindValue(":id", $id);
        $st->execute();
        $order = array();
        foreach ($st as $row) {
            $order =  $row;
        }
        if (array_key_exists($order['status'], $this->statuses)) {
            $order['status_name'] = $this->statuses[$order['status']];
        } else {
            $order['status_name'] = "";
        }
        return $order;
    }
    
    public function delete($id) {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("delete from " . $this->tableName . " where id = :id");
        $id = (int) $id;
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
    
    public function reportByDevideTypes(string $dateStart = "", string $dateEnd = "") : array {
        $sql = "select dt.name as device_type_name, count(o.id) as count_orders, sum(o.price) as sum_price, sum(o.payment) as sum_payment 
                from orders o left join device_type dt on o.device_type_id = dt.id";
        if (!empty($dateStart) || !empty($dateEnd)) {
            $sql .= " where 1=1 ";
        }
        if (!empty($dateStart)) {
            $sql .= " and create_date >= :date_start ";
        }
        if (!empty($dateEnd)) {
            $sql .= " and create_date <= :date_end ";
        }
        $sql .= " group by o.device_type_id ";
        $pdo = $this->getPdo();
        $st = $pdo->prepare($sql);
        if (!empty($dateStart)) {
            $st->bindValue(":date_start", $dateStart);
        }
        if (!empty($dateEnd)) {
            $st->bindValue(":date_end", $dateEnd);
        }
        $st->execute();
        return $this->arrayByStatement($st);
    }
    
    private function prepareRequestBeforeSave(array $request) : array {
        if (empty($request['price'])) {
            $request['price'] = 0;
        }
        if (empty($request['payment'])) {
            $request['payment'] = 0;
        }
        if (empty($request['device_type_id'])) {
            $request['device_type_id'] = null;
        }
        return $request;
    }
    
    private function validateRequest($request) : bool {
        if (empty($request['client_id'])) {
            $this->error = 'Не заполнено обязательно поле "клиент". Выберите клиента из списка';
            return false;
        }
        if (!empty($request['price'])) {
            if (!$this->validatePositiveNumber($request['price'])) {
                $this->error = 'Неверное значение в поле "цена". Введите положительное число';
                return false;
            }
        }
        if (!empty($request['payment'])) {
            if (!$this->validatePositiveNumber($request['payment'])) {
                $this->error = 'Неверное значение в поле "внесенная оплата". Введите положительное число';
                return false;
            }
        }
        return true;
    }
    
}