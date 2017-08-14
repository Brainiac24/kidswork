<?php
namespace Kidswork\Backend;


class cFraud extends mFraud
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $cNames = null;
    private $cFraud_attr = null;
    private $box_bottom = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cLeftmenu = $this->cKidswork->ctrls_global->ext("cLeftmenu");
        $this->cTopmenu = $this->cKidswork->ctrls_global->ext("cTopmenu");
        $this->cTopmenu2 = $this->cKidswork->ctrls_global->ext("cTopmenu2");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->cNames = $this->cKidswork->ctrls_global->ext("cNames");
        $this->cFraud_attr = $this->cKidswork->ctrls_global->ext("cFraud_attr");
        $this->Menu();
    }

    function Init_Ajax()
    {

        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->cNames = $this->cKidswork->ctrls_global->ext("cNames");
        $this->cFraud_attr = $this->cKidswork->ctrls_global->ext("cFraud_attr");
        $this->Menu_Ajax();
    }

    public function Print()
    {
        return $this->fFraud->get()->final_struct();
    }

    public function Menu_Ajax()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();

        if ($menu == "3") {
            if ($this->fFraud->get()->is_child->get() == "") {
                $this->fFraud->get()->is_child->set("0");
            }
            $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
        }
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("3" => null);
        \array_key_exists($menu, $active) ? $active[$menu] = true : false;

        if ($menu == "3") {
            $this->Submenu();
        }

        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Фрод", "?menu=3", "", $active[3]));

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
            if ($this->fFraud->get()->data_mode->get() == "") {
                $this->fFraud->get()->data_mode->set("2");
            }
            if ($this->fFraud->get()->is_child->get() == "") {
                $this->fFraud->get()->is_child->set("0");
            }
            $this->Data_Control_Switcher();
            $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
        }
        elseif ($submenu == "3") {
            $this->Select_Audit_To_Table();
            $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
            if ($stmt !== null) {
                $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt));
            }
        }
    }

    public function Fill_Id_Fraud_State($selected_value = "")
    {
        if ($selected_value != "") {
            $this->fFraud->get()->id->set($selected_value);
        }
        $id = $this->cHtml->Start_Select_Element("id_module_code", "id_fraud", $this->fFraud->get()->id->get(), "listselectbox-2");
        $this->Select_Ids();
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $this->fFraud->get()->id->get()) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

    function Data_Control_Action()
    {

        $res = "";
        switch ($this->fFraud->get()->data_mode->get()) {
            case 1 :
                $stmt = "";
                if ($this->fFraud->get()->id->get() != null) {
                    $this->Select_Fraud_By_Id();
                    $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                }
                $this->Data_Control_Switcher($stmt);
                $res = $this->Box_Content_View();

                break;
            case 2 :
                foreach ($this->fFraud->get() as $key => $value) {
                    if ($value->fValidation !== null) {
                    }
                }

                if ($this->fFraud->get()->action->get() == 2) {
                    $this->Insert();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    $this->Data_Control_Switcher();
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", "", "2", "center-box-msg");
                }

                break;
            case 3 :

                if ($this->fFraud->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fFraud->get()->id->get() != null) {

                        $this->Select_Fraud_By_Id();
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

                if ($this->fFraud->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fFraud->get()->id->get() != null) {
                        $this->Select_Fraud_By_Id();
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
        switch ($this->fFraud->get()->data_mode->get()) {
            case 1 :
                $this->fFraud->get()->id->set($this->Fill_Id_Fraud_State());
                $this->Set_Default_Select_View($stmt);
                break;
            case 2 :
                $id = $this->cHtml->New_Code("- Новый -");
                $this->fFraud->get()->id->set($id);
                $this->Set_Default_Form_Content_View();
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 3 :
                $this->fFraud->get()->id->set($this->Fill_Id_Fraud_State());
                $this->Set_Default_Update_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 4 :
                $this->Select_Fraud_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                $this->fFraud->get()->id->set($this->Fill_Id_Fraud_State());
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
        $data_mode = $this->fFraud->get()->data_mode->get();
        $sel = array(1 => null, 2 => null, 3 => null, 4 => null);
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
        $res .= $this->cHtml->Start_Center_Box_Cap($this->fFraud->get()->is_child->get(), $cap);
        $res .= $this->cHtml->C_Box_Caption_Text("Ввод данных фрода");
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
        $res .= $this->cHtml->Table_2_Row_C2('Код:', $this->fFraud->get()->id->get(), "2");
        $res .= $this->cHtml->Table_Btn_Row_C2('Описание фрода:', $this->fFraud->get()->id_fraud_attr->get(), "2", "", "?menu=11&submenu=2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fFraud->get()->date1->get(), "2");

        $res .= $this->cHtml->Table_Btn_Row_C2("Предпринятые меры:", $this->fFraud->get()->id_fraud_actions->get(), "2", "", "?menu=10&submenu=2&module=names&table=fraud_actions&table_name=Предпринятые+меры");
        $res .= $this->cHtml->Table_2_Row_C2("Подробное описание:", $this->fFraud->get()->desc->get(), "2");

        return $res;
    }

    public function Set_Default_Form_Content_View()
    {
        $this->fFraud->get()->id_fraud_attr->set($this->cFraud_attr->Fill_Id_Fraud_Attr(null,false));    
        $this->fFraud->get()->date1->set($this->cHtml->Input_Date("date1", (new \DateTime())->format('Y-m-d')));
        $this->fFraud->get()->desc->set($this->cHtml->Input_RichText("desc", ""));
        $this->fFraud->get()->id_fraud_actions->set($this->cNames->Fill_Names("id_fraud_actions", "fraud_actions"));
    }

    public function Set_Default_Dash_View()
    {
        $this->fFraud->get()->id_fraud_attr->set("-");
        $this->fFraud->get()->date1->set("-");
        $this->fFraud->get()->desc->set("-");
        $this->fFraud->get()->id_fraud_actions->set("-");
    }

    public function Set_Default_Select_View($stmt)
    {
        if ($stmt != null) {
            if ($stmt->rowCount() != 0) {
                foreach ($stmt as $key) {
                    $this->fFraud->get()->id_fraud_attr->set($this->cHtml->Expand_Code($key["id_fraud_attr"]));
                    $this->fFraud->get()->date1->set($this->cDatabase->Convert_Date_To_Label($key["date1"]));
                    $this->fFraud->get()->desc->set($key["desc"]);
                    $this->fFraud->get()->id_fraud_actions->set($key["name_fraud_actions"]);
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
                    \var_dump($key["id_fraud_attr"]);
                    $this->fFraud->get()->id_fraud_attr->set($this->cFraud_attr->Fill_Id_Fraud_Attr($key["id_fraud_attr"],false));
                    $this->fFraud->get()->date1->set($this->cHtml->Input_Date("date1", $key["date1"]));
                    $this->fFraud->get()->desc->set($this->cHtml->Input_RichText("desc", $key["desc"]));
                    $this->fFraud->get()->id_fraud_actions->set($this->cNames->Fill_Names("id_fraud_actions", "fraud_actions", $key["id_fraud_actions"]));

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
}