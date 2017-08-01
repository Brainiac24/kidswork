<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fFraud extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $id = array("validation" => array("id_fraud" => array("rules" => array(0 => "int|required", 2 => ""))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}