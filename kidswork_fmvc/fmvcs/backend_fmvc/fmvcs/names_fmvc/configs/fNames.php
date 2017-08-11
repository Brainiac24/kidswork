<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fNames extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("act" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $is_child = array("validation" => array("ischild" => array("rules" => array(0 => "int", 2 => ""))));
    public $id = array("validation" => array("id_names" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $name = array("validation" => array("name" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $table = array("validation" => array("table" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $table_name = array("validation" => array("table_name" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $input_name = array("validation" => array("table_name" => array("rules" => array(0 => "str|required", 2 => ""))));

    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}