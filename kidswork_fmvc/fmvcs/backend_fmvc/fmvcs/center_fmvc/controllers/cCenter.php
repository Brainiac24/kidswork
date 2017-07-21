<?php
namespace Kidswork\Backend;


class cCenter extends mCenter
{

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $cBackend = $this->cKidswork->ctrls_global->ext("cBackend");
        $this->fCenter->get()->struct_start->set($cHtml->Start_Middle_Center());
        $this->fCenter->get()->struct_end->set($cHtml->End_Middle_Center());
        $cBackend->fBackend->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
        $cBackend = $this->cKidswork->ctrls_global->ext("cBackend");
        $cBackend->fBackend->get()->struct->con($this->Print());
    }

    public function Print()
    {
        return $this->fCenter->get()->get_final_struct();
    }
}
