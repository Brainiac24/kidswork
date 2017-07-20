<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu extends mModels
{
    public $fTopmenu;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fTopmenu->set(new fTopmenu());
        //$cKidswork->Import($this->fTopmenu);

    }

    function Init($fClass = null)
    {
        $this->fTopmenu = $this->Request_Variables($this->fTopmenu,"0");
        parent::Init($this->fTopmenu);
    }

}