<?php

class structure {

    private $folders = array("configs", "controllers", "models", "views", "fmvcs");

    public function createMvc($path) {
        $path = trim($path);
        if (is_null($path))
            return false;
        $path_mvc = $path . "_fmvc";
        if (!file_exists($path_mvc)) {
            mkdir($path_mvc);
        }
        $path = ucfirst($path);

        foreach ($this->folders as $name_folder) {
            if (!file_exists($path_mvc . "/" . $name_folder)) {

                mkdir($path_mvc . "/" . $name_folder);
                switch ($name_folder) {
                    case"configs":
                        file_put_contents($path_mvc . "/" . $name_folder . "/fAutoload.php", $this->AddPhpScriptsToAutoload());
                        file_put_contents($path_mvc . "/" . $name_folder . "/f{$path}.php", $this->AddPhpScriptsToConfig($path));
                        break;
                    case"controllers":
                        file_put_contents($path_mvc . "/" . $name_folder . "/c{$path}.php", $this->AddPhpScriptsToControllers($path));
                        break;
                    case"models":
                        file_put_contents($path_mvc . "/" . $name_folder . "/m{$path}.php", $this->AddPhpScriptsToModels($path));
                        break;
                    case"views":
                        file_put_contents($path_mvc . "/" . $name_folder . "/v{$path}.php", $this->AddPhpScriptsToView($path));
                        break;
                }
            }
        }
        return 1;
    }

    private function AddPhpScriptsToAutoload() {
        return'<?php
    spl_autoload_register(function($className){return autoload($className,dirname(__DIR__));});
    ///Add_Path(__DIR__,"ModuleName_fmvc");;
?>';
    }

    private function AddPhpScriptsToConfig($name) {
        return'<?php 
namespace Kidswork;

class f' . $name . '{
    
    public function __construct() {
        
    }

    public $struct_start = null;
    public $struct = null;
    public $struct_array = array();
    public $struct_end = null;
    public $controllers_array = array();
    
    public function get_struct_start() {
        return $this->struct_start;
    }

    public function get_struct() {
        return $this->struct;
    }

    public function get_struct_array() {
        return $this->struct_array;
    }

    public function get_struct_end() {
        return $this->struct_end;
    }

    public function get_controllers_array() {
        return $this->controllers_array;
    }

    public function set_struct_start($struct_start) {
        $this->struct_start = $struct_start;
    }

    public function set_struct($struct) {
        $this->struct = $struct;
    }

    public function set_struct_array($struct_array) {
        $this->struct_array = $struct_array;
    }

    public function set_struct_end($struct_end) {
        $this->struct_end = $struct_end;
    }

    public function set_controllers_array($controllers_array) {
        $this->controllers_array = $controllers_array;
    }

    public function add_struct_array($struct_array, $struct_name = null) {
        $this->struct_array[$struct_name] = $struct_array;
    }
    
    public function add_controllers_array($controllers_class) {
        $this->controllers_array[get_class($controllers_class)] = $controllers_class;
    }
        
    function get_final_struct() {
        return $this->struct_start . $this->struct . implode("", $this->struct_array) .  $this->struct_end;
    }
}

?>';
    }

    private function AddPhpScriptsToControllers($name) {
        return'<?php 
namespace Kidswork;

class c' . $name . ' extends m' . $name . ' {
    
    //<editor-fold defaultstate="collapsed" desc="$f' . $name . '">
    public $f' . $name . ';

    public function get_f' . $name . '() {
        return $this->f' . $name . ';
    }

    public function set_f' . $name . '($f' . $name . ') {
        $this->f' . $name . ' = $f' . $name . ';
    }

    //</editor-fold>        

    public function __construct($f' . $name . ' = NULL) {
        if ($f' . $name . ' == NULL) {
            $this->f' . $name . ' = new f' . $name . '();
        } else {
            $this->f' . $name . ' = $f' . $name . ';
        }
    }

    function Init($fControllers=null) {
        if ($fControllers != NULL) {
            if (!is_array($fControllers)) {
                $this->get_f' . $name . '()->add_controllers_array($fControllers);
            }else{
                foreach ($fControllers as $fController) {
                    $this->get_f' . $name . '()->add_controllers_array($fController);
                }
            }
        }
        return $this->get_f' . $name . '()->get_final_struct();
    }

    function Init_Full($fSite) {
        
    }

    function Init_Ajax($fSite) {
        
    }
}

?>';
    }

    private function AddPhpScriptsToModels($name) {
        return'<?php 
namespace Kidswork;

class m' . $name . '{
    
    
}

?>';
    }

    private function AddPhpScriptsToView($name) {
        return'<?php 
namespace Kidswork;

class v' . $name . '{
    
    static function Init(){
    
    }
    
    static function Init_Full(){
    
    }
    
    static function Init_Ajax(){
    
    }
    
}

?>';
    }

}

$s = new structure();
if (isset($_GET["name"])) {
    if ($_GET["name"] != "") {
        if ($s->createMvc($_GET["name"]) == 1) {
            echo 'MVC "' . $_GET["name"] . '_mvc" успешно создано!';
        };
    } else {
        echo '<head><meta charset="UTF-8"></head>Задайте имя mvc типа: ?name=text';
    }
} else {
    echo '<head><meta charset="UTF-8">Задайте имя mvc типа: ?name=text';
}
?>