<?php
    spl_autoload_register(function($className){return autoload($className,dirname(__DIR__));});
    ///Add_Path(__DIR__,"ModuleName_fmvc");;
?>