<?php

namespace Kidswork;

class cKidswork extends mKidswork
{
   
    //----------------------------------------------
    public function __construct($fKidswork = null)
    {
        parent::__construct($fKidswork);
    }
    //----------------------------------------------
    function Init($Configs = null)
    {
        //($cBackend = $this->fKidswork->get_controllers_array()["cBackend"])->Init();

        $cBackend = $this->fKidswork->get_controllers_array()["cBackend"];
        $cBackend->Init();
        $this->fKidswork->set_struct($cBackend->Render());
        
        return $this;
    }

    function Init_Full()
    {
        return '123';
    }

    function Init_Ajax($fSite)
    {
    }

    public function Import($fKidswork, $init = true, $number = "")
    {
        parent::Import($fKidswork, $init, $number);
    }

    public function Render()
    {
        return $this->fKidswork->get_final_struct();
    }
}
