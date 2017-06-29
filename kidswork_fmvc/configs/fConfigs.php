<?php

namespace Kidswork;

class fConfigs
{
    private $fmvc_array = array();
    private $path = null;
    private $struct_start = null;
    private $struct = null;
    private $struct_end = null;
    private $struct_array = array();
    private $controllers_array = array();
    private $configs = null;
    private $router_rules = array();
    private $columns = NULL;

    function get_columns() {
        return $this->columns;
    }

    function set_columns($columns) {
        $this->columns = $columns;
    }

    function add_column($name, $value) {
        if (!isset($this->columns[$name])) {
            $this->columns[$name] = $value;
        }
    }

    function get_column($col_name = '') {
        $res = $col_name;
        if (isset($this->columns[$col_name])) {
            $res = $this->columns[$col_name];
        }
        return $res;
    }

    public function get_configs()
    {
        return $this->configs;
    }

    function __construct()
    {
    }

    public function get_router_rules() {
        return $this->router_rules;
    }
    public function set_router_rules($router_rules) {
        $this->router_rules = $router_rules;
    }
    public function add_router_rules($router_name,$router_rule) {
        $this->router_rules[$router_name] = $router_rule;
    }
    public function get_fmvc_array()
    {
        return $this->fmvc_array;
    }

    public function set_fmvc_array($fmvc_array)
    {
        $this->fmvc_array = $fmvc_array;
    }
    
    public function get_struct_start()
    {
        return $this->struct_start;
    }

    public function get_struct()
    {
        return $this->struct;
    }

    public function get_struct_array()
    {
        return $this->struct_array;
    }

    public function get_struct_end()
    {
        return $this->struct_end;
    }

    public function get_controllers_array()
    {
        return $this->controllers_array;
    }

    public function get_path()
    {
        return $this->path;
    }

    public function set_struct_start($struct_start)
    {
        $this->struct_start = $struct_start;
    }

    public function set_struct($struct)
    {
        $this->struct = $struct;
    }

    public function add_struct($struct)
    {
        $this->struct .= $struct;
    }

    public function set_path($path)
    {
        $this->path = $path;
    }

    public function set_struct_array($struct_array)
    {
        $this->struct_array = $struct_array;
    }

    public function set_struct_end($struct_end)
    {
        $this->struct_end = $struct_end;
    }

    public function set_controllers_array($controllers_array)
    {
        $this->controllers_array = $controllers_array;
    }

    public function add_named_struct_array($struct_array, $struct_name)
    {
        $this->struct_array[$struct_name] = $struct_array;
    }

    public function add_struct_array($struct_array)
    {
        $this->struct_array[] = $struct_array;
    }
    
    public function add_controllers_array($controllers_class, $controllers_res)
    {
        $this->controllers_array[$controllers_class] = $controllers_res;
    }
        
    function get_final_struct()
    {
        return $this->struct_start . $this->struct . implode("", $this->struct_array) . $this->struct_end;
    }
}
