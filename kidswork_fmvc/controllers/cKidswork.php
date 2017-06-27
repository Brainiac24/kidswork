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
    function Init($fClass=null)
    {
        parent::Init($fClass);

        $cRouter = $this->fKidswork->get_controllers_array()["cRouter"];
        
        return !isset($cRouter->get_requests()["ajax"]) ? $this->Init_Full() : $this->Init_Ajax();

    }

    function Init_Full()
    {
        //$this->fKidswork->add_struct("123");

        return $this->Print();
    }

    function Init_Ajax()
    {
        $this->fKidswork->add_struct("ajax");
    }

    public function Import($fKidswork, $init = true, $number = "")
    {
        parent::Import($fKidswork, $init, $number);
    }

    public function Print()
    {
        return $this->fKidswork->get_final_struct();
    }
}
