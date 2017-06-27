<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTop extends mModels
{
    public $fTop;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fTop = new fTop();
        $cKidswork->Import($this->fTop);
    }

    function Init($fClass)
    {
        parent::Init($this->fTop);
    }
}