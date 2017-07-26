<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mAudit extends mModels
{
    public $fAudit;
    public $cDatabase; 
    public function __construct($cKidswork)
    {
        $this->fAudit = new fAudit();
        $this->fConfig = $this->fAudit;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        parent::Init($this->fAudit);
    }

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('audit'));
        $db->query_column_names->set(array("id"));
        $this->cDatabase->Operation();
    }

     function Select_Ids_Divisions() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions'));
        $db->query_column_names->set(array("id","name"));
        $db->add_query_conditions('', 'id_category', '=', '2', '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Select_Audit_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('audit, divisions'));
        $db->query_column_names->set(array('audit.id AS audit_id', 'divisions.id AS divisions_id', 'audit.id_divisions as id_divisions2','date1','assets','assets_rate','management_1','management_2','management_3','management_rate_1','management_rate_2','management_rate_3','earnings','earnings_rate','turnover','turnover_rate','reglaments','reglaments_rate','projection','projection_rate','risk','risk_rate','total_rate','name'));
        $db->add_query_conditions('', 'audit.id', '=', $this->fAudit->get()->id->get(), '', 'int', 'AND');
        $db->add_query_conditions('', 'audit.id_divisions', '=', 'divisions.id', '', 'con', '');
        $this->cDatabase->Operation();
    }

    function Select_Divisions_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions'));
        $db->query_column_names->set(array("id","name"));
        $db->add_query_conditions('', 'id', '=', $this->fAudit->get()->id_divisions->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }


    function Select_Audit_To_Table() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('audit, divisions'));
        $db->query_column_names->set(array('audit.id AS id_audit', 'date1', 'name', 'assets','assets_rate','management_1','management_2','management_3','management_rate_1','management_rate_2','management_rate_3','earnings','earnings_rate','turnover','turnover_rate','reglaments','reglaments_rate','projection','projection_rate','risk','risk_rate','total_rate'));
        $db->add_query_conditions('', 'audit.id_divisions', '=', 'divisions.id', '', 'con', '');
        $this->cDatabase->Operation();
    }





    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('audit'));
        $db->add_query_parameters('id_divisions', '=', $this->fAudit->get()->id_divisions->get(), 'int');
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fAudit->get()->date1->get()), 'str');
        $db->add_query_parameters('assets', '=', $this->fAudit->get()->assets->get(), 'float');
        $db->add_query_parameters('assets_rate', '=', $this->fAudit->get()->assets_rate->get(), 'float');
        $db->add_query_parameters('management_1', '=', $this->fAudit->get()->management_1->get(), 'float');
        $db->add_query_parameters('management_2', '=', $this->fAudit->get()->management_2->get(), 'float');
        $db->add_query_parameters('management_3', '=', $this->fAudit->get()->management_3->get(), 'float');
        $db->add_query_parameters('management_rate_1', '=', $this->fAudit->get()->management_rate_1->get(), 'float');
        $db->add_query_parameters('management_rate_2', '=', $this->fAudit->get()->management_rate_2->get(), 'float');
        $db->add_query_parameters('management_rate_3', '=', $this->fAudit->get()->management_rate_3->get(), 'float');
        $db->add_query_parameters('earnings', '=', $this->fAudit->get()->earnings->get(), 'float');
        $db->add_query_parameters('earnings_rate', '=', $this->fAudit->get()->earnings_rate->get(), 'float');
        $db->add_query_parameters('turnover', '=', $this->fAudit->get()->turnover->get(), 'float');
        $db->add_query_parameters('turnover_rate', '=', $this->fAudit->get()->turnover_rate->get(), 'float');
        $db->add_query_parameters('reglaments', '=', $this->fAudit->get()->reglaments->get(), 'float');
        $db->add_query_parameters('reglaments_rate', '=', $this->fAudit->get()->reglaments_rate->get(), 'float');
        $db->add_query_parameters('projection', '=', $this->fAudit->get()->projection->get(), 'float');
        $db->add_query_parameters('projection_rate', '=', $this->fAudit->get()->projection_rate->get(), 'float');
        $db->add_query_parameters('risk', '=', $this->fAudit->get()->risk->get(), 'float');
        $db->add_query_parameters('risk_rate', '=', $this->fAudit->get()->risk_rate->get(), 'float');
        $db->add_query_parameters('total_rate', '=', $this->fAudit->get()->total_rate->get(), 'float');
        $this->cDatabase->Operation();
    }

    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array('audit'));
        $db->add_query_parameters('id_divisions', '=', $this->fAudit->get()->id_divisions->get(), 'int');
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fAudit->get()->date1->get()), 'str');
        $db->add_query_parameters('assets', '=', $this->fAudit->get()->assets->get(), 'float');
        $db->add_query_parameters('assets_rate', '=', $this->fAudit->get()->assets_rate->get(), 'float');
        $db->add_query_parameters('management_1', '=', $this->fAudit->get()->management_1->get(), 'float');
        $db->add_query_parameters('management_2', '=', $this->fAudit->get()->management_2->get(), 'float');
        $db->add_query_parameters('management_3', '=', $this->fAudit->get()->management_3->get(), 'float');
        $db->add_query_parameters('management_rate_1', '=', $this->fAudit->get()->management_rate_1->get(), 'float');
        $db->add_query_parameters('management_rate_2', '=', $this->fAudit->get()->management_rate_2->get(), 'float');
        $db->add_query_parameters('management_rate_3', '=', $this->fAudit->get()->management_rate_3->get(), 'float');
        $db->add_query_parameters('earnings', '=', $this->fAudit->get()->earnings->get(), 'float');
        $db->add_query_parameters('earnings_rate', '=', $this->fAudit->get()->earnings_rate->get(), 'float');
        $db->add_query_parameters('turnover', '=', $this->fAudit->get()->turnover->get(), 'float');
        $db->add_query_parameters('turnover_rate', '=', $this->fAudit->get()->turnover_rate->get(), 'float');
        $db->add_query_parameters('reglaments', '=', $this->fAudit->get()->reglaments->get(), 'float');
        $db->add_query_parameters('reglaments_rate', '=', $this->fAudit->get()->reglaments_rate->get(), 'float');
        $db->add_query_parameters('projection', '=', $this->fAudit->get()->projection->get(), 'float');
        $db->add_query_parameters('projection_rate', '=', $this->fAudit->get()->projection_rate->get(), 'float');
        $db->add_query_parameters('risk', '=', $this->fAudit->get()->risk->get(), 'float');
        $db->add_query_parameters('risk_rate', '=', $this->fAudit->get()->risk_rate->get(), 'float');
        $db->add_query_parameters('total_rate', '=', $this->fAudit->get()->total_rate->get(), 'float');
        $db->add_query_conditions('', 'id', '=', $this->fAudit->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array('audit'));
        $db->add_query_conditions('', 'id', '=', $this->fAudit->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }


    

}