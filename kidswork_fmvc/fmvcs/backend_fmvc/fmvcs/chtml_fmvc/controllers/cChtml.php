<?php 
namespace Kidswork;

class cChtml extends mChtml {
    
    //<editor-fold defaultstate="collapsed" desc="$fChtml">
    public $fChtml;

    public function get_fChtml() {
        return $this->fChtml;
    }

    public function set_fChtml($fChtml) {
        $this->fChtml = $fChtml;
    }

    //</editor-fold>        

    public function __construct($fChtml = NULL) {
        if ($fChtml == NULL) {
            $this->fChtml = new fChtml();
        } else {
            $this->fChtml = $fChtml;
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fChtml()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_fChtml()->add_controllers_array($fController);
                }
            }
        }
        return $this->get_fChtml()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>