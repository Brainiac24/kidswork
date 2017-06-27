<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeft extends mModels
{
    public $fLeft;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fLeft = new fLeft();
        $cKidswork->Import($this->fLeft);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeft);
    }

}