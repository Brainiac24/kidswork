<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fCenter extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        
        $this->fmvc_array["centermenu_fmvc"] = "Kidswork\Backend";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        
    }
}