<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTop extends mModels
{
    public $fTop;

    public function __construct($cKidswork)
    {
        $this->fTop = new fTop();
        $this->fConfig = $this->fTop;
        parent::__construct($cKidswork);
    }

    function Init($fClass)
    {
        parent::Init($this->fTop);
    }
}