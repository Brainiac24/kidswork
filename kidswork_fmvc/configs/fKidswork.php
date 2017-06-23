<?php

namespace Kidswork;

class fKidswork
{

    private $pdo_dsn = 'mysql:dbname=dbr_limits;host=127.0.0.1';
    private $pdo_username = 'root';
    private $pdo_password = '123';
    private $admin_key = 'daler';
    private $session_key = '1';

    private $fmvc_array = array('backend_fmvc'=>"\\Kidswork\\Backend\\");
    public $path = __DIR__;
    public $struct_start = null;
    public $struct = null;
    public $struct_end = null;
    public $struct_array = array();
    public $controllers_array = array();
    

    function __construct()
    {
        
    }

    public function get_pdo_dsn()
    {
        return $this->pdo_dsn;
    }

    public function get_pdo_username()
    {
        return $this->pdo_username;
    }

    public function get_pdo_password()
    {
        return $this->pdo_password;
    }

    public function get_admin_key()
    {
        return $this->admin_key;
    }

    public function get_session_key()
    {
        return $this->session_key;
    }

    public function get_fmvc_array()
    {
        return $this->fmvc_array;
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

    public function add_struct_array($struct_array, $struct_name = null)
    {
        $this->struct_array[$struct_name] = $struct_array;
    }
    
    public function add_controllers_array($controllers_class, $controllers_res)
    {
        //echo $controllers_res."----";
        $this->controllers_array[$controllers_class] = $controllers_res;
    }
        
    function get_final_struct()
    {
        return $this->struct_start . $this->struct . implode("", $this->struct_array) .  $this->struct_end;
    }

    
}
