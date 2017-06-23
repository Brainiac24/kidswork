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


    private function AddPhpScriptsToConfig($name) {
        return'<?php

namespace Kidswork;

class f'.$name.' extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }
}';
    }

    private function AddPhpScriptsToControllers($name) {
        return'<?php
namespace Kidswork;


class c'.$name.' extends m'.$name.'
{
    

    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init()
    {
        return $this;
    }

    function Init_Full($fSite)
    {
    }

    function Init_Ajax($fSite)
    {
    }

    public function Render()
    {
        return $this->f'.$name.'->get_final_struct();
    }
}
';
    }

    private function AddPhpScriptsToModels($name) {
        return'<?php
namespace Kidswork;

class m'.$name.'
{
    public $f'.$name.';

    public function __construct($cKidswork)
    {
        $this->f'.$name.' = new f'.$name.'();
        //$cKidswork->Import($this->f'.$name.');
    }
}';
    }

    private function AddPhpScriptsToView($name) {
        return'<?php 
namespace Kidswork;
    
class v'.$name.'{
    
    function Init(){
    
    }
    
}';
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