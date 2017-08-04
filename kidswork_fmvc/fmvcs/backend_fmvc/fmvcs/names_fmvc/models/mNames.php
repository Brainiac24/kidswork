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
        parent::Init($this->fNames);
    }

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->query_column_names->set(array("id"));
        $this->cDatabase->Operation();
    }

    function Select_Names_By_Id() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array($this->fNames->get()->table->get()));
        $db->query_column_names->set(array('id', 'name'));
        $db->add_query_conditions('', 'id', '=', $this->fNames->get()->id->get(), '', 'int','');
        $this->cDatabase->Operation();
    }

}