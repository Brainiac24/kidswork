<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu2 extends mModels
{
    public $fTopmenu2;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fTopmenu2 = new fTopmenu2();
        //$cKidswork->Import($this->fTopmenu2);

        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"] ?? null;
        if ($this->cRouter!=null) {
            $this->cRouter->Add_Request($this->fTopmenu2->get_router_rules());
        }
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu2);
    }

}