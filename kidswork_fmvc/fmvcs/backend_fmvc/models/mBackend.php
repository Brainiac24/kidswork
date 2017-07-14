<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mBackend extends mModels
{
    public $fBackend;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fBackend = new fBackend();
        $cKidswork->Import($this->fBackend);
    }

    function Init($fClass=null)
    {
        parent::Init($this->fBackend);
    }


}