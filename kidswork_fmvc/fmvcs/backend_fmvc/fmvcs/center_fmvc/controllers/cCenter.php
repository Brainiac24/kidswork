<?php
namespace Kidswork\Backend;


class cCenter extends mCenter
{

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $cBackend = $this->cKidswork->ctrls_global->ext("cBackend");
        $this->fCenter->get()->struct_start->set($cHtml->Start_Middle_Center().$cHtml->Start_Center_Wrapper($this->fCenter->get()->width->get()));
        $this->fCenter->get()->width->set("50");
        $end_center = $cHtml->End_Center_Wrapper();
        $end_center .= $cHtml->End_Middle_Center();
        $end_center .= $cHtml->Start_Dialog_Box();
        $end_center .= $cHtml->End_Dialog_Box();
        $this->fCenter->get()->struct_end->set($end_center);
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
