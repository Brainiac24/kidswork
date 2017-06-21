<?php
namespace Kidswork;

class fConfigs extends mAutoloader
{

    private $pdo_dsn = 'mysql:dbname=dbr_limits;host=127.0.0.1';
    private $pdo_username = 'root';
    private $pdo_password = '123';
    private $admin_key = 'daler';
    private $session_key = '1';
    private $fmvc_array = array('kidswork_fmvc');

    function __construct()
    {
        if ($this->get_fmvc_array() != null) {
            foreach ($this->get_fmvc_array() as $fmvc_item) {
                parent::Add_Module_2(__DIR__, $fmvc_item);
            }
        }
    }

    protected function get_pdo_dsn()
    {
        return $this->pdo_dsn;
    }

    protected function get_pdo_username()
    {
        return $this->pdo_username;
    }

    protected function get_pdo_password()
    {
        return $this->pdo_password;
    }

    protected function get_admin_key()
    {
        return $this->admin_key;
    }

    protected function get_session_key()
    {
        return $this->session_key;
    }

    protected function get_fmvc_array()
    {
        return $this->fmvc_array;
    }
}
