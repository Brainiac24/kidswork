<?php
namespace Kidswork\Backend;


class cConstructor extends mConstructor
{
    

    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init()
    {
        return $this;
    }

    function Init_Full($fSite)
    {
    }

    function Init_Ajax($fSite)
    {
    }

    public function Render()
    {
        return $this->fConstructor->get_final_struct();
    }
}
