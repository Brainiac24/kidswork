<?php
namespace Kidswork;

class fVariable
{
    private $value = null;
    public $fValidation = null;

    public function __construct($default = null)
    {

        

        $this->value = $default;
        if (\is_array($default)) {
            /*echo "<pre>";
            \var_dump($default);
            echo "</pre>";*/
            isset($default["value"]) ? $this->value = $default["value"] : null;
            isset($default["validation"]) ? $this->fValidation = (new \Kidswork\cValidation())->Var_Init($default["validation"]) : null;
        }




    }

    public function get()
    {
        return $this->value;
    }
    public function set($value)
    {
        $this->value = $value;
    }
    function con($value)
    {
        $this->value .= $value;
    }
    function add($name, $value = "-none-")
    {
        $value == "-none-" ? $this->value[] = $name : $this->value[$name] = $value;
    }
    function ext($col_name)
    {
        return isset($this->value[$col_name]) ? $this->value[$col_name] : null;
    }
}