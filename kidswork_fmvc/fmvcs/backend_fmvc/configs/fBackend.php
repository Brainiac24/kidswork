<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fBackend extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {   
        $this->fmvc_array["html_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["news_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["requests_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["questions_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["limits_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["center_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["top_fmvc"] = "Kidswork\Backend";
        $this->fmvc_array["left_fmvc"] = "Kidswork\Backend";
        //var_dump($this->fmvc_array);
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        
    }
}