<?php 
namespace Kidswork;

class cConstructor extends mConstructor {
    
    //<editor-fold defaultstate="collapsed" desc="$fConstructor">
    public $fConstructor;

    public function get_fConstructor() {
        return $this->fConstructor;
    }

    public function set_fConstructor($fConstructor) {
        $this->fConstructor = $fConstructor;
    }

    //</editor-fold>        

    public function __construct($fConstructor = NULL) {
        if ($fConstructor == NULL) {
            $this->fConstructor = new fConstructor();
        } else {
            $this->fConstructor = $fConstructor;
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fConstructor()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_fConstructor()->add_controllers_array($fController);
                }
            }
        }
        return $this->get_fConstructor()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>