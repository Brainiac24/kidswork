<?php
namespace Kidswork;

class fConfigs
{
    protected $vars = null;

    function __construct()
    {
        $this->vars = new \Kidswork\fVariable();
        $this->vars->add_arr("fmvc_array");
        $this->vars->add_arr("path");
        $this->vars->add_arr("struct_start");
        $this->vars->add_arr("struct");
        $this->vars->add_arr("struct_end");
        $this->vars->add_arr("struct_array");
        $this->vars->add_arr("fmvc_array");
        $this->vars->add_arr("fmvc_array");
    }

    function Init($vars)
    {
        foreach ($vars as $key => $value) {
            
           global $$value;
           $$value = (new \Kidswork\fVariable());
           
        }
            
        //$fmvc_array->set("123");
        //\var_dump($fmvc_array->get());

        /*
            echo "<pre>";
            \var_dump($fmvc_array);
            echo "</pre>";
        */

    }


    function get_final_struct()
    {
        return $this->struct_start . $this->struct . implode("", $this->struct_array) . $this->struct_end;
    }
}
