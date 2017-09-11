<?php
namespace Kidswork;

require_once __DIR__ . "/kidswork_fmvc/configs/fVariable.php";
require_once __DIR__ . "/kidswork_fmvc/configs/fConfigs.php";
require_once __DIR__ . "/kidswork_fmvc/configs/fKidswork.php";
require_once __DIR__ . "/kidswork_fmvc/models/mModels.php";
require_once __DIR__ . "/kidswork_fmvc/models/mKidswork.php";
require_once __DIR__ . "/kidswork_fmvc/controllers/cKidswork.php";
require_once __DIR__ . "/kidswork_fmvc/views/vKidswork.php";

class Configs
{
    public $pdo_dsn = 'mysql:dbname=dbr_kir_front;host=127.0.0.1';
    public $pdo_username = 'root';
    public $pdo_password = '123';
    public $admin_key = 'daler';
    public $session_key = '1';

    function __construct()
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }
    }
}
