<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fAudit extends fConfigs
{
    private $fmvc_array = array();

    private $id_divisions = null;
    private $date1 = null;
    private $assets = null;
    private $assets_rate = null;
    private $management_1 = null;
    private $management_2 = null;
    private $management_3 = null;
    private $management_rate_1 = null;
    private $management_rate_2 = null;
    private $management_rate_3 = null;
    private $earnings = null;
    private $earnings_rate = null;
    private $turnover = null;
    private $turnover_rate = null;
    private $reglaments = null;
    private $reglaments_rate = null;
    private $projection = null;
    private $projection_rate = null;
    private $risk = null;
    private $risk_rate = null;
    private $total_rate = null;
   
    function __construct()
    {
        $this->router_rules["id_select"]="int|required";
        $this->router_rules["id_insert"]="int";
        $this->router_rules["id_update"]="int|required";
        $this->router_rules["id_delete"]="int|required";
        $this->router_rules["id_divisions"]="int";
        $this->router_rules["date"]="str";
        $this->router_rules["assets"]="float|required";
        $this->router_rules["assets_rate"]="float|required";
        $this->router_rules["management_1"]="float|required";
        $this->router_rules["management_2"]="float|required";
        $this->router_rules["management_3"]="float|required";
        $this->router_rules["management_rate_1"]="float|required";
        $this->router_rules["management_rate_2"]="float|required";
        $this->router_rules["management_rate_3"]="float|required";
        $this->router_rules["earnings"]="float|required";
        $this->router_rules["earnings_rate"]="float|required";
        $this->router_rules["turnover"]="float|required";
        $this->router_rules["turnover_rate"]="float|required";
        $this->router_rules["reglaments"]="float|required";
        $this->router_rules["reglaments_rate"]="float|required";
        $this->router_rules["projection"]="float|required";
        $this->router_rules["projection_rate"]="float|required";
        $this->router_rules["risk"]="float|required";
        $this->router_rules["risk_rate"]="float|required";
        $this->router_rules["total_rate"]="float|required";
        $this->set_router_rules($this->router_rules);
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */



    }
}