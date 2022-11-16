<?php

class ClientModel extends Model {
    
    public function __construct() {
        $this->tableName = "client";
        $this->dataFieldsNames = array("name", "surname", "middlename", "phone", "source_advert_id", "create_date");
        $this->idFieldName = "id";
    }
    
    public function select() {
        $pdo = $this->getPdo();
        $st = $pdo->query("Select c.*, sa.name source_advert_name 
                    from client c left join source_advert sa 
                    on c.source_advert_id = sa.id 
                    order by c.surname, c.name, c.middlename");
        $list = array();
        while ($row = $st->fetch()) {
            $list[] = $row;
        }
        return $list;
    }
    
    public function reportByAdvertSources(string $dateStart = "", string $dateEnd = "") : array {
        $sql = "select sa.name as advert_source_name, count(c.id) as client_count
                from client c left join source_advert sa on c.source_advert_id = sa.id";
        if (!empty($dateStart) || !empty($dateEnd)) {
            $sql .= " where 1=1 ";
        }
        if (!empty($dateStart)) {
            $sql .= " and c.create_date >= :date_start ";
        }
        if (!empty($dateEnd)) {
            $sql .= " and c.create_date <= :date_end ";
        }
        $sql .= " group by c.source_advert_id order by sa.name";
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
    
    public function selectOne($id) {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("Select c.*, 
                    sa.name source_advert_name
                    from client c left join source_advert sa
                    on c.source_advert_id = sa.id
                    where c.id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        foreach ($stmt as $row) {
           return $row; 
        }
        return array();
    }
      
    public function update(array $request) {
        if (empty($request['source_advert_id'])) {
            $request['source_advert_id'] = null;
        }
        if (!empty($request['phone'])) {
            if (!$this->validateRussianPhoneNumber($request['phone'])) {
                $this->error = "Неверно заполнено поле 'телефон'. Введите номер в формате +79001234567 ";
                return false;
            }
        }
        $fieldsNames = $this->dataFieldsNames;
        $fieldsNames = array_diff($fieldsNames, array('create_date'));
        $this->_update($request, $this->tableName, $fieldsNames, $this->idFieldName);
        return true;
    }
    
    public function insert(array $request) : bool {
        $request['create_date'] = date('Y-m-d H:i:s');
        if (empty($request['source_advert_id'])) {
            $request['source_advert_id'] = null;
        }
        
        if (!empty($request['phone'])) {
            if (!$this->validateRussianPhoneNumber($request['phone'])) {
                $this->error = "Неверно заполнено поле 'телефон'. Введите номер в формате +79001234567 ";
                return false;
            }
        }
        
        $this->_insert($request, $this->tableName, $this->dataFieldsNames);
        return true;
    }
    
    public function delete($id) : bool {
        $pdo = $this->getPdo();
        
        $countOrders = 0;
        $st = $pdo->prepare("Select count(*) count from orders where client_id = :id");
        $st->bindValue(":id", $id);
        $st->execute();
        while ($row = $st->fetch()) {
            $countOrders = $row['count'];
        }
        if ($countOrders == 0) {
            $stmt = $pdo->prepare("delete from client where id = :id");
            $id = (int) $id;
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            return true;
        } else {
            $this->error = "Этого клиента нельзя удалить, потому что у него есть заказы";
            return false;
        }
    }
    
}