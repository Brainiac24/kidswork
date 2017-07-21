<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeftmenu extends mModels
{
    public $fLeftmenu;

    public function __construct($cKidswork)
    {
        $this->fLeftmenu = new fLeftmenu();
        $this->fConfig = $this->fLeftmenu;
        parent::__construct($cKidswork);
        //$cKidswork->Import($this->fLeftmenu);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeftmenu);
        
        
    }

}