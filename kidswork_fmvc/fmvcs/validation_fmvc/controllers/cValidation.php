<?php
namespace Kidswork;


class cValidation extends mValidation
{
    

    public function __construct($cKidswork=null)
    {   
        parent::__construct($cKidswork);
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

    public function Request($fVariable, $sel_ins_upd_del)
    {
        return $this->Validate($fVariable, $sel_ins_upd_del);
    }
}
