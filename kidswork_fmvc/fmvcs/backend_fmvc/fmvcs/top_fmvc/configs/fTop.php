<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fTop extends fConfigs
{
   
    function __construct()
    {
        parent::__construct();
        $this->fmvc_array->add("topmenu_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("topmenu2_fmvc", "Kidswork\Backend");
        $this->path->set(__DIR__);

        
        
    }


}