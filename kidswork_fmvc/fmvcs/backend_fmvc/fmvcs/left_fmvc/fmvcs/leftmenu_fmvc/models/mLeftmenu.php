<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeftmenu extends mModels
{
    public $fLeftmenu;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fLeftmenu->set(new fLeftmenu());
        //$cKidswork->Import($this->fLeftmenu);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeftmenu);
        
        
    }

}