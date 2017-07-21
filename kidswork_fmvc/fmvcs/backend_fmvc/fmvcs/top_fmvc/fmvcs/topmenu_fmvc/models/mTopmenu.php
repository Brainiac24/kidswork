<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu extends mModels
{
    public $fTopmenu;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->fTopmenu = new fTopmenu();
        $this->fConfig = $this->fTopmenu;
        parent::__construct($cKidswork);
        

    }

    function Init($fClass = null)
    {
        $this->ini->set(1);
        //$this->Request_Variables();
        
        parent::Init($this->fTopmenu);
    }

}