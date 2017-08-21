<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fFraud_attr extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("act" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $is_child = array("validation" => array("ischild" => array("rules" => array(0 => "int|required", 2 => ""))),"value"=>"1");
    public $child_module = array("validation" => array("child_module" => array("rules" => array(0 => "str|required", 2 => ""))));

    public $id = array("validation" => array("id_fraud_attr" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $id_divisions_filial = array("validation" => array("id_divisions_filial" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_mhb = array("validation" => array("id_divisions_mhb" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_otdel = array("validation" => array("id_divisions_otdel" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_business_line = array("validation" => array("id_business_line" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_risk_category = array("validation" => array("id_risk_category" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_risk_factor = array("validation" => array("id_risk_factor" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_loss_type = array("validation" => array("id_loss_type" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $loss_amount_base = array("validation" => array("loss_amount_base" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_current = array("validation" => array("loss_amount_current" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_restored = array("validation" => array("loss_amount_restored" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_fact = array("validation" => array("loss_amount_fact" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $id_currency_rates = array("validation" => array("id_currency_rates" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $loss_amount_base_tjs = array("validation" => array("loss_amount_base" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_current_tjs = array("validation" => array("loss_amount_current" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_restored_tjs = array("validation" => array("loss_amount_restored" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $loss_amount_fact_tjs = array("validation" => array("loss_amount_fact" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $responsible_person = array("validation" => array("responsible_person" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $desc = array("validation" => array("desc" => array("rules" => array(0 => "str|required", 2 => ""))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}