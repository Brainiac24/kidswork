<?php
    
namespace Kidswork;

class mKidswork
{

    protected $fKidswork;

    protected function __construct($fKidswork = null)
    {
        if ($fKidswork == null) {
            $this->fKidswork = new fKidswork();
        } else {
            $this->fKidswork = $fKidswork;
        }
        $this->Import($this->fKidswork);
    }
    //----------------------------------------------

    protected function Import($fKidswork, $init = true, $number = "")
    {
        if ($fKidswork->get_fmvc_array() != null) {
            foreach ($fKidswork->get_fmvc_array() as $fmvc_item => $namespase) {
                spl_autoload_register(function ($className) use ($fKidswork) {
                    return $this->autoload($className, dirname($fKidswork->get_path()));
                });
                if ($init) {
                    $this->Construct_Controller($fmvc_item, $namespase, $number);
                }
            }
        }
    }

    protected function autoload($className, $base_path)
    {
        $path = "";
        $pos = strrpos($className, '\\');
        if ($pos>0) {
            $class = substr($className, $pos + 1);
        } else {
            $class = substr($className, $pos);
        }
        $char = substr($class, 0, 1);
        $mvc = strtolower(substr("$class", 1, strlen($class)-1));
        //var_dump($className);
        switch ($char) {
            case "f":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/configs/" . $class . '.php';
                break;
            case "c":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/controllers/" . $class . '.php';
                //echo $path."-----";
                break;
            case "m":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/models/" . $class . '.php';
                break;
            case "v":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/views/" . $class . '.php';
                break;
            default:
                break;
        }
        if (!file_exists($path)) {
            return false;
        } else {
            require_once $path;
        }
    }

    protected function Add_Module($dir, $name_mvc)
    {
        $path = str_replace("\\", "/", dirname($dir)) . "/fmvcs/" . $name_mvc . "/configs/fAutoload.php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
    
    protected function Add_Module_2($dir, $name_mvc)
    {
        $class = ucfirst(strtolower(substr($name_mvc, 0, strlen($name_mvc) - 5)));
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_mvc . "/configs/f" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_mvc . "/models/m" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_mvc . "/controllers/c" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_mvc . "/views/v" . $class . ".php";
        
        for ($i = 0; $i < count($path); $i++) {
            if (file_exists($path[$i])) {
                require_once $path[$i];
            }
        }
    }

    protected function Construct_Controller($name_mvc, $namespace, $number = "")
    {
        $class = ucfirst(strtolower(substr($name_mvc, 0, strlen($name_mvc) - 5)));
        $class_res = "\\".$namespace."\\c" . $class;
        $class_name = "c" .$class.$number;
        $this->fKidswork->add_controllers_array($class_name, new $class_res($this));
        
    }
}
