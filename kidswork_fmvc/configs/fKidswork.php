<?php

namespace Kidswork;

use \Kidswork\Configs;

class fKidswork extends fConfigs
{
    public $configs;

    function __construct()
    {
        parent::__construct();
        $this->fmvc_array->add('validation_fmvc',"Kidswork");
        $this->fmvc_array->add('router_fmvc', "Kidswork");
        $this->fmvc_array->add('database_fmvc', "Kidswork");
        $this->fmvc_array->add('backend_fmvc', "Kidswork\Backend");

        $this->path->set(__DIR__);
        $this->configs->set(new Configs());


    }


}
