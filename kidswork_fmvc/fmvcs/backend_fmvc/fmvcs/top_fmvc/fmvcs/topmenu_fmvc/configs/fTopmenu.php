<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fTopmenu extends fConfigs
{
    private $fmvc_array = array();
    private $router_rules = array();
   
    function __construct()
    {
        $this->router_rules["menu"]="int";
        $this->set_router_rules($this->router_rules);
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }

}