<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mNews extends mModels
{
    public $fNews;

    public function __construct($cKidswork)
    {
        
        $this->fNews = new fNews();
        $this->fConfig = $this->fNews;
        parent::__construct($cKidswork);
        //$cKidswork->Import($this->fNews);

    }

    function Init($fClass = null)
    {
        parent::Init($this->fNews);
    }

}