<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCenter extends mModels
{
    public $fCenter;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fCenter->set(new fCenter());
        //$cKidswork->Import($this->fCenter);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fCenter);
    }

}