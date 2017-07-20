<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fLeft extends fConfigs
{
   
    function __construct()
    {
        parent::__construct(); 
        $this->fmvc_array->add("leftmenu_fmvc","Kidswork\Backend");
        $this->path->set(__DIR__);
        
    }
}