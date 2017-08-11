<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fBackend extends fConfigs
{
    function __construct()
    {   
        parent::__construct();
        $this->fmvc_array->add("html_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("news_fmvc", "Kidswork\Backend");
        //$this->fmvc_array->add("requests_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("names_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("fraud_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("audit_fmvc", "Kidswork\Backend");
        //$this->fmvc_array->add("limits_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("top_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("left_fmvc", "Kidswork\Backend");
        $this->fmvc_array->add("center_fmvc", "Kidswork\Backend");
        $this->path->set(__DIR__);
        
    }
}