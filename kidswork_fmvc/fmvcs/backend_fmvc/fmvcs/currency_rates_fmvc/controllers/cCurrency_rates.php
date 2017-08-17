<?php
namespace Kidswork\Backend;


class cCurrency_rates extends mCurrency_rates
{
    private $cHtml = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fCurrency_rates->get()->final_struct();
    }
}
