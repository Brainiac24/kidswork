<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLeft extends mModels
{
    public $fLeft;

    public function __construct($cKidswork)
    {
        
        $this->fLeft = new fLeft();
        $this->fConfig = $this->fLeft;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fLeft);
    }

}