<?php
namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fAudit extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $id = array("validation" => array("id" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_divisions = array("validation" => array("id_divisions" => array("rules" => array(0 => "int", 2 => "required", 3 => "required"))));
    public $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str", 2 => "required", 3 => "required"))));
    public $assets = array("validation" => array("assets" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $assets_rate = array("validation" => array("assets_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_1 = array("validation" => array("management_1" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_2 = array("validation" => array("management_2" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_3 = array("validation" => array("management_3" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_rate_1 = array("validation" => array("management_rate_1" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_rate_2 = array("validation" => array("management_rate_2" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $management_rate_3 = array("validation" => array("management_rate_3" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $earnings = array("validation" => array("earnings" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $earnings_rate = array("validation" => array("earnings_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $turnover = array("validation" => array("turnover" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $turnover_rate = array("validation" => array("turnover_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $reglaments = array("validation" => array("reglaments" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $reglaments_rate = array("validation" => array("reglaments_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $projection = array("validation" => array("projection" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $projection_rate = array("validation" => array("projection_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $risk = array("validation" => array("risk" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $risk_rate = array("validation" => array("risk_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    public $total_rate = array("validation" => array("total_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));

    function __construct()
    {
        parent::__construct();
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
         */
    }

}