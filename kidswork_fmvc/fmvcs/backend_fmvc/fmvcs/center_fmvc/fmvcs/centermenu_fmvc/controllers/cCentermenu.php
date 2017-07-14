<?php
namespace Kidswork\Backend;


class cCentermenu extends mCentermenu
{

    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;

    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init($fClass=null)
    {
        parent::Init($fClass);
    }

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $this->cLeftmenu = $this->cKidswork->fKidswork->get_controllers_array()["cLeftmenu"];
        $this->cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];
        $this->cCenter = $this->cKidswork->fKidswork->get_controllers_array()["cCenter"];
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fCentermenu->get_final_struct();
    }

    
}
