<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCenter extends mModels
{
    public $fCenter;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        $this->fCenter = new fCenter();
        //$cKidswork->Import($this->fCenter);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fCenter);
    }

}