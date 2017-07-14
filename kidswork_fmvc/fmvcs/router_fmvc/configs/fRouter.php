<?php

namespace Kidswork;

class fRouter extends fConfigs
{
    private $fmvc_array = array();

    private $requests = array();
    private $rules = array();
    private $validations = array();

    public function get_requests()
    {
        return $this->requests;
    }

    public function get_request($keyname)
    {
        if (isset($this->requests[$keyname])) {
            //\var_dump($keyname);
            return $this->requests[$keyname]->get_value();
        } else {
                return null;
        }
    }
    public function set_requests($requests)
    {
        $this->requests = $requests;
    }
    public function add_requests($requests_name, $requests_value)
    {
        $this->requests[$requests_name] = $requests_value;
    }
    public function get_rules()
    {
        return $this->rules;
    }
    public function set_rules($rules)
    {
        $this->rules = $rules;
    }
    public function add_rules($var_name, $rules)
    {
        $this->rules[$var_name] = $rules;
    }
    public function get_validations()
    {
        return $this->get_requests();
    }
    public function set_validations($validations)
    {
        $this->validations = $validations;
    }

    function __construct()
    {

        $this->add_rules("ajax", "int");
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }
}
