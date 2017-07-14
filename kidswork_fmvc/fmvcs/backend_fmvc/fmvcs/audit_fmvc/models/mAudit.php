<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mAudit extends mModels
{
    public $fAudit;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        $this->fAudit = new fAudit();
        //$cKidswork->Import($this->fAudit);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fAudit);
    }

}