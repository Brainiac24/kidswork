<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeftmenu extends mModels
{
    public $fLeftmenu;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fLeftmenu = new fLeftmenu();
        //$cKidswork->Import($this->fLeftmenu);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeftmenu);
        
        
    }

}