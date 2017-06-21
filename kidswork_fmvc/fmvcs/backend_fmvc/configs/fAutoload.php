<?php
    spl_autoload_register(function($className){return autoload($className,dirname(__DIR__),"Kidswork/Backend/"); });
    ///Add_Path(__DIR__,"ModuleName_fmvc");;
?>