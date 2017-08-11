<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mFraud extends mModels
{
    public $fFraud;
    public $cRouter;
    public $ffraud;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fFraud = new fFraud();
        $this->fConfig = $this->fFraud;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fFraud);
    }

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud'));
        $db->query_column_names->set(array("id"));
        $this->cDatabase->Operation();
    }
    
    function Select_Fraud_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud', 'fraud_actions'));
        $db->query_column_names->set(array('fraud.id as id_fraud', 'id_fraud_attr','fraud.date1', 'fraud.id_fraud_actions', 'fraud.`desc`', "fraud_actions.name as name_fraud_actions"));
        $db->add_query_conditions('', 'fraud.id', '=', $this->fFraud->get()->id->get(), '', 'int', 'AND');
        $db->add_query_conditions('', 'fraud.id_fraud_actions', '=', "fraud_actions.id", '', 'con', '');
        $this->cDatabase->Operation();
    }

    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('fraud'));
        $db->add_query_parameters('id_fraud_attr', '=', $this->fFraud->get()->id_fraud_attr->get(), 'int');
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fFraud->get()->date1->get()), 'str');
        $db->add_query_parameters('id_fraud_actions', '=', $this->fFraud->get()->id_fraud_actions->get(), 'int');
        $db->add_query_parameters('desc', '=', $this->fFraud->get()->desc->get(), 'str');
        $this->cDatabase->Operation();
    }

    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array('fraud'));
        $db->add_query_parameters('id_fraud_attr', '=', $this->fFraud->get()->id_fraud_attr->get(), 'int');
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fFraud->get()->date1->get()), 'str');
        $db->add_query_parameters('id_fraud_actions', '=', $this->fFraud->get()->id_fraud_actions->get(), 'int');
        $db->add_query_parameters('desc', '=', $this->fFraud->get()->desc->get(), 'str');
        $db->add_query_conditions('', 'id', '=', $this->fFraud->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array('fraud'));
        $db->add_query_conditions('', 'id', '=', $this->fFraud->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }
        


}