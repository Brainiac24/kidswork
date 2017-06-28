<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fTop extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        $this->fmvc_array["topmenu_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["topmenu2_fmvc"] = "Kidswork\Backend";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);

        
        
    }


}