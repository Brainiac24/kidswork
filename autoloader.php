<?php

    //----------Paste here additional paths-------------------
    //spl_autoload_register(function($className){return autoload($className,dirname(__DIR__));});
Add_Module_2(__DIR__, "kidswork_fmvc", "");
if (file_exists(__DIR__."/fConfigs.php")) {
    require_once __DIR__."/fConfigs.php";
}
    //----------

function autoload($className, $base_path)
{
        
    $path = "";
    $class = substr($className, strrpos($className, '\\') + 1);
    $char = substr($class, 0, 1);
        
    //$fmvc = strtolower(substr($class, 1, strlen($class)-1));
        
    switch ($char) {
        case "f":
            $path = $base_path  . "/configs/"  . $class . '.php';
            break;
        case "c":
            $path = $base_path . "/controllers/"  . $class . '.php';
            echo $path. "------";
            break;
        case "m":
            $path = $base_path . "/models/"  . $class . '.php';
            break;
        case "v":
            $path = $base_path . "/views/"  . $class . '.php';
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

function Add_Module($dir, $name_mvc)
{
    $path = str_replace("\\", "/", dirname($dir)) . "/fmvcs/" . $name_mvc . "/configs/fAutoload.php";
    echo $path.'<br>';
    if (file_exists($path)) {
        require_once $path;
    }
}
    
function Add_Module_2($dir, $name_mvc)
{
    $path = str_replace("\\", "/", $dir)."/" . $name_mvc . "/configs/fAutoload.php";
    //echo $path.'<br>';
    if (file_exists($path)) {
        require_once $path;
    }
}
