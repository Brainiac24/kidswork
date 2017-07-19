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
        $this->Add_Request($this->rules->get());
        return $this;
    }

    public function Add_Request($rules)
    {
        $cValidation = $this->cKidswork->get()->fKidswork->get()->ctrls->ext("cValidation");
        foreach ($rules as $key => $value) {
           $this->add_requests($key, $cValidation->Request($key, $value));
        }
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
