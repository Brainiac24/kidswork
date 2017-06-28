<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLimits extends mModels
{
    public $fLimits;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fLimits = new fLimits();
        //$cKidswork->Import($this->fLimits);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLimits);
    }

}