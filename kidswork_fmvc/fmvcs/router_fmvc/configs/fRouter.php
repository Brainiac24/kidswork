<?php

namespace Kidswork;

class fRouter extends fConfigs
{
    public $ajax = array("validation"=>array("ajax"=>array("rules"=>array(0,"int"))));
    public $menu = array("validation" => array("menu" => array("rules" => array(0 => "int"))));
    public $submenu = array("validation" => array("submenu" => array("rules" => array(0 => "int"))));
    public $child_module = array("validation" => array("child_module" => array("rules" => array(0 => "str"))));
    
    function __construct()
    {
        parent::__construct();
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }

}
