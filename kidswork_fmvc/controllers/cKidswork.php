<?php

namespace Kidswork;

use Kidswork\Backend;

class cKidswork extends mKidswork
{
   
    //----------------------------------------------
    public function __construct($fKidswork = null)
    {
        parent::__construct($fKidswork);
    }
    //----------------------------------------------
    function Init($fControllers = null)
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

        $cBackend = new Backend\cBackend();
        $this->fKidswork->set_struct($cBackend->init());
        
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
