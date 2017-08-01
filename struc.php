<?php

class structure
{

    private $namespace2 = "\Backend";
    private $folders = array("configs", "controllers", "models", "views", "fmvcs");

    public function createMvc($path)
    {
        $path = trim($path);
        if (is_null($path)) {
            return false;
        }
        $path_mvc = $path . "_fmvc";
        if (!file_exists($path_mvc)) {
            mkdir($path_mvc);
        }
        $path = ucfirst($path);

        foreach ($this->folders as $name_folder) {
            if (!file_exists($path_mvc . "/" . $name_folder)) {
                mkdir($path_mvc . "/" . $name_folder);
                switch ($name_folder) {
                    case "configs":
                        file_put_contents($path_mvc . "/" . $name_folder . "/f{$path}.php", $this->AddPhpScriptsToConfig($path));
                        break;
                    case "controllers":
                        file_put_contents($path_mvc . "/" . $name_folder . "/c{$path}.php", $this->AddPhpScriptsToControllers($path));
                        break;
                    case "models":
                        file_put_contents($path_mvc . "/" . $name_folder . "/m{$path}.php", $this->AddPhpScriptsToModels($path));
                        break;
                    case "views":
                        file_put_contents($path_mvc . "/" . $name_folder . "/v{$path}.php", $this->AddPhpScriptsToView($path));
                        break;
                }
            }
        }
        return 1;
    }




    private function AddPhpScriptsToConfig($name)
    {
        return'<?php

namespace Kidswork'.$this->namespace2.';

use \Kidswork\fConfigs;

class f'.$name.' extends fConfigs
{
    //public $VAR = array("validation" => array("VAR" => array("rules" => array(0 => "int|required"))));
    function __construct()
    {
        parent::__construct();
        //$this->fmvc_array->add("NAME_fmvc", "Kidswork\Backend");
        //$this->path->set(__DIR__);
        
    }
}';
    }

    private function AddPhpScriptsToControllers($name)
    {
        return'<?php
namespace Kidswork'.$this->namespace2.';


class c'.$name.' extends m'.$name.'
{
    private $cHtml = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->f'.$name.'->get()->final_struct();
    }
}
';
    }

    private function AddPhpScriptsToModels($name)
    {
        return'<?php
namespace Kidswork'.$this->namespace2.';

use \Kidswork\mModels;

class m'.$name.' extends mModels
{
    public $f'.$name.';
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->f'.$name.' = new f'.$name.'();
        $this->fConfig = $this->f'.$name.';
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->f'.$name.');
    }

}';
    }

    private function AddPhpScriptsToView($name)
    {
        return'<?php 
namespace Kidswork'.$this->namespace2.';
    
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
            echo 'MVC "' . $_GET["name"] . '_fmvc" успешно создано!';
        };
    } else {
        echo '<head><meta charset="UTF-8"></head>Задайте имя mvc типа: ?name=text';
    }
} else {
    echo '<head><meta charset="UTF-8">Задайте имя mvc типа: ?name=text';
}
