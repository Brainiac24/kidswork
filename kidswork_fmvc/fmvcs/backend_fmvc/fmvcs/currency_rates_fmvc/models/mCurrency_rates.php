<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mCurrency_rates extends mModels
{
    public $fCurrency_rates;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fCurrency_rates = new fCurrency_rates();
        $this->fConfig = $this->fCurrency_rates;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fCurrency_rates);
    }

/*
Select_Ids
Select_By_Id
Select_To_Table
Insert
Update
Delete
*/

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('currency_rates'));
        $db->query_column_names->set(array("id"));
        $this->cDatabase->Operation();
    }
    
    function Select_By_Id($id="") {
        if ($id!="") {
            $this->fCurrency_rates->get()->id->set($id);
        }
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('currency_rates', 'currency'));
        $db->query_column_names->set(array('currency_rates.id AS id_currency_rates', 'currency.id AS id_currency', 'currency_rates.date1 AS date1','currency.`name` AS name_currency', 'currency_rates.`rate` AS rate'));
        $db->add_query_conditions('', 'currency_rates.id_currency', '=', 'currency.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'currency_rates.id', '=', $this->fCurrency_rates->get()->id->get(), '', 'int', '');
        $db->query_order_by->set((array('currency_rates.id')));
        $this->cDatabase->Operation();
    }

    function Select_To_Table()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('currency_rates', 'currency'));
        $db->query_column_names->set(array(
            "currency_rates.id AS id_currency_rates",
            "currency_rates.date1 AS date1",
            "currency.`name` AS name_currency",
            "currency_rates.`rate` AS rate"
        ));
        $db->add_query_conditions('', 'currency_rates.id_currency', '=', 'currency.id', '', 'con', '');
        $db->query_order_by->set((array('currency_rates.id')));
        $this->cDatabase->Operation();
    }

    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('currency_rates'));
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fCurrency_rates->get()->date1->get()), 'str');
        $db->add_query_parameters('id_currency', '=', $this->fCurrency_rates->get()->id_currency->get(), 'int');
        $db->add_query_parameters('rate', '=', $this->fCurrency_rates->get()->rate->get(), 'str');
        $this->cDatabase->Operation();
    }

    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array('currency_rates'));
        $db->add_query_parameters('date1', '=', $this->cDatabase->Convert_Date_To_Mysql($this->fCurrency_rates->get()->date1->get()), 'str');
        $db->add_query_parameters('id_currency', '=', $this->fCurrency_rates->get()->id_currency->get(), 'int');
        $db->add_query_parameters('rate', '=', $this->fCurrency_rates->get()->rate->get(), 'str');
        $db->add_query_conditions('', 'id', '=', $this->fCurrency_rates->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array('currency_rates'));
        $db->add_query_conditions('', 'id', '=', $this->fCurrency_rates->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }




}