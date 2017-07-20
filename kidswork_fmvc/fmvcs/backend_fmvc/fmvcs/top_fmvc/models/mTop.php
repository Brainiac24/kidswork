<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTop extends mModels
{
    public $fTop;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fTop->set(new fTop());
        $this->cKidswork->Import($this->fTop);
    }

    function Init($fClass)
    {
        parent::Init($this->fTop);
    }
}