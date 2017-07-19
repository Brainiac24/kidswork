<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mAudit extends mModels
{
    public $fAudit;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fAudit->set(new fAudit());
        //$cKidswork->Import($this->fNews);
        
        
        
    }

    function Init($fClass = null)
    {
        parent::Init($this->fAudit);
        $this->cRouter->get()->Add_Request($this->fAudit->get()->router_rules->get());
    }


    

}