<?php

namespace Kidswork;

use \Kidswork\Configs;

class fKidswork extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        $this->fmvc_array['backend_fmvc'] = "Kidswork\Backend";

        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        $configs = new Configs();
    }
}
