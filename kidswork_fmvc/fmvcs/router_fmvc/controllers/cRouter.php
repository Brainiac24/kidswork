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
