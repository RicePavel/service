<?php

class OrderController extends Controller  {
    
    public function __construct() {
        $this->model = new OrderModel();
    }
    
    public function actionIndex() {
        $model = new OrderModel();
        $data = $model->select();
        foreach ($data as &$row) {
            $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $row['create_date']);
            if ($dateTime) {
                $row['create_date'] = $dateTime->format('d.m.Y');
            }
        }
        include_once($this->template("order_index"));
    }
    
    public function actionInsert() {
        if (isset($_REQUEST["send_form"])) {
            $ok = $this->model->insert($_REQUEST);
            if ($ok) {
                $id = $this->model->lastInsertId();
                $this->redirect("order", "show", ["id" => $id]);
            } else {
                $error = $this->model->getError();
            }
        }
        
        $clientModel = new ClientModel();
        $clients = $clientModel->select();
        
        $deviceTypeModel = new DeviceTypeModel();
        $deviceTypes = $deviceTypeModel->select();
        
        $statuses = $this->model->getStatuses();
        
        include_once($this->template("order_insert"));
    }
    
    public function actionUpdate() {
        $id = $_REQUEST["id"];
        $order = $this->model->selectOne($id);
        if (isset($_REQUEST["send_form"])) {
            $ok = $this->model->update($_REQUEST);
            if ($ok) {
                $this->redirect("order", "show", ["id" => $id]);
            } else {
                $error = $this->model->getError();
            }
        }
        $clientModel = new ClientModel();
        $clients = $clientModel->select();
        
        $deviceTypeModel = new DeviceTypeModel();
        $deviceTypes = $deviceTypeModel->select();
        
        $statuses = $this->model->getStatuses();
        include_once($this->template("order_update"));
    }
    
    
    public function actionDelete() {
        $ok = $this->model->delete($_REQUEST["id"]);
        $this->redirect("order", "index");
    }
    
    public function actionShow() {
        $order = $this->model->selectOne($_REQUEST["id"]);
        include_once($this->template("order_show"));
    }
    
}