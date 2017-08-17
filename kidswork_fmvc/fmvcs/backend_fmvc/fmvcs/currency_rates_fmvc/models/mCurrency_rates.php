<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCurrency_rates extends mModels
{
    public $fCurrency_rates;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fCurrency_rates = new fCurrency_rates();
        $this->fConfig = $this->fCurrency_rates;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fCurrency_rates);
    }

}