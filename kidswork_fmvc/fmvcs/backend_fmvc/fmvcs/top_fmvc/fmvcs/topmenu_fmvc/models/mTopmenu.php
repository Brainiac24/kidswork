<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu extends mModels
{
    public $fTopmenu;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fTopmenu = new fTopmenu();
        //$cKidswork->Import($this->fTopmenu);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu);
    }

}