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
        return $this->struct_start . $this->struct . implode("", $this->struct_array) . $this->struct_end;
    }
}
