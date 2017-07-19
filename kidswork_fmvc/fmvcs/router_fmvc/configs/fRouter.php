<?php

namespace Kidswork;

class fRouter extends fConfigs
{
    public $ajax = array("validation"=>array("ajax"=>array("rules"=>array(0,"int"))));

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
