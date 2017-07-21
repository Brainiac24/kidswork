<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCenter extends mModels
{
    public $fCenter;

    public function __construct($cKidswork)
    {
        $this->fCenter = new fCenter();
        $this->fConfig = $this->fCenter;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fCenter);
    }

}