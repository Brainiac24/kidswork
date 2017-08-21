<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mNames extends mModels
{
    public $fNames;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fNames = new fNames();
        $this->fConfig = $this->fNames;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        //\var_dump($this->cKidswork->ctrls_global->ext("cRouter"));
        
        parent::Init($this->fNames);
    }

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->query_column_names->set(array("id","name"));
        $this->cDatabase->Operation();
    }

    function Select_Names_To_Table() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->query_column_names->set(array('id', 'name'));
        $db->query_order_by->set((array('id')));
        $this->cDatabase->Operation();
    }

    function Select_Names_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->query_column_names->set(array('id', 'name'));
        $db->add_query_conditions('', 'id', '=', $this->fNames->get()->id->get(), '', 'int','');
        $db->query_order_by->set((array('id')));
        $this->cDatabase->Operation();
    }

    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->add_query_parameters('name', '=', $this->fNames->get()->name->get(), 'str');
        $this->cDatabase->Operation();
    }

    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->add_query_parameters('name', '=', $this->fNames->get()->name->get(), 'str');
        $db->add_query_conditions('', 'id', '=', $this->fNames->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->add_query_conditions('', 'id', '=', $this->fNames->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

}