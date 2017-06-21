<?php 
namespace Kidswork\Backend;

class fBackend{
    
    public function __construct() {
        
    }

    public $struct_start = null;
    public $struct = null;
    public $struct_array = array();
    public $struct_end = null;
    public $controllers_array = array();
    
    public function get_struct_start() {
        return $this->struct_start;
    }

    public function get_struct() {
        return $this->struct;
    }

    public function get_struct_array() {
        return $this->struct_array;
    }

    public function get_struct_end() {
        return $this->struct_end;
    }

    public function get_controllers_array() {
        return $this->controllers_array;
    }

    public function set_struct_start($struct_start) {
        $this->struct_start = $struct_start;
    }

    public function set_struct($struct) {
        $this->struct = $struct;
    }

    public function set_struct_array($struct_array) {
        $this->struct_array = $struct_array;
    }

    public function set_struct_end($struct_end) {
        $this->struct_end = $struct_end;
    }

    public function set_controllers_array($controllers_array) {
        $this->controllers_array = $controllers_array;
    }

    public function add_struct_array($struct_array, $struct_name = null) {
        $this->struct_array[$struct_name] = $struct_array;
    }
    
    public function add_controllers_array($controllers_class) {
        $this->controllers_array[get_class($controllers_class)] = $controllers_class;
    }
        
    function get_final_struct() {
        return $this->struct_start . $this->struct . implode("", $this->struct_array) .  $this->struct_end;
    }
}

?>