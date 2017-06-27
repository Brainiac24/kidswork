<?php
namespace Kidswork;


class cRouter extends mRouter
{
    

    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init($controllers=null)
    {
        parent::Init($controllers);
        $cValidation = $this->cKidswork->fKidswork->get_controllers_array()["cValidation"];
        foreach ($this->get_rules() as $key => $value) {
           $this->add_requests($key, $cValidation->Request($key, $value)->get_value());
        }

        return $this;
    }

    function Init_Full()
    {
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fRouter->get_final_struct();
    }
}
