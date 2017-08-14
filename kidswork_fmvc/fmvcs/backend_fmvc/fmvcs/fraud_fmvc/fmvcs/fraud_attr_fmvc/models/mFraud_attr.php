<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mFraud_attr extends mModels
{
    public $fFraud_attr;
    public $cRouter;
    public $fAudit;
    public $cDatabase;

    public function __construct($cKidswork)
    {
        $this->fFraud_attr = new fFraud_attr();
        $this->fConfig = $this->fFraud_attr;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fFraud_attr);
    }

    function Select_Ids_Fraud_Attr()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud_attr'));
        $db->query_column_names->set(array("id", "id"));
        $this->cDatabase->Operation();
    }

    function Select_Fraud_Attr_By_Id()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud_attr', 'divisions_filial', 'divisions_mhb','divisions_otdel','business_line','risk_category','risk_factor','loss_type','currency'));
        $db->query_column_names->set(array(
            "fraud_attr.id AS id_fraud_attr",
            "fraud_attr.date1 AS date1",
            "divisions_filial.`name` AS name_divisions_filial",
            "divisions_mhb.`name` AS name_divisions_mhb",
            "divisions_otdel.`name` AS name_divisions_otdel",
            "business_line.`name` AS name_business_line",
            "risk_category.`name` AS name_risk_category",
            "risk_factor.`name` AS name_risk_factor",
            "loss_type.`name` AS name_loss_type",
            "fraud_attr.loss_amount AS loss_amount",
            "divisions_filial.`name` AS name_currency",
            "fraud_attr.loss_amount_tjs AS loss_amount_tjs",
            "fraud_attr.responsible_person AS responsible_person",
            "fraud_attr.`desc` AS desc_fraud_attr",
            "fraud_attr.`id_divisions_filial`",
            "fraud_attr.`id_divisions_mhb`",
            "fraud_attr.`id_divisions_otdel`",
            "fraud_attr.`id_business_line`",
            "fraud_attr.`id_risk_category`",
            "fraud_attr.`id_risk_factor`",
            "fraud_attr.`id_loss_type`",
            "fraud_attr.`id_currency`"
        ));
        $db->add_query_conditions('', 'fraud_attr.id_divisions_filial', '=', 'divisions_filial.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_mhb', '=', 'divisions_mhb.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_otdel', '=', 'divisions_otdel.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_business_line', '=', 'business_line.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_category', '=', 'risk_category.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_factor', '=', 'risk_factor.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_loss_type', '=', 'loss_type.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_currency', '=', 'currency.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id', '=', $this->fFraud_attr->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Select_Fraud_Attr_To_Table()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud_attr', 'divisions_filial', 'divisions_mhb','divisions_otdel','business_line','risk_category','risk_factor','loss_type','currency'));
        $db->query_column_names->set(array(
            "fraud_attr.id AS id_fraud_attr",
            "fraud_attr.date1 AS date1",
            "divisions_filial.`name` AS name_divisions_filial",
            "divisions_mhb.`name` AS name_divisions_mhb",
            "divisions_otdel.`name` AS name_divisions_otdel",
            "business_line.`name` AS name_business_line",
            "risk_category.`name` AS name_risk_category",
            "risk_factor.`name` AS name_risk_factor",
            "loss_type.`name` AS name_loss_type",
            "fraud_attr.loss_amount AS loss_amount",
            "currency.`name` AS name_currency",
            "fraud_attr.loss_amount_tjs AS loss_amount_tjs",
            "fraud_attr.responsible_person AS responsible_person",
            "fraud_attr.`desc` AS desc_fraud_attr",
            "fraud_attr.`id_divisions_filial`",
            "fraud_attr.`id_divisions_mhb`",
            "fraud_attr.`id_divisions_otdel`",
            "fraud_attr.`id_business_line`",
            "fraud_attr.`id_risk_category`",
            "fraud_attr.`id_risk_factor`",
            "fraud_attr.`id_loss_type`",
            "fraud_attr.`id_currency`"
        ));
        $db->add_query_conditions('', 'fraud_attr.id_divisions_filial', '=', 'divisions_filial.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_mhb', '=', 'divisions_mhb.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_divisions_otdel', '=', 'divisions_otdel.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_business_line', '=', 'business_line.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_category', '=', 'risk_category.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_risk_factor', '=', 'risk_factor.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_loss_type', '=', 'loss_type.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'fraud_attr.id_currency', '=', 'currency.id', '', 'con', '');
        $this->cDatabase->Operation();
    }


    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('fraud_attr'));
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fFraud_attr->get()->date1->get()), 'str');
        $db->add_query_parameters('id_divisions_filial', '=', $this->fFraud_attr->get()->id_divisions_filial->get(), 'int');
        $db->add_query_parameters('id_divisions_mhb', '=', $this->fFraud_attr->get()->id_divisions_mhb->get(), 'int');
        $db->add_query_parameters('id_divisions_otdel', '=', $this->fFraud_attr->get()->id_divisions_otdel->get(), 'int');
        $db->add_query_parameters('id_business_line', '=', $this->fFraud_attr->get()->id_business_line->get(), 'int');
        $db->add_query_parameters('id_risk_category', '=', $this->fFraud_attr->get()->id_risk_category->get(), 'int');
        $db->add_query_parameters('id_risk_factor', '=', $this->fFraud_attr->get()->id_risk_factor->get(), 'int');
        $db->add_query_parameters('id_loss_type', '=', $this->fFraud_attr->get()->id_loss_type->get(), 'int');
        $db->add_query_parameters('loss_amount', '=', $this->fFraud_attr->get()->loss_amount->get(), 'int');
        $db->add_query_parameters('id_currency', '=', $this->fFraud_attr->get()->id_currency->get(), 'int');
        $db->add_query_parameters('loss_amount_tjs', '=', $this->fFraud_attr->get()->loss_amount_tjs->get(), 'int');
        $db->add_query_parameters('responsible_person', '=', $this->fFraud_attr->get()->responsible_person->get(), 'int');
        $db->add_query_parameters('desc', '=', $this->fFraud_attr->get()->desc->get(), 'str');
        $this->cDatabase->Operation();
    }

    
    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array('fraud_attr'));
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fFraud_attr->get()->date1->get()), 'str');
        $db->add_query_parameters('id_divisions_filial', '=', $this->fFraud_attr->get()->id_divisions_filial->get(), 'int');
        $db->add_query_parameters('id_divisions_mhb', '=', $this->fFraud_attr->get()->id_divisions_mhb->get(), 'int');
        $db->add_query_parameters('id_divisions_otdel', '=', $this->fFraud_attr->get()->id_divisions_otdel->get(), 'int');
        $db->add_query_parameters('id_business_line', '=', $this->fFraud_attr->get()->id_business_line->get(), 'int');
        $db->add_query_parameters('id_risk_category', '=', $this->fFraud_attr->get()->id_risk_category->get(), 'int');
        $db->add_query_parameters('id_risk_factor', '=', $this->fFraud_attr->get()->id_risk_factor->get(), 'int');
        $db->add_query_parameters('id_loss_type', '=', $this->fFraud_attr->get()->id_loss_type->get(), 'int');
        $db->add_query_parameters('loss_amount', '=', $this->fFraud_attr->get()->loss_amount->get(), 'int');
        $db->add_query_parameters('id_currency', '=', $this->fFraud_attr->get()->id_currency->get(), 'int');
        $db->add_query_parameters('loss_amount_tjs', '=', $this->fFraud_attr->get()->loss_amount_tjs->get(), 'int');
        $db->add_query_parameters('responsible_person', '=', $this->fFraud_attr->get()->responsible_person->get(), 'int');
        $db->add_query_parameters('desc', '=', $this->fFraud_attr->get()->desc->get(), 'str');
        $db->add_query_conditions('', 'id', '=', $this->fFraud_attr->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array('fraud_attr'));
        $db->add_query_conditions('', 'id', '=', $this->fFraud_attr->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

}