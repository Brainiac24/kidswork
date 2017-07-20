<?php
namespace Kidswork\Backend;

class cTop extends mTop
{
    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        parent::Init($fClass);

        return $this;
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls->ext("cHtml");
        $cBackend = $this->cKidswork->ctrls->ext("cBackend");
        $start = '';
        $end = '';
        $start .= $cHtml->Start_Top();  
        $start .= $cHtml->Top_Left();
        
        $end .= $cHtml->End_Top();
        
        $this->fTop->get()->struct_start->set($start);
        $this->fTop->get()->struct_end->set($end);
        //var_dump($start);
        $cBackend->fBackend->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fTop->get()->get_final_struct();
    }
}
