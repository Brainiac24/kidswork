<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fLeftmenu extends fConfigs
{
    public $struct_array_child = null;
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