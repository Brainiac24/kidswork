<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fCenter extends fConfigs
{
    public $width = "50"; 
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("centermenu_fmvc", "Kidswork\Backend");
        $this->path->set(__DIR__);
        
    }
}