<?php
namespace Kidswork\Backend;


class cDatatable extends mDatatable
{
    private $cHtml = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
    }

    function Init_Ajax()
    {
    }

    function Print()
    {
        return $this->fDatatable->get()->final_struct();
    }

    function DataTable($colls)
    {
        $res = '';
        $calc_mode = null;
        $sum_arr = null;
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        $res .= $this->cHtml->Start_Table_Sticky('table-1 b-t-1 base-table', $colls->ext('tablename')[0]);
        $array = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($array != null) {
            $res2 = $this->cHtml->Start_Thead_Element();
            $res2 .= $this->cHtml->Start_Tr_Element();
            $res3 = $this->cHtml->Start_Tr_Element();
            $kk = 0;
            foreach ($array as $key => $value) {
                $calc_mode[$kk] = $colls->ext($key)[1];
                $sum_arr[$kk] = '';
                $res2 .= $this->cHtml->Start_Th_Element($key, $calc_mode[$kk]);
                $res2 .= isset($colls->ext($key)[0]) ? $colls->ext($key)[0] : $key;
                $pp = false;
                if ($kk < 2) {
                    $pp = true;
                }
                $res2 .= $this->cHtml->End_Th_Element(false, $pp);
                $res3 .= $this->cHtml->Start_Td_Element();
                $res3 .= $value;
                if (isset($calc_mode[$kk])) {
                    $sum_arr[$kk] = $this->Calculate_Summaries($sum_arr[$kk], $value, $calc_mode[$kk]);
                }
                $res3 .= $this->cHtml->End_Td_Element();
                $kk++;
            }
            $res2 .= $this->cHtml->End_Tr_Element();
            $res2 .= $this->cHtml->End_Thead_Element();
            $res3 .= $this->cHtml->End_Tr_Element();
            $res .= $res2 . $res3;

            foreach ($stmt as $array2) {
                $res .= $this->cHtml->Start_Tr_Element();
                for ($i = 0; $i < count($array2) / 2; $i++) {
                    $res .= $this->cHtml->Start_Td_Element();
                    $res .= $array2[$i];
                    if (isset($calc_mode[$i])) {
                        $sum_arr[$i] = self::Calculate_Summaries($sum_arr[$i], $array2[$i], $calc_mode[$i]);
                    }
                    $res .= $this->cHtml->End_Td_Element();
                }

                $res .= $this->cHtml->End_Tr_Element();
            }
            $res .= $this->cHtml->Start_Tfoot_Element();
            $res .= $this->cHtml->Start_Tr_Element('summ');
            for ($i2 = 0; $i2 < count($sum_arr); $i2++) {
                $res .= $this->cHtml->Start_Td_Element('');
                $res .= $sum_arr[$i2];
                $res .= $this->cHtml->End_Td_Element();
            }
            $res .= $this->cHtml->End_Tr_Element();
            $res .= $this->cHtml->End_Tfoot_Element();
            $res .= $this->cHtml->End_Table_Sticky();
            $success = true;
        }
        else if ($this->cDatabase->fDatabase->get()->pdo_error_info->get()[0] == '00000') {
            $res .= $this->cHtml->Start_Tr_Element() . $this->cHtml->Start_Th_Element('', '') . 'Нет данных' . $this->cHtml->End_Th_Element(false) . $this->cHtml->End_Tr_Element();
            $res .= $this->cHtml->End_Table_Sticky();
        }
        else {
            $res .= $this->cDatabase->fDatabase->get()->pdo_error_info->get()[0] . $this->cDatabase->fDatabase->get()->pdo_error_info->get()[1] . $this->cDatabase->fDatabase->get()->pdo_error_info->get()[2];
            $res .= $this->cHtml->End_Table_Sticky();
        }
        $res .= $this->cHtml->End_Module_Row();
        if ($success) {
            $res .= $this->cHtml->Export_Btn_Table();
        }
        return $res;
    }

    function Calculate_Summaries($old_value, $new_value, $calc_mode)
    {
        $res = '';
        switch ($calc_mode) {
            case 'count' :
                $res = intval($old_value) + 1;
                break;
            case 'summ' :
                $res = floatval($old_value) + floatval($new_value);
                break;
            default :
                break;
        }
        return $res;
    }

}
