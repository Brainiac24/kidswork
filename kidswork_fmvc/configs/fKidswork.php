<?php

namespace Kidswork;

use \Kidswork\Configs;

class fKidswork extends fConfigs
{
    private $fmvc_array = array();
    private $request_rules = array();
    public $configs;

    public function get_request_rules() {
        return $this->request_rules;
    }
    public function set_request_rules($request_rules) {
        $this->request_rules = $request_rules;
    }
   
    function __construct()
    {
        $this->fmvc_array['validation_fmvc'] = "Kidswork";
        $this->fmvc_array['router_fmvc'] = "Kidswork";
        $this->fmvc_array['database_fmvc'] = "Kidswork";
        $this->fmvc_array['backend_fmvc'] = "Kidswork\Backend";

        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        $this->configs = new Configs();
    }


}
