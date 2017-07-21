<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCentermenu extends mModels
{
    public $fCentermenu;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        $this->fCentermenu = new fCentermenu();
        $this->fConfig = $this->fCentermenu;
        //$cKidswork->Import($this->fCentermenu);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fCentermenu);
    }

}