<?php
namespace Kidswork;

class fVariable
{
    private $value = null;
    public $fValidation = null;

    public function __construct($default = null)
    {

        /*echo "<pre>";
        \var_dump($default);
        echo "</pre>";*/
        if (!is_array($default)) {
            $this->value = $default;
        }
        else {
            isset($default["value"]) ? $this->value = $default["value"] : NULL;
            isset($default["validation"]) ? $this->fValidation = (new \Kidswork\cValidation())->Var_Init($default["validation"]) : NULL;
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
    function add($name, $value = null)
    {
        $value === null ? $this->value[] = $value : $this->value[$name] = $value;
    }
    function ext($col_name)
    {
        return isset($this->value[$col_name]) ? $this->value[$col_name] : null;
    }
}