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
        $this->cKidswork = $cKidswork;
        $this->fNews = new fNews();
        //$cKidswork->Import($this->fNews);
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
    }

    function Init($fClass = null)
    {
        parent::Init($this->fNews);
    }

}