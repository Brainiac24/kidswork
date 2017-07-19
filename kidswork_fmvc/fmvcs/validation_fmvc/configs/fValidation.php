<?php

namespace Kidswork;

class fValidation extends fConfigs
{
    private $errors = array();
    private $messages = array();
    private $name = NULL;
    private $rules = NULL;
    private $value = NULL;
    private $mode = "request";
   
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