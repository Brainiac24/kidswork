<?php
namespace Kidswork\Backend;


class cLeft extends mLeft
{
    

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls->ext("cHtml");
        $cBackend = $this->cKidswork->ctrls->ext("cBackend");

        $cBackend->fBackend->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fLeft->get()->get_final_struct();
    }
}
