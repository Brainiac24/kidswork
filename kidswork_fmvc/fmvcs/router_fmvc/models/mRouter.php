<?php
namespace Kidswork\Backend;

class mRouter
{
    public $fRouter;

    public function __construct($cKidswork)
    {
        $this->fRouter = new fRouter();
        //$cKidswork->Import($this->fRouter);
    }
}