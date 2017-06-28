<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mRequests extends mModels
{
    public $fRequests;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fRequests = new fRequests();
        //$cKidswork->Import($this->fRequests);
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
    }

    function Init($fClass = null)
    {
        parent::Init($this->fRequests);
    }
}
