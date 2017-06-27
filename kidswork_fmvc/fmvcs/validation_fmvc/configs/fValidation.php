<?php

namespace Kidswork;

class fValidation extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }

    function Init() {
        
    }

    private $errors = array();
    private $messages = array();
    private $variable = NULL;
    private $conditions = NULL;
    private $value = NULL;
    private $mode = NULL;

    function get_errors() {
        return $this->errors;
    }

    function get_messages() {
        return $this->messages;
    }

    function set_errors($errors) {
        $this->errors = $errors;
    }

    function add_errors($key, $value) {
        $this->errors[$key] = $value;
    }

    function set_messages($messages) {
        $this->messages = $messages;
    }

    function get_message($col_name = '') {
        $res = $col_name;
        if (isset($this->messages[$col_name])) {
            $res = $this->messages[$col_name];
        }
        return $res;
    }

    function get_conditions() {
        return $this->conditions;
    }

    function get_mode() {
        return $this->mode;
    }

    function set_conditions($conditions) {
        $this->conditions = $conditions;
    }

    function set_mode($mode) {
        $this->mode = $mode;
    }

    function get_variable() {
        return $this->variable;
    }

    function set_variable($variable) {
        $this->variable = $variable;
    }

    function get_value() {
        return $this->value;
    }

    function set_value($value) {
        $this->value = $value;
    }



}