<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fAudit extends fConfigs
{
    private $fmvc_array = array();

    private $data_mode = null;
    private $id = null;
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

        $this->add_router_rules("data_mode","int");
        $this->add_router_rules("data_mode", "int");
        $this->add_router_rules("id_select", "int|required");
        $this->add_router_rules("id_insert", "int");
        $this->add_router_rules("id_update", "int|required");
        $this->add_router_rules("id_delete", "int|required");
        $this->add_router_rules("id_divisions", "int");
        $this->add_router_rules("date", "str");
        $this->add_router_rules("assets", "float|required");
        $this->add_router_rules("assets_rate", "float|required");
        $this->add_router_rules("management_1", "float|required");
        $this->add_router_rules("management_2", "float|required");
        $this->add_router_rules("management_3", "float|required");
        $this->add_router_rules("management_rate_1", "float|required");
        $this->add_router_rules("management_rate_2", "float|required");
        $this->add_router_rules("management_rate_3", "float|required");
        $this->add_router_rules("earnings", "float|required");
        $this->add_router_rules("earnings_rate", "float|required");
        $this->add_router_rules("turnover", "float|required");
        $this->add_router_rules("turnover_rate", "float|required");
        $this->add_router_rules("reglaments", "float|required");
        $this->add_router_rules("reglaments_rate", "float|required");
        $this->add_router_rules("projection", "float|required");
        $this->add_router_rules("projection_rate", "float|required");
        $this->add_router_rules("risk", "float|required");
        $this->add_router_rules("risk_rate", "float|required");
        $this->add_router_rules("total_rate", "float|required");
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */



    }
    
    function get_fmvc_array() {
        return $this->fmvc_array;
    }

    function get_data_mode() {
        return $this->data_mode;
    }

    function get_id() {
        return $this->id;
    }

    function get_id_divisions() {
        return $this->id_divisions;
    }

    function get_date1() {
        return $this->date1;
    }

    function get_assets() {
        return $this->assets;
    }

    function get_assets_rate() {
        return $this->assets_rate;
    }

    function get_management_1() {
        return $this->management_1;
    }

    function get_management_2() {
        return $this->management_2;
    }

    function get_management_3() {
        return $this->management_3;
    }

    function get_management_rate_1() {
        return $this->management_rate_1;
    }

    function get_management_rate_2() {
        return $this->management_rate_2;
    }

    function get_management_rate_3() {
        return $this->management_rate_3;
    }

    function get_earnings() {
        return $this->earnings;
    }

    function get_earnings_rate() {
        return $this->earnings_rate;
    }

    function get_turnover() {
        return $this->turnover;
    }

    function get_turnover_rate() {
        return $this->turnover_rate;
    }

    function get_reglaments() {
        return $this->reglaments;
    }

    function get_reglaments_rate() {
        return $this->reglaments_rate;
    }

    function get_projection() {
        return $this->projection;
    }

    function get_projection_rate() {
        return $this->projection_rate;
    }

    function get_risk() {
        return $this->risk;
    }

    function get_risk_rate() {
        return $this->risk_rate;
    }

    function get_total_rate() {
        return $this->total_rate;
    }

    function set_fmvc_array($fmvc_array) {
        $this->fmvc_array = $fmvc_array;
    }

    function set_data_mode($data_mode) {
        $this->data_mode = $data_mode;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function set_id_divisions($id_divisions) {
        $this->id_divisions = $id_divisions;
    }

    function set_date1($date1) {
        $this->date1 = $date1;
    }

    function set_assets($assets) {
        $this->assets = $assets;
    }

    function set_assets_rate($assets_rate) {
        $this->assets_rate = $assets_rate;
    }

    function set_management_1($management_1) {
        $this->management_1 = $management_1;
    }

    function set_management_2($management_2) {
        $this->management_2 = $management_2;
    }

    function set_management_3($management_3) {
        $this->management_3 = $management_3;
    }

    function set_management_rate_1($management_rate_1) {
        $this->management_rate_1 = $management_rate_1;
    }

    function set_management_rate_2($management_rate_2) {
        $this->management_rate_2 = $management_rate_2;
    }

    function set_management_rate_3($management_rate_3) {
        $this->management_rate_3 = $management_rate_3;
    }

    function set_earnings($earnings) {
        $this->earnings = $earnings;
    }

    function set_earnings_rate($earnings_rate) {
        $this->earnings_rate = $earnings_rate;
    }

    function set_turnover($turnover) {
        $this->turnover = $turnover;
    }

    function set_turnover_rate($turnover_rate) {
        $this->turnover_rate = $turnover_rate;
    }

    function set_reglaments($reglaments) {
        $this->reglaments = $reglaments;
    }

    function set_reglaments_rate($reglaments_rate) {
        $this->reglaments_rate = $reglaments_rate;
    }

    function set_projection($projection) {
        $this->projection = $projection;
    }

    function set_projection_rate($projection_rate) {
        $this->projection_rate = $projection_rate;
    }

    function set_risk($risk) {
        $this->risk = $risk;
    }

    function set_risk_rate($risk_rate) {
        $this->risk_rate = $risk_rate;
    }

    function set_total_rate($total_rate) {
        $this->total_rate = $total_rate;
    }


    

}