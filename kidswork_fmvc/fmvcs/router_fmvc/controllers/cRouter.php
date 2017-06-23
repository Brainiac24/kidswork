<?php
namespace Kidswork\Backend;


class cRouter extends mRouter
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
        return $this->fRouter->get_final_struct();
    }
}
