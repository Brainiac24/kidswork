<?php
namespace Kidswork;

class mRouter extends mModels
{
    public $fRouter;

    public function get_requests()
    {
        return $this->fRouter->get_requests();
    }
    public function get_request($keyname)
    {
        return $this->fRouter->get_request($keyname);
    }
    public function set_requests($requests)
    {
        $this->fRouter->set_requests($requests);
    }
    public function add_requests($requests_name, $requests_value)
    {
        $this->fRouter->add_requests($requests_name, $requests_value);
    }
    public function get_rules()
    {
        return $this->fRouter->get_rules();
    }
    public function set_rules($rules)
    {
        $this->fRouter->set_rules($rules);
    }
    public function add_rules($var_name, $rules)
    {
        $this->fRouter->rules[$var_name] = $rules;
    }
    public function get_validations()
    {
        return $this->fRouter->get_validations();
    }
    public function set_validations($validations)
    {
        $this->fRouter->set_validations($validations);
    }

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fRouter = new fRouter();
        //$cKidswork->Import($this->fRouter);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fRouter);
    }
}
