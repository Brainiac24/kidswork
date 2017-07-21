<?php
namespace Kidswork;

class mRouter extends mModels
{
    public $fRouter;

    public function __construct($cKidswork)
    {
        $this->fRouter = new fRouter();
        $this->fConfig = $this->fRouter;
        parent::__construct($cKidswork);
        //$cKidswork->Import($this->fRouter);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fRouter);
    }
}
