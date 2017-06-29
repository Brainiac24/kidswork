<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;
use \PDO;

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
        $db->fDatabase->add_query_conditions('', 'divisions.id', '=', 'accounts.id_divisions', '', 'con', 'AND');
        $db->fDatabase->add_query_conditions('', 'accounts.id', '=', 'limits.id_accounts', '', 'con', 'AND');
        $db->fDatabase->add_query_conditions('', 'n_currency.id', '=', 'accounts.id_currency', '', 'con', 'AND');
        $db->fDatabase->add_query_conditions('', 'n_accounts_cat.id', '=', 'accounts.id_accounts_cat', '', 'con', '');
        $db->fDatabase->set_query_order_by(array("divisions.id"));
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

    function DataTable_Module($fDatabase_module, $fConfig_file)
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $success = false;
        $res="";
        $res .= $cHtml->Start_Datatable();
        $res .= $cHtml->Start_Module_Row_2('datarow-cont sticky-table-headers noactive');
        $type_arr = null;
        $sum_arr = null;
        $stmt = $fDatabase_module->get_pdo_stmt();
        $res .= $cHtml->Start_Table_Sticky('table-1 b-t-1 base-table', $fConfig_file->get_column('table'));
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($array != null) {
            $res2 = $cHtml->Start_Thead_Element();
            $res2 .= $cHtml->Start_Tr_Element();
            $res3 = $cHtml->Start_Tr_Element();
            $kk = 0;
            foreach ($array as $key => $value) {
                $type_arr[$kk] = $stmt->getColumnMeta($kk)["native_type"];
                $sum_arr[$kk] = '';
                $res2 .= $cHtml->Start_Th_Element($key, $type_arr[$kk]);
                $res2 .= $fConfig_file->get_column($key);
                $pp = false;
                if ($kk < 2) {
                    $pp = true;
                }
                $res2 .= $cHtml->End_Th_Element(false, $pp);
                $res3 .= $cHtml->Start_Td_Element();
                $res3 .= $value;
                $sum_arr[$kk] = $this->Summary_Rows($value, $sum_arr[$kk], $type_arr[$kk]);
                $res3 .= $cHtml->End_Td_Element();
                $kk++;
            }
            $res2 .= $cHtml->End_Tr_Element();
            $res2 .= $cHtml->End_Thead_Element();
            $res3 .= $cHtml->End_Tr_Element();
            $res .= $res2 . $res3;

            foreach ($stmt as $array2) {
                $res .= $cHtml->Start_Tr_Element();
                for ($i = 0; $i < count($array2) / 2; $i++) {
                    $res .= $cHtml->Start_Td_Element();
                    $res .= $array2[$i];
                    $sum_arr[$i] = $this->Summary_Rows($array2[$i], $sum_arr[$i], $type_arr[$i]);
                    $res .= $cHtml->End_Td_Element();
                }

                $res .= $cHtml->End_Tr_Element();
            }
            $res .= $cHtml->Start_Tfoot_Element();
            $res .= $cHtml->Start_Tr_Element('summ');
            for ($i2 = 0; $i2 < count($sum_arr); $i2++) {
                $res .= $cHtml->Start_Td_Element('');
                $res .= $sum_arr[$i2];
                $res .= $cHtml->End_Td_Element();
            }
            $res .= $cHtml->End_Tr_Element();
            $res .= $cHtml->End_Tfoot_Element();
            $res .= $cHtml->End_Table_Sticky();
            $success = true;
        } elseif ($fDatabase_module->get_pdo_error_info()[0] == '00000') {
            $res .= $cHtml->Start_Tr_Element() . $cHtml->Start_Th_Element('', '') . 'Нет данных' . $cHtml->End_Th_Element(false) . $cHtml->End_Tr_Element();
            $res .= $cHtml->End_Table_Sticky();
        } else {
            $res .= $fDatabase_module->get_pdo_error_info()[0] . $fDatabase_module->get_pdo_error_info()[1] . $fDatabase_module->get_pdo_error_info()[2];
            $res .= $cHtml->End_Table_Sticky();
        }
        
        $res .= $cHtml->End_Datatable();
        if ($success) {
            $res .= $cHtml->Export_Btn_Table();
        }
        
            $res .= $cHtml->End_Module_Row();
        return $res;
    }

    function Summary_Rows($value, $old_value, $type_value)
    {
        $res = '';
        switch ($type_value) {
            case 'LONG':
                //echo '/----/' . $old_value;
                $res = intval($old_value) + 1;
                break;
            case 'LONGLONG':
                $res = intval($old_value) + 1;
                break;
            case 'SHORT':
                $res = floatval($old_value) + floatval($value);
                break;
            case 'DOUBLE':
                $res = floatval($old_value) + floatval($value);
                break;
            default:
                break;
        }
        return $res;
    }
}
