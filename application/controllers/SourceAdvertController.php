<?php

class SourceAdvertController extends Controller {
    
    public function __construct() {
        $this->model = new SourceAdvertModel();
    }
    
    public function actionIndex() {
        $list = $this->model->select();
        include_once($this->template("sourceAdvert_index"));
    }
    
    public function actionInsert() {
        if (isset($_REQUEST["send_form"])) {
            $this->model->insert($_REQUEST);
            $this->redirect("SourceAdvert", "index");
        }
        include_once($this->template("sourceAdvert_insert"));
    }
    
    public function actionUpdate() {
        $item = $this->model->selectOne($_REQUEST["id"]);
        if (isset($_REQUEST["send_form"])) {
            $this->model->update($_REQUEST);
            $this->redirect("SourceAdvert", "index");
        }
        include_once($this->template("sourceAdvert_update"));
    }
    
    function actionDelete() {
        $this->model->delete($_REQUEST["id"]);
        $this->redirect("SourceAdvert", "index");
    }
    
}