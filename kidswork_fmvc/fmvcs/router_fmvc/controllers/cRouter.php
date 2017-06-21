<?php 
namespace Kidswork;

class cRouter extends mRouter {
    
    //<editor-fold defaultstate="collapsed" desc="$fRouter">
    public $fRouter;

    public function get_fRouter() {
        return $this->fRouter;
    }

    public function set_fRouter($fRouter) {
        $this->fRouter = $fRouter;
    }

    //</editor-fold>        

    public function __construct($fRouter = NULL) {
        if ($fRouter == NULL) {
            $this->fRouter = new fRouter();
        } else {
            $this->fRouter = $fRouter;
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_fRouter()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_fRouter()->add_controllers_array($fController);
                }
            }
        }
        return $this->get_fRouter()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>