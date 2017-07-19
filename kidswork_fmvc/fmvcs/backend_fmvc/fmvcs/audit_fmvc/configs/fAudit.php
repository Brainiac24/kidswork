<?php
namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fAudit extends fConfigs
{
    protected $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    protected $id = array("validation" => array("id" => array("rules" => array(0 => "int|required", 2 => ""))));
    protected $id_divisions = array("validation" => array("id_divisions" => array("rules" => array(0 => "int", 2 => "required", 3 => "required"))));
    protected $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str", 2 => "required", 3 => "required"))));
    protected $assets = array("validation" => array("assets" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $assets_rate = array("validation" => array("assets_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_1 = array("validation" => array("management_1" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_2 = array("validation" => array("management_2" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_3 = array("validation" => array("management_3" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_rate_1 = array("validation" => array("management_rate_1" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_rate_2 = array("validation" => array("management_rate_2" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $management_rate_3 = array("validation" => array("management_rate_3" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $earnings = array("validation" => array("earnings" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $earnings_rate = array("validation" => array("earnings_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $turnover = array("validation" => array("turnover" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $turnover_rate = array("validation" => array("turnover_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $reglaments = array("validation" => array("reglaments" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $reglaments_rate = array("validation" => array("reglaments_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $projection = array("validation" => array("projection" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $projection_rate = array("validation" => array("projection_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $risk = array("validation" => array("risk" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $risk_rate = array("validation" => array("risk_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));
    protected $total_rate = array("validation" => array("total_rate" => array("rules" => array(0 => "float", 2 => "required", 3 => "required"))));

    function __construct()
    {
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
         */
    }

}