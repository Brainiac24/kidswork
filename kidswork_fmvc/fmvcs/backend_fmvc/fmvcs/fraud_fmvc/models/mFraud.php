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

    function Select_Ids_Fraud_Attr() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud_attr'));
        $db->query_column_names->set(array("id","date1"));
        $this->cDatabase->Operation();
    }
    
    function Select_Fraud_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud, fraud_attr'));
        $db->query_column_names->set(array('fraud.id AS fraud_id', 'fraud_attr.id AS fraud_attr_id', 'fraud.id_fraud_attr as id_fraud_attr2','fraud.date1'));
        $db->add_query_conditions('', 'fraud.id', '=', $this->fFraud->get()->id->get(), '', 'int', 'AND');
        $db->add_query_conditions('', 'fraud.id_fraud_attr', '=', 'fraud_attr.id', '', 'con', '');
        $this->cDatabase->Operation();
    }

    function Select_Fraud_Attr_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('fraud_attr'));
        $db->query_column_names->set(array("id","desc"));
        $db->add_query_conditions('', 'id', '=', $this->fFraud->get()->id_fraud_attr->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }
        


}