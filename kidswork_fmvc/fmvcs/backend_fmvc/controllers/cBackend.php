<?php
namespace Kidswork\Backend;


class cBackend extends mBackend
{
    

    public function __construct($fKidswork)
    {   
        parent::__construct($fKidswork);
    }

    function Init($fControllers = null)
    {
        $this->fBackend->set_struct = '123';
        
    }

    function Init_Full($fSite)
    {
    }

    function Init_Ajax($fSite)
    {
    }

    public function Render()
    {
        return $this->fBackend->get_final_struct();
    }
}
