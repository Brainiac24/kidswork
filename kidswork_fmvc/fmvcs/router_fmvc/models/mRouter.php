<?php
namespace Kidswork;

class mRouter extends mModels
{
    public $fRouter;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fRouter->set(new fRouter());
        //$cKidswork->Import($this->fRouter);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fRouter);
    }
}
