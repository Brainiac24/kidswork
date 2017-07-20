<?php
namespace Kidswork\Backend;

class cBackend extends mBackend
{
    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls->ext("cHtml");
        $start = '';
        $end = '';
        
        $start .= $cHtml->Start_Html();
        $start .= $cHtml->Start_Head();
        $start .= $cHtml->Headers($title = null);
        $start .= $cHtml->End_Head();
        $start .= $cHtml->Start_Body();
        $end .= $cHtml->End_Html();
        $end .= $cHtml->End_Head();
        $end .= $cHtml->End_Body();
        $this->fBackend->get()->struct_start->set($start);
        $this->fBackend->get()->struct_end->set($end);
        //var_dump($start);
        $this->cKidswork->fKidswork->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fBackend->get()->get_final_struct();
    }
}
