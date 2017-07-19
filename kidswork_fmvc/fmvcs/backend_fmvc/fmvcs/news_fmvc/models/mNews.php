<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mNews extends mModels
{
    public $fNews;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->cKidswork->set($cKidswork);
        $this->fNews->set(new fNews());
        //$cKidswork->Import($this->fNews);
        $this->cRouter = $this->cKidswork->get()->fKidswork->get()->ctrls->get()["cRouter"];
    }

    function Init($fClass = null)
    {
        parent::Init($this->fNews);
    }

}