<?php
namespace Kidswork;

class mModels
{
    protected $cKidswork;
    protected $cRouter;
    protected $ctrls;

    protected function get_cKidswork()
    {
        return $this->cKidswork;
    }
    protected function set_cKidswork($cKidswork)
    {
        $this->cKidswork = $cKidswork;
    }

    protected function __construct($cKidswork)
    {
        $this->set_cKidswork($cKidswork);
    }

    function Init($controllers)
    {
        $controllers_arr = $controllers->get_controllers_array();
        foreach ($controllers_arr as $controller) {
            $controller->Init();
        }
        $this->ctrls = $this->cKidswork->fKidswork->get_controllers_array();
        $this->cRouter = $this->ctrls["cRouter"];
        
        return $this->cRouter->get_request("ajax") == null ? $this->Init_Full() : $this->Init_Ajax();
    }
}
