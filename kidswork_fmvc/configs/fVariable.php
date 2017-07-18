<?php
namespace Kidswork;

class fVariable
{
    private $value;
    private $validation;

    public function get()
    {
        return $this->value;
    }
    public function set($value)
    {
        $this->value = $value;
    }
    function add_arr($name, $value)
    {
        $this->value[$name] = $value;
    }
    function add_arr_2($value)
    {
        $this->value[] = $value;
    }
    function get_arr($col_name)
    {
        return isset($this->value[$col_name]) ? $this->value[$col_name] : null;
    }
    public function get_validation()
    {
        return $this->validation;
    }
    public function set_validation($validation)
    {
        $this->validation = $validation;
    }
}