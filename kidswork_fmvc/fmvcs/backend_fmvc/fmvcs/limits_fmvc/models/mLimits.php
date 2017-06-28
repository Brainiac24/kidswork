<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mLimits extends mModels
{
    public $fLimits;
    public $cKidswork;
    public $cRouter;
    public $cDatabase;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fLimits = new fLimits();
        //$cKidswork->Import($this->fLimits);
        $this->cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        $this->cDatabase = $this->cKidswork->fKidswork->get_controllers_array()["cDatabase"];
    }

    public function Init($fClass = null)
    {
        parent::Init($this->fLimits);
    }

    public function Select_All_MHB()
    {
        $db = $this->cDatabase;
        $db->fDatabase->set_query_switcher('s');
        $db->fDatabase->set_query_table_names(array('divisions', 'accounts','n_currency','limits','n_accounts_cat'));
        $db->fDatabase->set_query_column_names(array('divisions.`id` AS code_id','divisions.`code` AS code_1', 'name_address', 'accounts.`code`', '`limits`.`limit`', '`n_currency`.`name` AS name_currency', 'n_accounts_cat.`name`'));
        $db->fDatabase->add_query_conditions('','divisions.id', '=', 'accounts.id_divisions', '', 'con','AND');
        $db->fDatabase->add_query_conditions('','accounts.id', '=', 'limits.id_accounts','', 'con','AND');
        $db->fDatabase->add_query_conditions('','n_currency.id', '=', 'accounts.id_currency','', 'con','AND');
        $db->fDatabase->add_query_conditions('','n_accounts_cat.id', '=', 'accounts.id_accounts_cat','', 'con','');
        $db->fDatabase->set_query_order_by(array("divisions.id DESC"));
        $db->Operation();
        return $db;
    }

    public function Select_By_Id_Division_And_Id_Category($id_division, $id_category)
    {
        $db = $this->cDatabase;

        $db->set_query_switcher('s');
        $db->set_query_table_names(array('divisions', 'accounts','n_currency','limits','n_accounts_cat'));
        $db->set_query_column_names(array('divisions.`code` AS code_1', 'name_address', 'accounts.`code`', '`limits`.`limit`', '`n_currency`.`name`', 'n_accounts_cat.`name`'));
        $db->add_query_conditions('divisions.id', '=', 'accounts.id_divisions', 'con');
        $db->add_query_conditions('accounts.id', '=', 'limits.id_accounts', 'con');
        $db->add_query_conditions('n_currency.id', '=', 'accounts.id_currency', 'con');
        $db->add_query_conditions('n_accounts_cat.id', '=', 'accounts', 'con');
        $db->set_query_order_by(array(" FIELD(ads.id, " . $fav_arr . ") DESC"));
        $db->Operation();
        
        return $db;
    }

}