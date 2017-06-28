<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mQuestions extends mModels
{
    public $fQuestions;
    public $cKidswork;
    public $cRouter;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fQuestions = new fQuestions();
        //$cKidswork->Import($this->fQuestions);
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
    }

    function Init($fClass = null)
    {
        parent::Init($this->fQuestions);
    }

}