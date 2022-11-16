<?php

class DeviceTypeController extends Controller {
    
    public function __construct() {
        $this->model = new DeviceTypeModel();
    }
    
    public function actionIndex() {
        $list = $this->model->select();
        include_once($this->template("deviceType_index"));
    }
    
    public function actionInsert() {
        if (isset($_REQUEST["send_form"])) {
            $this->model->insert($_REQUEST);
            $this->redirect("DeviceType", "index");
        }
        include_once($this->template("deviceType_insert"));
    }
    
    public function actionUpdate() {
        $item = $this->model->selectOne($_REQUEST["id"]);
        if (isset($_REQUEST["send_form"])) {
            $this->model->update($_REQUEST);
            $this->redirect("DeviceType", "index");
        }
        include_once($this->template("deviceType_update"));
    }
    
    function actionDelete() {
        $this->model->delete($_REQUEST["id"]);
        $this->redirect("DeviceType", "index");
    }
    
}