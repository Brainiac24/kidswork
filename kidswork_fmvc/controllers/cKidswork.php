<?php

namespace Kidswork; 
use Kidswork\Backend\cBackend;

class cKidswork extends mKidswork {

    //<editor-fold defaultstate="collapsed" desc="$fKidswork">
    public $fKidswork;

    public function get_fKidswork() {
        return $this->fKidswork;
    }

    public function set_fKidswork($fKidswork) {
        $this->fKidswork = $fKidswork;
    }

    //</editor-fold>        

    public function __construct($fKidswork = NULL) {
        if ($fKidswork == NULL) {
            $this->fKidswork = new fKidswork();
        } else {
            $this->fKidswork = $fKidswork;
        }
    }

    function Init($fControllers = NULL) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fKidswork()->add_controllers_array($fControllers);
            } else {
                foreach ($fControllers as $fController) {
                    $this->get_fKidswork()->add_controllers_array($fController);
                }
            }
        }
        $cBackend = new cBackend();
        $cBackend->Init();
        return $this->get_fKidswork()->get_final_struct();
    }

    function Init_Full() {
        return '123';
    }

    function Init_Ajax($fSite) {
        
    }

}

?>