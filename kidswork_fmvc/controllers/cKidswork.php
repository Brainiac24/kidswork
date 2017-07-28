<?php

namespace Kidswork;

class cKidswork extends mKidswork
{
    function Init($fClass=null)
    {
        
        parent::Init($fClass);

        $cRouter = $this->ctrls->ext("cRouter");
        
        return $cRouter->fRouter->get()->ajax->get() == null ? $this->Init_Full() : $this->Init_Ajax();

    }

    function Init_Full()
    {
        //$this->fKidswork->add_struct("123");

        return $this->Print();
    }

    function Init_Ajax()
    {
        
        return $this->Print();
    }

    public function Import($fKidswork, $init = true, $number = "")
    {
        return parent::Import($fKidswork, $init, $number);
    }

    public function Print()
    {
        return $this->fKidswork->get()->get_final_struct();
    }
}
