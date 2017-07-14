<?php
namespace Kidswork\Backend;

class cBackend extends mBackend
{
    function Init_Full()
    {
        $cHtml = $this->ctrls["cHtml"];
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
        $this->fBackend->set_struct_start($start);
        $this->fBackend->set_struct_end($end);
        //var_dump($start);
        $this->cKidswork->fKidswork->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fBackend->get_final_struct();
    }
}
