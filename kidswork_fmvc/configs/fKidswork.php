<?php

namespace Kidswork;

use \Kidswork\Configs;

class fKidswork extends fConfigs
{

    function __construct()
    {
        parent::__construct();
        $this->vars->add_arr("ajax");
        parent::Init($this->vars->get());
        $this->fmvc_array->add_arr('validation_fmvc',"Kidswork");
        $this->fmvc_array->add_arr('router_fmvc', "Kidswork");
        $this->fmvc_array->add_arr('database_fmvc', "Kidswork");
        $this->fmvc_array->add_arr('backend_fmvc', "Kidswork\Backend");

       
        

        $this->fmvc_array->set($this->fmvc_array);
        $this->set_path(__DIR__);
        $this->configs = new Configs();
    }


}
