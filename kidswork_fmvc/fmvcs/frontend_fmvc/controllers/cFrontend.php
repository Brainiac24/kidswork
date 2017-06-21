<?php 
namespace Kidswork;

class cFrontend extends mFrontend {
    
    //<editor-fold defaultstate="collapsed" desc="$fFrontend">
    public $fFrontend;

    public function get_fFrontend() {
        return $this->fFrontend;
    }

    public function set_fFrontend($fFrontend) {
        $this->fFrontend = $fFrontend;
    }

    //</editor-fold>        

    public function __construct($fFrontend = NULL) {
        if ($fFrontend == NULL) {
            $this->fFrontend = new fFrontend();
        } else {
            $this->fFrontend = $fFrontend;
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fFrontend()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_fFrontend()->add_controllers_array($fController);
                }
            }
        }
        return $this->get_fFrontend()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>