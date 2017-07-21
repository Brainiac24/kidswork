<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mBackend extends mModels
{
    public $fBackend;

    public function __construct($cKidswork)
    {
        $this->fBackend = new fBackend();
        $this->fConfig = $this->fBackend;
        parent::__construct($cKidswork);
    }

    function Init($fClass=null)
    {
        parent::Init($this->fBackend);
    }


}