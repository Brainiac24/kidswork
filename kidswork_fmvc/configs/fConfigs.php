<?php
namespace Kidswork;

class fConfigs
{
    public $fmvc_array = null;
    public $path = null;
    public $struct_start = null;
    public $struct = null;
    public $struct_end = null;
    public $struct_array = null;
    public $validation = null;

    function __construct()
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }
    }

    function Init($vars)
    {
        
    }

    function get_final_struct()
    {
        $res="";
        $res .= $this->struct_start->get();
        $res .= $this->struct->get();
        $res .= $this->struct_array->get() !== null ? implode("", $this->struct_array->get()) : "";
        $res .= $this->struct_end->get();
        
        return $res;
    }
}
