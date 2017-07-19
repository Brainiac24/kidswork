<?php

namespace Kidswork;

class cKidswork extends mKidswork
{
    function Init($fClass=null)
    {
        parent::Init($fClass);

        $cRouter = $this->fKidswork->get_controllers_array()["cRouter"];
        
        return $cRouter->get_request("ajax") == null ? $this->Init_Full() : $this->Init_Ajax();

    }

    function Init_Full()
    {
        //$this->fKidswork->add_struct("123");

        return $this->Print();
    }

    function Init_Ajax()
    {
        return $this->fKidswork->get_ajax();
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
