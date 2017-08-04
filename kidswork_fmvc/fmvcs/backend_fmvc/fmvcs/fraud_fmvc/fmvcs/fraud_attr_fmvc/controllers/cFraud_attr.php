<?php
namespace Kidswork\Backend;


class cFraud_attr extends mFraud_attr
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
        return $this->fFraud_attr->get()->final_struct();
    }
}
