<?php
namespace Kidswork;


class cValidation extends mValidation
{
    

    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init()
    {
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
        return $this->fValidation->get_final_struct();
    }

    public function Request($var_name, $conditions, $mode = 'request')
    {
        return $this->Validate($var_name, $conditions, $mode);
    }
}
