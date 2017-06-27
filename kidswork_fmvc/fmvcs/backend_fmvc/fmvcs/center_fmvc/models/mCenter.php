<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCenter
{
    public $fCenter;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fCenter = new fCenter();
        //$cKidswork->Import($this->fCenter);
    }
}