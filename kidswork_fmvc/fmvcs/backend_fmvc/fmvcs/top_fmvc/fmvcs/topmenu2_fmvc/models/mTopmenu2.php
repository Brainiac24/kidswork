<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu2 extends mModels
{
    public $fTopmenu2;

    public function __construct($cKidswork)
    {
        $this->fTopmenu2 = new fTopmenu2();
        $this->fConfig = $this->fTopmenu2;
        parent::__construct($cKidswork);
        //$cKidswork->Import($this->fTopmenu2);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu2);
    }

}