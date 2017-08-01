<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mFraud extends mModels
{
    public $fFraud;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fFraud = new fFraud();
        $this->fConfig = $this->fFraud;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fFraud);
    }

}