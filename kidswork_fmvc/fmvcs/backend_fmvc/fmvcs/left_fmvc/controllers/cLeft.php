<?php
namespace Kidswork\Backend;


class cLeft extends mLeft
{
    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init($fClass=null)
    {
        parent::Init($fClass);
    }

    function Init_Full()
    {
        
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cBackend = $this->cKidswork->fKidswork->get_controllers_array()["cBackend"];

        $cBackend->fBackend->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fLeft->get_final_struct();
    }
}
