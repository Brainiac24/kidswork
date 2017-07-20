<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeft extends mModels
{
    public $fLeft;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fLeft->set(new fLeft());
        $this->cKidswork->Import($this->fLeft);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeft);
    }

}