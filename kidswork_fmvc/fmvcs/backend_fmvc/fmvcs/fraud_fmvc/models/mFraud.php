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


    function Select_Fraud_To_Table()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud', 'fraud_attr', 'fraud_actions', 'divisions_filial', 'divisions_mhb','divisions_otdel','business_line','risk_category','risk_factor','loss_type','currency_rates','currency'));
        $db->query_column_names->set(array(
            "fraud.id AS id_fraud",
            "fraud_attr.date1 AS date1",
            "fraud_attr.id AS id_fraud_attr",
            "divisions_filial.`name` AS name_divisions_filial",
            "divisions_mhb.`name` AS name_divisions_mhb",
            "divisions_otdel.`name` AS name_divisions_otdel",
            "business_line.`name` AS name_business_line",
            "risk_category.`name` AS name_risk_category",
            "risk_factor.`name` AS name_risk_factor",
            "loss_type.`name` AS name_loss_type",
            "fraud_attr.loss_amount_base AS loss_amount_base",
            "fraud_attr.loss_amount_current AS loss_amount_current",
            "fraud_attr.loss_amount_restored AS loss_amount_restored",
            "fraud_attr.loss_amount_fact AS loss_amount_fact",
            "currency.`name` AS name_currency",
            "currency_rates.`rate` AS rate",
            "fraud_attr.loss_amount_base AS loss_amount_base_tjs",
            "fraud_attr.loss_amount_current AS loss_amount_current_tjs",
            "fraud_attr.loss_amount_restored AS loss_amount_restored_tjs",
            "fraud_attr.loss_amount_fact AS loss_amount_fact_tjs",
            "fraud_attr.responsible_person AS responsible_person",
            "fraud_attr.`desc` AS desc_fraud_attr",
            "fraud.date1 as date_fraud",
            "fraud_actions.name as name_fraud_action",
            "fraud.desc as desc_fraud",
            "fraud_attr.`id_divisions_filial`",
            "fraud_attr.`id_divisions_mhb`",
            "fraud_attr.`id_divisions_otdel`",
            "fraud_attr.`id_business_line`",
            "fraud_attr.`id_risk_category`",
            "fraud_attr.`id_risk_factor`",
            "fraud_attr.`id_loss_type`",
            "fraud_attr.`id_currency_rates` AS id_currency_rates"
        ));
        $db->add_query_conditions('', 'fraud.id_fraud_attr', '=', 'fraud_attr.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud.id_fraud_actions', '=', 'fraud_actions.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_filial', '=', 'divisions_filial.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_mhb', '=', 'divisions_mhb.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_otdel', '=', 'divisions_otdel.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_business_line', '=', 'business_line.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_category', '=', 'risk_category.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_factor', '=', 'risk_factor.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_loss_type', '=', 'loss_type.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_currency_rates', '=', 'currency_rates.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'currency_rates.id_currency', '=', 'currency.id', '', 'con', '');
        $this->cDatabase->Operation();
    }
        


}