<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu extends mModels
{
    public $fTopmenu;
    public $cKidswork;
    private $router_rules = array();

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fTopmenu = new fTopmenu();
        //$cKidswork->Import($this->fTopmenu);

        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"] ?? null;
        if ($this->cRouter!=null) {
            $this->cRouter->Add_Request($this->fTopmenu->get_router_rules());
        }
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu);
    }

}