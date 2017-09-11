<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mDatatable extends mModels
{
    public $fDatatable;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fDatatable = new fDatatable();
        $this->fConfig = $this->fDatatable;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fDatatable);
    }

}