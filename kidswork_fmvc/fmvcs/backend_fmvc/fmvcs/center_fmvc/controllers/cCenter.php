<?php
namespace Kidswork\Backend;


class cCenter extends mCenter
{

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls->ext("cHtml");
        $cBackend = $this->cKidswork->ctrls->ext("cBackend");
        $this->fCenter->get()->struct_start->set($cHtml->Start_Middle_Center());
        $this->fCenter->get()->struct_end->set($cHtml->End_Middle_Center());
        $cBackend->fBackend->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fCenter->get()->get_final_struct();
    }
}
