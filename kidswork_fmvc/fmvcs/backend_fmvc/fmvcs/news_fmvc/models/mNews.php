<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mNews extends mModels
{
    public $fNews;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fNews->set(new fNews());
        //$cKidswork->Import($this->fNews);
    }

    function Init($fClass = null)
    {
        parent::Init($this->fNews);
    }

}