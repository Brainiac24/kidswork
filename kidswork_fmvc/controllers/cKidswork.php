<?php

namespace Kidswork;

class cKidswork extends mKidswork
{
    //----------------------------------------------
    public $fKidswork;
    public function get_fKidswork()
    {
        return $this->fKidswork;
    }
    public function set_fKidswork($fKidswork)
    {
        $this->fKidswork = $fKidswork;
    }
    //----------------------------------------------
    public function __construct($fControllers = null)
    {
        
        if ($fControllers != null) {
            if (!is_array($fControllers)) {
                $this->get_fKidswork()->add_controllers_array($fControllers);
            } else {
                foreach ($fControllers as $fController) {
                    $this->get_fKidswork()->add_controllers_array($fController);
                }
            }
        }
    }
    //----------------------------------------------
    function Init($fKidswork = null)
    {
        if ($fKidswork == null) {
            $this->fKidswork = new fKidswork();
        } else {
            $this->fKidswork = $fKidswork;
        }

        if ($fKidswork->get_fmvc_array() != null) {
            foreach ($fKidswork->get_fmvc_array() as $fmvc_item) {
                autoload(__DIR__, $fmvc_item);
            }
        }
        
        return $this->get_fKidswork()->get_final_struct();
    }

    function Init_Full()
    {
        return '123';
    }

    function Init_Ajax($fSite)
    {
    }
}
