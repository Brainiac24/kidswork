<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fTopmenu extends fConfigs
{
    public $menu = array("validation" => array("menu" => array("rules" => array(0 => "int"))));
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