<?php

class ClientController extends Controller {
    
    public function __construct() {
        $this->model = new ClientModel();
    }
    
    public function actionIndex() {
        $model = new ClientModel();
        $data = $model->select();
        
        $error = (isset($_SESSION['error'])) ? $_SESSION['error'] : '';    
        unset($_SESSION['error']);
        
        include_once($this->template("client_index"));
    }
    
    public function actionUpdate() {
        $id = $_REQUEST["id"];
        $row = $this->model->selectOne($id);
        if (isset($_REQUEST["send_form"])) {
            $ok = $this->model->update($_REQUEST);
            if ($ok) {
                $this->redirect("client", "show", ["id" => $id]);
            } else {
                $error = $this->model->getError();
            }            
        }
        
        $sourceModel = new SourceAdvertModel();
        $sourceList = $sourceModel->select();
        include_once($this->template("client_update"));
    }
    
    public function actionInsert() {
        if (isset($_REQUEST["send_form"])) {
            $ok = $this->model->insert($_REQUEST);
            if ($ok) {
                $id = $this->model->lastInsertId();
                $this->redirect("client", "show", ["id" => $id]);
            } else {
                $error = $this->model->getError(); 
            }
        }
        $sourceModel = new SourceAdvertModel();
        $sourceList = $sourceModel->select();
        include_once($this->template("client_insert"));
    }
    
    public function actionDelete() {
        $model = new ClientModel();        
        $ok = $model->delete($_REQUEST["id"]);
        if (!$ok) {
            $_SESSION['error'] = $model->getError();
        }
        $this->redirect("client", "index");
    }
    
    public function actionShow() {
        $client = $this->model->selectOne($_REQUEST['id']);
        $orderModel = new OrderModel();
        $orders = $orderModel->selectByClient($_REQUEST['id']);
        include_once($this->template("client_show"));
    }
    
    
}