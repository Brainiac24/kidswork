<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fFraud_attr extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("action" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id = array("validation" => array("id_fraud" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $id_divisions = array("validation" => array("id_divisions" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_2 = array("validation" => array("id_divisions_2" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_business_line = array("validation" => array("id_business_line" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_risk_category = array("validation" => array("id_risk_category" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_risk_factor = array("validation" => array("id_risk_factor" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_loss_type = array("validation" => array("id_loss_type" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $loss_amount = array("validation" => array("loss_amount" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $id_currency = array("validation" => array("id_currency" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $loss_amount_tjs = array("validation" => array("loss_amount_tjs" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $responsible_person = array("validation" => array("responsible_person" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $desc = array("validation" => array("desc" => array("rules" => array(0 => "str|required", 2 => ""))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}