<?php
namespace Kidswork\Backend;


class cBackend extends mBackend
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
        return $this->fBackend->get_final_struct();
    }
}
