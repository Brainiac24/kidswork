<?php
namespace Kidswork\Backend;


class cCenter extends mCenter
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
        $this->fCenter->set_struct_start($cHtml->Start_Middle_Center());
        $this->fCenter->set_struct_End($cHtml->End_Middle_Center());
        $cBackend->fBackend->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fCenter->get_final_struct();
    }
}
