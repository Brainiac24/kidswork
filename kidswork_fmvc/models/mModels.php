<?php
namespace Kidswork;

class mModels
{
    protected $cKidswork;

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
    }
}
