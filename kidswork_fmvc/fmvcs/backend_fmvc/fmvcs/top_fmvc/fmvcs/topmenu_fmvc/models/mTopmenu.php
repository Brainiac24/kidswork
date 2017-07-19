<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mTopmenu extends mModels
{
    public $fTopmenu;
    public $cKidswork;

    public function __construct($cKidswork)
    {
        $this->cKidswork->set($cKidswork);
        $this->fTopmenu->set(new fTopmenu());
        //$cKidswork->Import($this->fTopmenu);

        $this->cRouter->set($this->cKidswork->get()->fKidswork->get()->ctrl->ext("cRouter"));
        if ($this->cRouter != null) {
            foreach ($this->fTopmenu->get() as $key => $value) {
                if (isset($value["validation"])) {
                    $this->cRouter->get()->Add_Request($this->fTopmenu->get_router_rules());
                }
                
            }

            
        }
    }

    function Init($fClass = null)
    {
        parent::Init($this->fTopmenu);
    }

}