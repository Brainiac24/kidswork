<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu2 extends mModels
{
    public $fTopmenu2;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fTopmenu2->set(new fTopmenu2());
        //$cKidswork->Import($this->fTopmenu2);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu2);
    }

}