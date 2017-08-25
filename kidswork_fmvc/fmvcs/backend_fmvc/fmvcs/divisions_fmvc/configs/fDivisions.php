<?php
namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fDivisions extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("act" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $is_child = array("validation" => array("ischild" => array("rules" => array(0 => "int|required", 2 => ""))), "value" => "1");
    public $child_module = array("validation" => array("child_module" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $form_name = array("validation" => array("form_name" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $form_name_return = array("validation" => array("form_name_return" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $id_module_code = array("validation" => array("id_module_code" => array("rules" => array(0 => "str|required", 2 => ""))));

    public $id = array("validation" => array("id_divisions" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_categories = array("validation" => array("id_divisions_categories" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_names = array("validation" => array("id_divisions_names" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions_2 = array("validation" => array("id_divisions_2" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $code = array("validation" => array("code" => array("rules" => array(0 => "float|required", 2 => ""))));
    public $desc = array("validation" => array("desc" => array("rules" => array(0 => "float|required", 2 => ""))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);

    }
}