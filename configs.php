<?php

namespace Kidswork;

require_once __DIR__."/kidswork_fmvc/configs/fVariable.php";
require_once __DIR__."/kidswork_fmvc/configs/fConfigs.php";
require_once __DIR__."/kidswork_fmvc/configs/fKidswork.php";
require_once __DIR__."/kidswork_fmvc/models/mModels.php";
require_once __DIR__."/kidswork_fmvc/models/mKidswork.php";
require_once __DIR__."/kidswork_fmvc/controllers/cKidswork.php";
require_once __DIR__."/kidswork_fmvc/views/vKidswork.php";

class Configs
{
    private $pdo_dsn = 'mysql:dbname=dbr_limits;host=127.0.0.1';
    private $pdo_username = 'root';
    private $pdo_password = '123';
    private $admin_key = 'daler';
    private $session_key = '1';

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
}
