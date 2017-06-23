<?php
namespace Kidswork\Backend;

class mBackend
{
    public $fBackend;

    public function __construct($cKidswork)
    {
        $this->fBackend = new fBackend();
        //$cKidswork->Import($this->fBackend);
    }
}
