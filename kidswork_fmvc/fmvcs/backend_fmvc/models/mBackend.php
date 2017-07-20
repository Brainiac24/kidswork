<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mBackend extends mModels
{
    public $fBackend;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fBackend->set(new fBackend());
        $this->cKidswork->Import($this->fBackend);
    }

    function Init($fClass=null)
    {
        parent::Init($this->fBackend);
    }


}