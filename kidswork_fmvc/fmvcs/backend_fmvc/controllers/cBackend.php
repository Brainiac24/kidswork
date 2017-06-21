<?php 
namespace Kidswork\Backend;
use Kidswork\cKidswork;

class cBackend extends mBackend {
    
    //<editor-fold defaultstate="collapsed" desc="$fBackend">
    public $fBackend;

    public function get_fBackend() {
        return $this->fBackend;
    }

    public function set_fBackend($fBackend) {
        $this->fBackend = $fBackend;
    }

    //</editor-fold>        

    public function __construct($fBackend = NULL) {
        if ($fBackend == NULL) {
            $this->fBackend = new fBackend();
        } else {
            $this->fBackend = $fBackend;
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fBackend()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_fBackend()->add_controllers_array($fController);
                }
            }
        }
        var_dump((new cKidswork())->Init_Full()) ; 
        return $this->get_fBackend()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>