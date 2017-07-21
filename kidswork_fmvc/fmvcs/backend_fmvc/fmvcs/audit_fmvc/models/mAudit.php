<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mAudit extends mModels
{
    public $fAudit;

    public function __construct($cKidswork)
    {
        $this->fAudit = new fAudit();
        $this->fConfig = $this->fAudit;
        parent::__construct($cKidswork);
        //$cKidswork->Import($this->fNews);
        
        
        
    }

    function Init($fClass = null)
    {
        parent::Init($this->fAudit);
    }

     function Insert() {
         $cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $db = $cDatabase->fDatabase->get();
        $cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('audit'));
        $db->add_query_parameters('id_divisions', '=', $this->fAudit->get()->id_divisions->get(), 'int');
        $db->add_query_parameters('date1', '=', $cDatabase->Convert_Date_To_Mysql($this->fAudit->get()->date1->get()), 'str');
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
        $cDatabase->Operation();
    }


    

}