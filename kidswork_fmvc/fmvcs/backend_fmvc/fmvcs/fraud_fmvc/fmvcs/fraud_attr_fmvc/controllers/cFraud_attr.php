<?php
namespace Kidswork\Backend;


class cFraud_attr extends mFraud_attr
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $cNames = null;
    private $cFraud = null;
    private $cCurrency_rates = null;
    private $cDivisions = null;
    private $box_bottom = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cLeftmenu = $this->cKidswork->ctrls_global->ext("cLeftmenu");
        $this->cTopmenu = $this->cKidswork->ctrls_global->ext("cTopmenu");
        $this->cTopmenu2 = $this->cKidswork->ctrls_global->ext("cTopmenu2");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->cNames = $this->cKidswork->ctrls_global->ext("cNames");
        $this->cFraud = $this->cKidswork->ctrls_global->ext("cFraud");
        $this->cCurrency_rates = $this->cKidswork->ctrls_global->ext("cCurrency_rates");
        $this->cDivisions = $this->cKidswork->ctrls_global->ext("cDivisions");
        $this->Menu();
    }

    function Init_Ajax()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->cNames = $this->cKidswork->ctrls_global->ext("cNames");
        $this->cCurrency_rates = $this->cKidswork->ctrls_global->ext("cCurrency_rates");
        $this->cDivisions = $this->cKidswork->ctrls_global->ext("cDivisions");
        $this->Menu_Ajax();
    }

    public function Print()
    {
        return $this->fFraud_attr->get()->final_struct();
    }

    public function Menu_Ajax()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();

        if ($menu == "11") {
            if ($this->cRouter->fRouter->get()->ajax->get() == "2") {
                if ($this->fFraud_attr->get()->data_mode->get() == "") {
                    $this->fFraud_attr->get()->data_mode->set("2");
                }
                $this->Data_Control_Switcher();
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
            }
            elseif ($this->cRouter->fRouter->get()->ajax->get() == "3") {
                $this->Select_Fraud_Attr_To_Table();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt, 'datatable-2'));
                }
            }
            else {
                if ($this->fFraud_attr->get()->is_child->get() == "") {
                    $this->fFraud_attr->get()->is_child->set("0");
                }
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
            }
        }
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("11" => null);
        \array_key_exists($menu, $active) ? $active[$menu] = true : false;
        if ($menu == "11") {
            $this->Submenu();
        }
        $this->cFraud->fFraud->get()->submenu->add(array("Описания фрода", "?menu=11", "", $active[11]));
    }

    public function Submenu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $active2 = array("1" => null, "2" => null, "3" => null);
        \array_key_exists($submenu, $active2) ? $active2[$submenu] = true : false;
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Мониторинг", "?menu=" . $menu . "&submenu=1", "1", $active2[1]));
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Ввод данных", "?menu=" . $menu . "&submenu=2", "", $active2[2]));
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Отчётая таблица", "?menu=" . $menu . "&submenu=3", "", $active2[3]));
        if ($submenu == "2") {
            if ($this->fFraud_attr->get()->data_mode->get() == "") {
                $this->fFraud_attr->get()->data_mode->set("2");
            }
            if ($this->fFraud_attr->get()->is_child->get() == "") {
                $this->fFraud_attr->get()->is_child->set("0");
            }
            $this->Data_Control_Switcher();
            $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
        }
        elseif ($submenu == "3") {
            $this->Select_Fraud_Attr_To_Table();
            $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
            if ($stmt !== null) {
                $this->cCenter->fCenter->get()->width->set("100");
                $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt, 'datatable'));
            }
        }
    }

    public function Fill_Id_Fraud_Attr($selected_value = null, $self = true)
    {

        if ($selected_value !== null) {
            $this->fFraud_attr->get()->id->set($selected_value);

        }

        $id_module_code = "id_module_code";
        if (!$self) {
            $id_module_code = "";
        }
        $id = $this->cHtml->Start_Select_Element($id_module_code, "id_fraud_attr", $this->fFraud_attr->get()->id->get(), "listselectbox-2", 'Выберите значение');
        $this->Select_Ids_Fraud_Attr();
        $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt2 !== null) {
            foreach ($stmt2 as $key2) {
                $selected = "";
                if ($key2["id"] == $this->fFraud_attr->get()->id->get()) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key2["id"], $key2["id"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

    public function Fill_Ids_Parent()
    {
        $res0 = $this->Fill_Id_Fraud_Attr($this->fFraud_attr->get()->id->get(), false);
        $res1 = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
        header("Content-Type: application/json;charset=utf-8");
        $res = \json_encode(array('cmb' => $res0, 'msg' => $res1));

        return $res;
    }

    function Data_Control_Action()
    {
        $res = "";
        switch ($this->fFraud_attr->get()->data_mode->get()) {
            case 1 :
                $stmt = "";
                if ($this->fFraud_attr->get()->id->get() != null) {
                    $this->Select_Fraud_Attr_By_Id();
                    $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                }
                $this->Data_Control_Switcher($stmt);
                $res = $this->Box_Content_View();

                break;
            case 2 :
                if ($this->fFraud_attr->get()->action->get() == 2) {
                    $this->Set_Default_1_Insert();
                    $this->Insert();
                    if ($this->cDatabase->fDatabase->get()->last_inserted_id->get() > 0) {
                        $this->fFraud_attr->get()->id->set($this->cDatabase->fDatabase->get()->last_inserted_id->get());
                    }
                    $res = $this->Fill_Ids_Parent();
                }
                else {
                    $this->Data_Control_Switcher();
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", "", "2", "center-box-msg");
                }

                break;
            case 3 :

                if ($this->fFraud_attr->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->Fill_Ids_Parent();
                }
                else {
                    if ($this->fFraud_attr->get()->id->get() != null) {

                        $this->Select_Fraud_Attr_By_Id();
                        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                        $this->Data_Control_Switcher($stmt);
                    }
                    else {
                        $this->Data_Control_Switcher();
                    }

                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", "", "2", "center-box-msg");
                }
                break;
            case 4 :

                if ($this->fFraud_attr->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->Fill_Ids_Parent();
                }
                else {
                    if ($this->fFraud_attr->get()->id->get() != null) {
                        $this->Select_Fraud_Attr_By_Id();
                        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                        $this->Data_Control_Switcher($stmt);
                    }
                    else {
                        $this->Data_Control_Switcher();
                    }
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", "", "2", "center-box-msg");
                }
                break;
            default :
                break;
        }

        return $res;
    }

    function Data_Control_Switcher($stmt = null)
    {
        switch ($this->fFraud_attr->get()->data_mode->get()) {
            case 1 :
                $this->fFraud_attr->get()->id->set($this->Fill_Id_Fraud_Attr());
                $this->Set_Default_Select_View($stmt);
                break;
            case 2 :
                $id = $this->cHtml->New_Code("- Новый -");
                $this->fFraud_attr->get()->id->set($id);
                $this->Set_Default_Form_Content_View();
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 3 :
                $this->fFraud_attr->get()->id->set($this->Fill_Id_Fraud_Attr());
                $this->Set_Default_Update_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 4 :
                $this->Select_Fraud_Attr_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                $this->fFraud_attr->get()->id->set($this->Fill_Id_Fraud_Attr());
                $this->Set_Default_Select_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Delete("Удалить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            default :
                break;
        }
    }

    function Data_Control_View()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $data_mode = $this->fFraud_attr->get()->data_mode->get();
        $sel = array(1 => null, 2 => null, 3 => null, 4 => null, 5 => null);
        $cap = "";

        if ($data_mode == "1") {
            $sel[$data_mode] = "item-sel-a";
            $cap = "cap-sel";
        }
        elseif ($data_mode == "2") {
            $sel[$data_mode] = "item-add-a";
            $cap = "cap-add";
        }
        elseif ($data_mode == "3") {
            $sel[$data_mode] = "item-upd-a";
            $cap = "cap-upd";
        }
        elseif ($data_mode == "4") {
            $sel[$data_mode] = "item-del-a";
            $cap = "cap-del";
        }


        $res = "";
        $res .= $this->cHtml->Start_Center_Box();
        $res .= $this->cHtml->Start_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cap($this->fFraud_attr->get()->is_child->get(), $cap);
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Icon_Dot($this->fFraud_attr->get()->is_child->get()) . "Описание фрода");
        $res .= $this->cHtml->Box_Menu($data_mode, $sel, $menu, $submenu);

        $res .= $this->cHtml->End_Center_Box_Cap();
        $res .= $this->cHtml->End_Center_Box_Top();

        $res .= $this->cHtml->Start_Table("table-box");
        $res .= $this->cHtml->Start_Datatable_Body("center-box-cont");
        $res .= $this->Box_Content_View();

        $res .= $this->box_bottom;
        $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"), "2", "center-box-msg");
        $res .= $this->cHtml->End_Datatable_Body();
        $res .= $this->cHtml->End_Table();


        $res .= $this->cHtml->Start_Center_Child_Box();

        $res .= $this->cHtml->End_Center_Child_Box();

        $res .= $this->cHtml->End_Center_Box();


        return $res;
    }


    public function Box_Content_View()
    {
        $res = "";
        $res .= $this->cHtml->Table_2_Row_C2('Код:', $this->fFraud_attr->get()->id->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fFraud_attr->get()->date1->get(), "2");
        $res .= $this->cHtml->Table_Btn_Row_C2("Филиал:", $this->fFraud_attr->get()->id_divisions_filial->get(), "2", "", "?menu=13&submenu=2&id_divisions_categories=2&form_name_return=id_divisions_filial&id_module_code=parent-divisions&id_divisions_categories=2");
        $res .= $this->cHtml->Table_Btn_Row_C2("Подразделение:", $this->fFraud_attr->get()->id_divisions_mhb->get(), "2", "", "?menu=13&submenu=2&id_divisions_categories=3&form_name_return=id_divisions_mhb&id_module_code=child-divisions&id_divisions_categories=3");
        $res .= $this->cHtml->Table_Btn_Row_C2("Бизнес линия:", $this->fFraud_attr->get()->id_business_line->get(), "2", "", "?menu=10&module=names&table=business_line&table_name=Бизнес+линия");
        $res .= $this->cHtml->Table_Btn_Row_C2("Вид риска:", $this->fFraud_attr->get()->id_risk_category->get(), "2", "", "?menu=10&module=names&table=risk_category&table_name=Вид+риска");
        $res .= $this->cHtml->Table_Btn_Row_C2("Факторы риска:", $this->fFraud_attr->get()->id_risk_factor->get(), "2", "", "?menu=10&module=names&table=risk_factor&table_name=Факторы+риска");
        $res .= $this->cHtml->Table_Btn_Row_C2("Вид потерь:", $this->fFraud_attr->get()->id_loss_type->get(), "2", "", "?menu=10&module=names&table=loss_type&table_name=Вид+потерь");
        $res .= $this->cHtml->Table_2_Row_C2("Сумма номинальных потерь:", $this->fFraud_attr->get()->loss_amount_base->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Сумма текущих потерь:", $this->fFraud_attr->get()->loss_amount_current->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Востановленная сумма:", $this->fFraud_attr->get()->loss_amount_restored->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Фактическая сумма потерь:", $this->fFraud_attr->get()->loss_amount_fact->get(), "2");
        $res .= $this->cHtml->Table_Btn_Row_C2("Валюта:", $this->fFraud_attr->get()->id_currency_rates->get(), "2", "", "?menu=10&module=names&table=currency&table_name=Валюта");
        //$res .= $this->cHtml->Table_2_Row_C2("Сумма номинальных потерь в Сомони:", $this->fFraud_attr->get()->loss_amount_base_tjs->get(), "2");
        //$res .= $this->cHtml->Table_2_Row_C2("Сумма текущих потерь в Сомони:", $this->fFraud_attr->get()->loss_amount_current_tjs->get(), "2");
        //$res .= $this->cHtml->Table_2_Row_C2("Востановленная сумма в Сомони:", $this->fFraud_attr->get()->loss_amount_restored_tjs->get(), "2");
        //$res .= $this->cHtml->Table_2_Row_C2("Фактическая сумма потерь в Сомони:", $this->fFraud_attr->get()->loss_amount_fact_tjs->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Ответственные лица:", $this->fFraud_attr->get()->responsible_person->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Подробное описание события:", $this->fFraud_attr->get()->desc->get(), "2");

        return $res;
    }

    public function Set_Default_Form_Content_View()
    {
        $this->fFraud_attr->get()->date1->set($this->cHtml->Input_Date("date1", (new \DateTime())->format('Y-m-d')));
        $this->fFraud_attr->get()->id_divisions_filial->set($this->cDivisions->Fill_Names("","id_divisions_filial",'parent-divisions','2'));
        $this->fFraud_attr->get()->id_divisions_mhb->set($this->cDivisions->Fill_Names("","id_divisions_mhb",'child-divisions','3'));
        $this->fFraud_attr->get()->id_business_line->set($this->cNames->Fill_Names("id_business_line", "business_line"));
        $this->fFraud_attr->get()->id_risk_category->set($this->cNames->Fill_Names("id_risk_category", "risk_category"));
        $this->fFraud_attr->get()->id_risk_factor->set($this->cNames->Fill_Names("id_risk_factor", "risk_factor"));
        $this->fFraud_attr->get()->id_loss_type->set($this->cNames->Fill_Names("id_loss_type", "loss_type"));
        $this->fFraud_attr->get()->loss_amount_base->set($this->cHtml->Input_Text("loss_amount_base"));
        $this->fFraud_attr->get()->loss_amount_current->set($this->cHtml->Input_Text("loss_amount_current"));
        $this->fFraud_attr->get()->loss_amount_restored->set($this->cHtml->Input_Text("loss_amount_restored"));
        $this->fFraud_attr->get()->loss_amount_fact->set($this->cHtml->Input_Hidden("loss_amount_fact", "", "-"));
        $this->fFraud_attr->get()->id_currency_rates->set($this->cNames->Fill_Names("id_currency", "currency"));
        $this->fFraud_attr->get()->loss_amount_base_tjs->set($this->cHtml->Input_Hidden("loss_amount_base_tjs", "", "-"));
        $this->fFraud_attr->get()->loss_amount_current_tjs->set($this->cHtml->Input_Hidden("loss_amount_current_tjs", "", "-"));
        $this->fFraud_attr->get()->loss_amount_restored_tjs->set($this->cHtml->Input_Hidden("loss_amount_restored_tjs", "", "-"));
        $this->fFraud_attr->get()->loss_amount_fact_tjs->set($this->cHtml->Input_Hidden("loss_amount_fact_tjs", "", "-"));
        $this->fFraud_attr->get()->responsible_person->set($this->cHtml->Input_RichText("responsible_person", ""));
        $this->fFraud_attr->get()->desc->set($this->cHtml->Input_RichText("desc", ""));
    }

    public function Set_Default_Dash_View()
    {
        $this->fFraud_attr->get()->date1->set("-");
        $this->fFraud_attr->get()->id_divisions_filial->set("-");
        $this->fFraud_attr->get()->id_divisions_mhb->set("-");
        $this->fFraud_attr->get()->id_business_line->set("-");
        $this->fFraud_attr->get()->id_risk_category->set("-");
        $this->fFraud_attr->get()->id_risk_factor->set("-");
        $this->fFraud_attr->get()->id_loss_type->set("-");
        $this->fFraud_attr->get()->loss_amount_base->set("-");
        $this->fFraud_attr->get()->loss_amount_current->set("-");
        $this->fFraud_attr->get()->loss_amount_restored->set("-");
        $this->fFraud_attr->get()->loss_amount_fact->set("-");
        $this->fFraud_attr->get()->id_currency_rates->set("-");
        $this->fFraud_attr->get()->loss_amount_base_tjs->set("-");
        $this->fFraud_attr->get()->loss_amount_current_tjs->set("-");
        $this->fFraud_attr->get()->loss_amount_restored_tjs->set("-");
        $this->fFraud_attr->get()->loss_amount_fact_tjs->set("-");
        $this->fFraud_attr->get()->responsible_person->set("-");
        $this->fFraud_attr->get()->desc->set("-");
    }

    public function Set_Default_1_Insert()
    {
        $loss_amount_base = 0;
        $loss_amount_current = 0;
        $loss_amount_restored = 0;
        $loss_amount_fact = 0;
        $loss_amount_base_tjs = 0;
        $loss_amount_current_tjs = 0;
        $loss_amount_restored_tjs = 0;
        $loss_amount_fact_tjs = 0;
        if ($this->fFraud_attr->get()->id_divisions_filial->get() == "") {
            $this->fFraud_attr->get()->id_divisions_filial->set('1');
        }
        if ($this->fFraud_attr->get()->id_divisions_mhb->get() == "") {
            $this->fFraud_attr->get()->id_divisions_mhb->set('1');
        }
        if ($this->fFraud_attr->get()->id_business_line->get() == "") {
            $this->fFraud_attr->get()->id_business_line->set('1');
        }
        if ($this->fFraud_attr->get()->id_risk_category->get() == "") {
            $this->fFraud_attr->get()->id_risk_category->set('1');
        }
        if ($this->fFraud_attr->get()->id_risk_factor->get() == "") {
            $this->fFraud_attr->get()->id_risk_factor->set('1');
        }
        if ($this->fFraud_attr->get()->id_loss_type->get() == "") {
            $this->fFraud_attr->get()->id_loss_type->set('1');
        }
        if ($this->fFraud_attr->get()->loss_amount_base->get() == "") {
            $this->fFraud_attr->get()->loss_amount_base->set('0');
        }
        if ($this->fFraud_attr->get()->loss_amount_current->get() == "") {
            $this->fFraud_attr->get()->loss_amount_current->set('0');
        }
        if ($this->fFraud_attr->get()->loss_amount_restored->get() == "") {
            $this->fFraud_attr->get()->loss_amount_restored->set('0');
        }
        if ($this->fFraud_attr->get()->loss_amount_fact->get() == "") {
            $this->fFraud_attr->get()->loss_amount_fact->set('0');
        }
        if ($this->fFraud_attr->get()->id_currency->get() == "") {
            $this->fFraud_attr->get()->id_currency->set('1');
        }
        else {
            $this->cCurrency_rates->Select_By_Name_Id_And_Date($this->fFraud_attr->get()->id_currency->get(), $this->fFraud_attr->get()->date1->get());
            $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
            if ($stmt != null) {
                foreach ($stmt as $key) {
                    $this->fFraud_attr->get()->id_currency_rates->set($key['id_currency_rates']);
                    $rate = \doubleval($key['rate']);
                    $loss_amount_base = \doubleval(\str_replace(",", ".",$this->fFraud_attr->get()->loss_amount_base->get()) );
                    $loss_amount_current = \doubleval(\str_replace(",", ".",$this->fFraud_attr->get()->loss_amount_current->get()));
                    $loss_amount_restored = \doubleval(\str_replace(",", ".",$this->fFraud_attr->get()->loss_amount_restored->get()));
                    $loss_amount_fact = \doubleval(\str_replace(",", ".",$this->fFraud_attr->get()->loss_amount_fact->get()));
                    $loss_amount_base_tjs = $rate;
                    $loss_amount_current_tjs = $loss_amount_current / $rate;
                    $loss_amount_restored_tjs = $loss_amount_restored / $rate;
                    $loss_amount_fact_tjs = $loss_amount_fact / $rate;
                }
            }
        }

        $this->fFraud_attr->get()->loss_amount_base_tjs->set($loss_amount_base_tjs);
        $this->fFraud_attr->get()->loss_amount_current_tjs->set($loss_amount_current_tjs);
        $this->fFraud_attr->get()->loss_amount_restored_tjs->set($loss_amount_restored_tjs);
        $this->fFraud_attr->get()->loss_amount_fact_tjs->set($loss_amount_fact_tjs);



    }



    public function Set_Default_Select_View($stmt)
    {
        if ($stmt != null) {
            if ($stmt->rowCount() != 0) {
                foreach ($stmt as $key) {
                    $this->fFraud_attr->get()->date1->set($key["date1"]);
                    $this->fFraud_attr->get()->id_divisions_filial->set($key["name_divisions_filial"]);
                    $this->fFraud_attr->get()->id_divisions_mhb->set($key["name_divisions_mhb"]);
                    $this->fFraud_attr->get()->id_business_line->set($key["name_business_line"]);
                    $this->fFraud_attr->get()->id_risk_category->set($key["name_risk_category"]);
                    $this->fFraud_attr->get()->id_risk_factor->set($key["name_risk_factor"]);
                    $this->fFraud_attr->get()->id_loss_type->set($key["name_loss_type"]);
                    $this->fFraud_attr->get()->loss_amount_base->set($key["loss_amount_base"]);
                    $this->fFraud_attr->get()->loss_amount_current->set($key["loss_amount_current"]);
                    $this->fFraud_attr->get()->loss_amount_restored->set($key["loss_amount_restored"]);
                    $this->fFraud_attr->get()->loss_amount_fact->set($key["loss_amount_fact"]);
                    $this->fFraud_attr->get()->id_currency_rates->set($key["id_currency_rates"]);
                    $this->fFraud_attr->get()->loss_amount_base_tjs->set($key["loss_amount_base_tjs"]);
                    $this->fFraud_attr->get()->loss_amount_current_tjs->set($key["loss_amount_current_tjs"]);
                    $this->fFraud_attr->get()->loss_amount_restored_tjs->set($key["loss_amount_restored_tjs"]);
                    $this->fFraud_attr->get()->loss_amount_fact_tjs->set($key["loss_amount_fact_tjs"]);
                    $this->fFraud_attr->get()->responsible_person->set($key["responsible_person"]);
                    $this->fFraud_attr->get()->desc->set($key["desc_fraud_attr"]);
                }
            }
        }
        else {
            $this->Set_Default_Dash_View();
        }
    }

    public function Set_Default_Update_View($stmt)
    {
        if ($stmt !== null) {
            if ($stmt->rowCount() != 0) {
                foreach ($stmt as $key) {
                    $this->fFraud_attr->get()->date1->set($this->cHtml->Input_Date("date1", $key["date1"]));
                    $this->fFraud_attr->get()->id_divisions_filial->set($this->cNames->Fill_Names("id_divisions_filial", "divisions_filial", $key["id_divisions_filial"]));
                    $this->fFraud_attr->get()->id_divisions_mhb->set($this->cNames->Fill_Names("id_divisions_mhb", "divisions_mhb", $key["id_divisions_mhb"]));
                    $this->fFraud_attr->get()->id_business_line->set($this->cNames->Fill_Names("id_business_line", "business_line", $key["id_business_line"]));
                    $this->fFraud_attr->get()->id_risk_category->set($this->cNames->Fill_Names("id_risk_category", "risk_category", $key["id_risk_category"]));
                    $this->fFraud_attr->get()->id_risk_factor->set($this->cNames->Fill_Names("id_risk_factor", "risk_factor", $key["id_risk_factor"]));
                    $this->fFraud_attr->get()->id_loss_type->set($this->cNames->Fill_Names("id_loss_type", "loss_type", $key["id_loss_type"]));
                    $this->fFraud_attr->get()->loss_amount->set($this->cHtml->Input_Text("loss_amount", $key["loss_amount"]));
                    $this->fFraud_attr->get()->id_currency->set($this->cNames->Fill_Names("id_currency", "currency", $key["id_currency"]));
                    $this->fFraud_attr->get()->loss_amount_tjs->set($this->cHtml->Input_Text("loss_amount_tjs", $key["loss_amount_tjs"]));
                    $this->fFraud_attr->get()->responsible_person->set($this->cHtml->Input_RichText("responsible_person", $key["responsible_person"]));
                    $this->fFraud_attr->get()->desc->set($this->cHtml->Input_RichText("desc", $key["desc_fraud_attr"]));
                }
            }
            else {
                $this->Set_Default_Form_Content_View();
            }
        }
        else {
            $this->Set_Default_Form_Content_View();
        }

    }

    function Datatable($stmt, $class = 'datatable')
    {

        $cHtml = $this->cHtml;
        $res = '';
        $res .= $cHtml->Start_Datatable($class);
        $res .= $cHtml->Start_Table("table-1");
        $res .= $cHtml->Start_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Tr();
        $res .= $cHtml->Datatable_Th("Код");
        $res .= $cHtml->Datatable_Th("Дата");
        $res .= $cHtml->Datatable_Th("Филиал");
        $res .= $cHtml->Datatable_Th("Подразделение");
        $res .= $cHtml->Datatable_Th("Бизнес линия");
        $res .= $cHtml->Datatable_Th("Вид риска");
        $res .= $cHtml->Datatable_Th("Факторы риска");
        $res .= $cHtml->Datatable_Th("Вид потерь");
        $res .= $cHtml->Datatable_Th("Сумма номинальных потерь");
        $res .= $cHtml->Datatable_Th("Сумма текущих потерь");
        $res .= $cHtml->Datatable_Th("Востановленная сумма");
        $res .= $cHtml->Datatable_Th("Фактическая сумма потерь");
        $res .= $cHtml->Datatable_Th("Валюта");
        $res .= $cHtml->Datatable_Th("Курс валюты");
        $res .= $cHtml->Datatable_Th("Сумма номинальных потерь в Сомони");
        $res .= $cHtml->Datatable_Th("Сумма текущих потерь в Сомони");
        $res .= $cHtml->Datatable_Th("Востановленная сумма в Сомони");
        $res .= $cHtml->Datatable_Th("Фактическая сумма потерь в Сомони");
        $res .= $cHtml->Datatable_Th("Ответственные лица");
        $res .= $cHtml->Datatable_Th("Подробное описание события");
        $res .= $cHtml->End_Datatable_Tr();
        $res .= $cHtml->End_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Body();
        if ($stmt != null) {
            foreach ($stmt as $key) {
                $res .= $cHtml->Start_Datatable_Tr();
                $res .= $cHtml->Datatable_Td($key['id_fraud_attr']);
                $res .= $cHtml->Datatable_Td($this->cDatabase->Convert_Date_To_Label($key['date1']));
                $res .= $cHtml->Datatable_Td($key['name_divisions_filial']);
                $res .= $cHtml->Datatable_Td($key['name_divisions_mhb']);
                $res .= $cHtml->Datatable_Td($key['name_business_line']);
                $res .= $cHtml->Datatable_Td($key['name_risk_category']);
                $res .= $cHtml->Datatable_Td($key['name_risk_factor']);
                $res .= $cHtml->Datatable_Td($key['name_loss_type']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_base']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_current']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_restored']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_fact']);
                $res .= $cHtml->Datatable_Td($key['name_currency']);
                $res .= $cHtml->Datatable_Td($key['rate']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_base_tjs']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_current_tjs']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_restored_tjs']);
                $res .= $cHtml->Datatable_Td($key['loss_amount_fact_tjs']);
                $res .= $cHtml->Datatable_Td($key['responsible_person']);
                $res .= $cHtml->Datatable_Td($key['desc_fraud_attr']);
                $res .= $cHtml->End_Datatable_Tr();
            }
        }

        $res .= $cHtml->End_Datatable_Body();
        $res .= $cHtml->End_Table();
        $res .= $cHtml->End_Datatable();

        return $res;
    }



}
