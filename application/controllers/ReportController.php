<?php

class ReportController extends Controller {
    
    public function actionIndex() {
        include_once($this->template("report_index"));
    }
    
    public function actionByDeviceTypes() {
        $orderModel = new OrderModel();
        $dateStartString = "";
        $dateEndString = "";
        $dateStartObject = DateTime::createFromFormat('Y-m-d', $_REQUEST['date_start']);
        if ($dateStartObject) {
            $dateStartObject = $dateStartObject->setTime(0, 0, 0);
            $dateStartString = $dateStartObject->format('Y-m-d H:i:s');
        }
        $dateEndObject = DateTime::createFromFormat('Y-m-d', $_REQUEST['date_end']);
        if ($dateEndObject) {
            $dateEndObject = $dateEndObject->setTime(23, 59, 59);
            $dateEndString = $dateEndObject->format('Y-m-d H:i:s');
        }
        $data = $orderModel->reportByDevideTypes($dateStartString, $dateEndString);
        include_once($this->template("report_by_device_types"));
    }
    
    public function actionByAdvertSources() {
        $clientModel = new ClientModel();
        $dateStartString = "";
        $dateEndString = "";
        $dateStartObject = DateTime::createFromFormat('Y-m-d', $_REQUEST['date_start']);
        if ($dateStartObject) {
            $dateStartObject = $dateStartObject->setTime(0, 0, 0);
            $dateStartString = $dateStartObject->format('Y-m-d H:i:s');
        }
        $dateEndObject = DateTime::createFromFormat('Y-m-d', $_REQUEST['date_end']);
        if ($dateEndObject) {
            $dateEndObject = $dateEndObject->setTime(23, 59, 59);
            $dateEndString = $dateEndObject->format('Y-m-d H:i:s');
        }
        $data = $clientModel->reportByAdvertSources($dateStartString, $dateEndString);
        include_once($this->template("report_by_advert_sources"));
    }
    
}