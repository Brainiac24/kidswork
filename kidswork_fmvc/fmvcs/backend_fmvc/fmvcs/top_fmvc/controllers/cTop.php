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
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cBackend = $this->cKidswork->fKidswork->get_controllers_array()["cBackend"];
        $start = '';
        $end = '';
        $start .= $cHtml->Start_Top();  
        $start .= $cHtml->Top_Left();
        
        $end .= $cHtml->End_Top();
        
        $this->fTop->set_struct_start($start);
        $this->fTop->set_struct_end($end);
        //var_dump($start);
        $cBackend->fBackend->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fTop->get_final_struct();
    }
}
