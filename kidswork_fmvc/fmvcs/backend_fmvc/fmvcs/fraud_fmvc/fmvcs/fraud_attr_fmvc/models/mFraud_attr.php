<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mFraud_attr extends mModels
{
    public $fFraud_attr;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fFraud_attr = new fFraud_attr();
        $this->fConfig = $this->fFraud_attr;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fFraud_attr);
    }

}