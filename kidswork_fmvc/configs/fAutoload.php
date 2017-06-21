<?php
    spl_autoload_register(function($className){return autoload($className,dirname(__DIR__));});
    Add_Module(__DIR__,"backend_fmvc");
?>