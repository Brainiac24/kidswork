<?php
    
namespace Kidswork;

class mKidswork
{

    // #region----------------------------------------------
    protected $fKidswork;
    protected function get_fKidswork()
    {
        return $this->fKidswork;
    }
    protected function set_fKidswork($fKidswork)
    {
        $this->fKidswork = $fKidswork;
    }
    //#endregion----------------------------------------------
    protected function __construct($fKidswork = null)
    {
        if ($fKidswork == null) {
            $this->set_fKidswork(new fKidswork());
        } else {
            $this->set_fKidswork($fKidswork);
        }

        if ($this->get_fKidswork()->get_fmvc_array() != null) {
            foreach ($this->get_fKidswork()->get_fmvc_array() as $fmvc_item) {
                spl_autoload_register(function ($className) {
                    return $this->autoload($className, dirname(__DIR__));
                });
            }
        }
    }
    //----------------------------------------------


    protected function autoload($className, $base_path)
    {
        $path = "";
        $class = substr($className, strrpos($className, '\\') + 1);
        $char = substr($class, 0, 1);
        $mvc = strtolower(substr("$class", 1, strlen($class)-1));
        switch ($char) {
            case "f":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/configs/" . $class . '.php';
                break;
            case "c":
                $path = $base_path . "/fmvcs/" . $mvc . "_fmvc/controllers/" . $class . '.php';
                //echo $path;
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
}
