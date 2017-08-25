<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mDivisions extends mModels
{
    public $fDivisions;
    public $cRouter;
    public $fAudit;
    public $cDatabase; 

    public function __construct($cKidswork)
    {
        $this->fDivisions = new fDivisions();
        $this->fConfig = $this->fDivisions;
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        parent::Init($this->fDivisions);
    }

    function Select_Ids() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions'));
        $db->query_column_names->set(array("id"));
        $this->cDatabase->Operation();
    }

    function Select_Names($id_divisions_2='') {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions','divisions_names'));
        $db->query_column_names->set(array("divisions.id as id",'divisions_names.name as name'));
        if ($id_divisions_2!='') {
            $db->add_query_conditions('', 'divisions.id_divisions_2', '=', $id_divisions_2, '', 'int', 'AND');
        }
        $db->add_query_conditions('', 'divisions.id_divisions_names', '=', 'divisions_names.id', '', 'con', '');
        $db->query_order_by->set((array('divisions.id')));
        $this->cDatabase->Operation();
    }

    function Select_By_Id($id="") {
        if ($id!="") {
            $this->fDivisions->get()->id->set($id);
        }
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions', 'divisions AS divisions_2','divisions_categories','divisions_names','divisions_names AS divisions_names_2'));
        $db->query_column_names->set(array( 'divisions.code',
                                            'divisions.id_divisions_categories',
                                            'divisions.id_divisions_names',
                                            'divisions.desc',
                                            'divisions.id_divisions_2',
                                            'divisions_names.name AS name_divisions_names',
                                            'divisions_categories.name AS name_divisions_categories',
                                            'divisions_names_2.name AS name_divisions_names_2',
                                            'divisions.desc'
                                            ));
        $db->add_query_conditions('', 'divisions.id_divisions_categories', '=', 'divisions_categories.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions.id_divisions_names', '=', 'divisions_names.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions.id_divisions_2', '=', 'divisions_2.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions_2.id_divisions_names', '=', 'divisions_names_2.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions.id', '=', $this->fDivisions->get()->id->get(), '', 'int', '');
        $db->query_order_by->set((array('divisions.id')));
        $this->cDatabase->Operation();
    }

    function Select_To_Table()
    {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('s');
        $db->query_table_names->set(array('divisions', 'divisions AS divisions_2','divisions_categories','divisions_names','divisions_names AS divisions_names_2'));
        $db->query_column_names->set(array( 'divisions.id',
                                            'divisions.code',
                                            'divisions.id_divisions_categories',
                                            'divisions.id_divisions_names',
                                            'divisions.desc',
                                            'divisions.id_divisions_2',
                                            'divisions_names.name AS name_divisions_names',
                                            'divisions_categories.name AS name_divisions_categories',
                                            'divisions_names_2.name AS name_divisions_names_2',
                                            'divisions.desc'
                                            ));
        $db->add_query_conditions('', 'divisions.id_divisions_categories', '=', 'divisions_categories.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions.id_divisions_names', '=', 'divisions_names.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions.id_divisions_2', '=', 'divisions_2.id', '', 'con', 'AND');
        $db->add_query_conditions('', 'divisions_2.id_divisions_names', '=', 'divisions_names_2.id', '', 'con', '');
        $db->query_order_by->set((array('divisions.id')));
        $this->cDatabase->Operation();
    }

    function Insert() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('i');
        $db->query_table_names->set(array('divisions'));
        $db->add_query_parameters('id_divisions_categories', '=', $this->fDivisions->get()->id_divisions_categories->get(), 'int');
        $db->add_query_parameters('id_divisions_names', '=', $this->fDivisions->get()->id_divisions_names->get(), 'int');
        $db->add_query_parameters('id_divisions_2', '=', $this->fDivisions->get()->id_divisions_2->get(), 'int');
        $db->add_query_parameters('code', '=', $this->fDivisions->get()->code->get(), 'str');
        $db->add_query_parameters('desc', '=', $this->fDivisions->get()->desc->get(), 'str');
        $this->cDatabase->Operation();
    }

    function Update() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('u');
        $db->query_table_names->set(array('divisions'));
        $db->add_query_parameters('id_divisions_categories', '=', $this->fDivisions->get()->id_divisions_categories->get(), 'int');
        $db->add_query_parameters('id_divisions_names', '=', $this->fDivisions->get()->id_divisions_names->get(), 'int');
        $db->add_query_parameters('id_divisions_2', '=', $this->fDivisions->get()->id_divisions_2->get(), 'int');
        $db->add_query_parameters('code', '=', $this->fDivisions->get()->code->get(), 'str');
        $db->add_query_parameters('desc', '=', $this->fDivisions->get()->desc->get(), 'str');
        $db->add_query_conditions('', 'id', '=', $this->fDivisions->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

    function Delete() {
        $db = $this->cDatabase->fDatabase->get();
        $this->cDatabase->Clear();
        $db->query_switcher->set('d');
        $db->query_table_names->set(array('divisions'));
        $db->add_query_conditions('', 'id', '=', $this->fDivisions->get()->id->get(), '', 'int', '');
        $this->cDatabase->Operation();
    }

}