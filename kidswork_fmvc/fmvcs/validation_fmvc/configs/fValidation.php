<?php

namespace Kidswork;

class fValidation extends fConfigs
{
    public $errors = array();
    public $messages = array();
    public $var_name = NULL;
    public $rules = NULL;
    public $value = NULL;
    public $mode = "request";
   
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