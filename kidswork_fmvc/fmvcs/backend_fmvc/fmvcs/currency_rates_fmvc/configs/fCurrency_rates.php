<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fCurrency_rates extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("act" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $is_child = array("validation" => array("ischild" => array("rules" => array(0 => "int|required", 2 => ""))),"value"=>"1");
    public $child_module = array("validation" => array("child_module" => array("rules" => array(0 => "str|required", 2 => ""))));
    
    public $id = array("validation" => array("id_currency_rates" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_currency = array("validation" => array("id_currency" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $rate = array("validation" => array("rate" => array("rules" => array(0 => "float|required", 2 => ""))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}