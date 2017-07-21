<?php
    
namespace Kidswork;

class mKidswork
{

    public $fKidswork;
    
    public $ctrls_global;
    public $ctrls;

    function __construct($fKidswork = null)
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }

        if ($fKidswork == null) {
            $this->fKidswork->set(new fKidswork());
        } else {
            $this->fKidswork->set($fKidswork);
        }
        
        //\var_dump($this->Import($this->fKidswork));
        
        $this->ctrls = ($this->Import($this->fKidswork));
        

    }
    //----------------------------------------------

    function Init($fClass=null)
    {
        $controllers_arr = $this->ctrls->get();
        foreach ($controllers_arr as $controller) {
            $controller->Init($fClass);
        }
    }

    protected function Import($fKidswork, $load = true, $copy = "")
    {
        /*
        echo "<pre>";
        \var_dump($fKidswork);
        echo "</pre>";
        */
        
        $ctrls = (new \Kidswork\fVariable());
        if ($fKidswork->get()->fmvc_array->get() != null) {
            foreach ($fKidswork->get()->fmvc_array->get() as $fmvc_item => $namespase) {
                spl_autoload_register(function ($className) use ($fKidswork) {
                    $this->autoload($className, dirname($fKidswork->get()->path->get()));
                });
                if ($load) {
                    $arr = $this->Construct_Controller($fmvc_item, $namespase, $copy);
                    $ctrls->add($arr[0], $arr[1]);
                }
            }
        }
        return $ctrls;
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
        $fmvc = strtolower(substr("$class", 1, strlen($class)-1));
        //var_dump($className);
        switch ($char) {
            case "f":
                $path = $base_path . "/fmvcs/" . $fmvc . "_fmvc/configs/" . $class . '.php';
                break;
            case "c":
                $path = $base_path . "/fmvcs/" . $fmvc . "_fmvc/controllers/" . $class . '.php';
                //echo $path."-----";
                break;
            case "m":
                $path = $base_path . "/fmvcs/" . $fmvc . "_fmvc/models/" . $class . '.php';
                break;
            case "v":
                $path = $base_path . "/fmvcs/" . $fmvc . "_fmvc/views/" . $class . '.php';
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

    protected function Add_Module($dir, $name_fmvc)
    {
        $path = str_replace("\\", "/", dirname($dir)) . "/fmvcs/" . $name_fmvc . "/configs/fAutoload.php";
        if (file_exists($path)) {
            require_once $path;
        }
    }
    
    protected function Add_Module_2($dir, $name_fmvc)
    {
        $class = ucfirst(strtolower(substr($name_fmvc, 0, strlen($name_fmvc) - 5)));
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_fmvc . "/configs/f" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_fmvc . "/models/m" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_fmvc . "/controllers/c" . $class . ".php";
        $path[] = str_replace("\\", "/", $dir) . "/" . $name_fmvc . "/views/v" . $class . ".php";
        
        for ($i = 0; $i < count($path); $i++) {
            if (file_exists($path[$i])) {
                require_once $path[$i];
            }
        }
    }

    protected function Construct_Controller($name_fmvc, $namespace, $number = "")
    {
        $class = ucfirst(strtolower(substr($name_fmvc, 0, strlen($name_fmvc) - 5)));
        $class_res = "\\".$namespace."\\c" . $class;
        $class_name = "c" .$class.$number;
        $this->ctrls_global->add($class_name, new $class_res($this));
        return array($class_name, $this->ctrls_global->ext($class_name));
    }

    
}
