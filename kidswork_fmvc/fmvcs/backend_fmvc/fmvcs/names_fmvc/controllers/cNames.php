<?php
namespace Kidswork\Backend;


class cNames extends mNames
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $box_bottom = null;

    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cLeftmenu = $this->cKidswork->ctrls_global->ext("cLeftmenu");
        $this->cTopmenu = $this->cKidswork->ctrls_global->ext("cTopmenu");
        $this->cTopmenu2 = $this->cKidswork->ctrls_global->ext("cTopmenu2");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->Menu();
    }

    function Init_Ajax()
    {
        //\var_dump($is_child);
        $this->cDatabase = $this->cKidswork->ctrls_global->ext("cDatabase");
        $this->cRouter = $this->cKidswork->ctrls_global->ext("cRouter");
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");


        if ($this->cRouter->fRouter->get()->menu->get() == "10") {
            if ($this->cRouter->fRouter->get()->ajax->get() == "2") {
                if ($this->fNames->get()->data_mode->get() == "") {
                    $this->fNames->get()->data_mode->set("2");
                }
                $this->Data_Control_Switcher();
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
            }
            else {
                if ($this->fNames->get()->table->get() == "") {
                    $this->fNames->get()->table->set("fraud_actions");
                }
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
            }

        }
    }

    public function Print()
    {
        return $this->fNames->get()->final_struct();
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        if ($menu == "10") {
            $this->Submenu();
        }
    }

    public function Submenu()
    {
        $this->fNames->get()->table_name->set("fraud_actions");
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $active2 = array("1" => null, "2" => null, "3" => null);
        \array_key_exists($submenu, $active2) ? $active2[$submenu] = true : false;
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Мониторинг", "?menu=" . $menu . "&submenu=1", "1", $active2[1]));
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Ввод данных", "?menu=" . $menu . "&submenu=2", "", $active2[2]));
        $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Отчётая таблица", "?menu=" . $menu . "&submenu=3", "", $active2[3]));
        if ($submenu == "2") {
            if ($this->fNames->get()->data_mode->get() == "") {
                $this->fNames->get()->data_mode->set("2");
                $this->fNames->get()->table_name->set('Предпринятыe меры');
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

    public function Fill_Id_Names($selected_value = "")
    {
        if ($selected_value == "") {
            $selected_value = $this->fNames->get()->id->get();
        }
        $id = $this->cHtml->Start_Select_Element("id_module_code", "id_names", $this->fNames->get()->id->get(), "listselectbox-2");
        $this->Select_Ids();
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $this->fNames->get()->id->get()) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

    public function Fill_Names($input_name = "", $table = "", $selected_value = "")
    {
        //var_dump($this->fNames->get()->table->get());
        if ($table != "") {
            $this->fNames->get()->table->set($table);
        }
        //\var_dump($selected_value);
        if ($selected_value != "") {
            $this->fNames->get()->id->set($selected_value);
        }
        $id = $this->cHtml->Start_Select_Element("", $input_name, $this->fNames->get()->id->get(), "listselectbox-2");
        $this->Select_Ids();
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $this->fNames->get()->id->get()) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["name"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

        
    public function Fill_Names_Parent()
    {
        $res0 = $this->Fill_Names("id_".$this->fNames->get()->table->get());
        $res1 = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
        header("Content-Type: application/json;charset=utf-8");
        $res = \json_encode(array('cmb' => $res0, 'msg' => $res1));

        return $res;
    }

    function Data_Control_Action()
    {
        $res = "";
        switch ($this->fNames->get()->data_mode->get()) {
            case 1 :
                $stmt = null;
                if ($this->fNames->get()->id->get() != null) {
                    $this->Select_Names_By_Id();
                    $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                }
                $this->Data_Control_Switcher($stmt);
                $res = $this->Box_Content_View();
                break;
            case 2 :

                if ($this->fNames->get()->action->get() == 2) {
                    $this->Insert();
                    if ($this->cDatabase->fDatabase->get()->last_inserted_id->get() > 0) {
                        $this->fNames->get()->id->set($this->cDatabase->fDatabase->get()->last_inserted_id->get());
                    }
                    $res = $this->Fill_Names_Parent();
                }
                else {
                    $this->Data_Control_Switcher();
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", "", "2", "center-box-msg");
                }
                break;
            case 3 :

                if ($this->fNames->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->Fill_Names_Parent();
                }
                else {
                    if ($this->fNames->get()->id->get() != null) {
                        $this->Select_Names_By_Id();
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

                if ($this->fNames->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->Fill_Names_Parent();
                }
                else {
                    if ($this->fNames->get()->id->get() != null) {
                        $this->Select_Names_By_Id();
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
        switch ($this->fNames->get()->data_mode->get()) {
            case 1 :
                $this->fNames->get()->id->set($this->Fill_Id_Names());
                $this->Set_Default_Select_View($stmt);
                break;
            case 2 :
                $id = $this->cHtml->New_Code("- Новый -");
                $this->fNames->get()->id->set($id);
                $this->Set_Default_Form_Content_View();
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 3 :
                $this->fNames->get()->id->set($this->Fill_Id_Names());
                $this->Set_Default_Update_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 4 :
                $this->Select_Names_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                $this->fNames->get()->id->set($this->Fill_Id_Names());
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
        $data_mode = $this->fNames->get()->data_mode->get();
        //\var_dump($data_mode);
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
        $res .= $this->cHtml->Start_Center_Box_Cap($this->fNames->get()->is_child->get(), $cap);
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Input_Hidden("table", $this->fNames->get()->table->get(), $this->cHtml->Icon_Dot($this->fNames->get()->is_child->get()) . $this->fNames->get()->table_name->get()));
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
        $res .= $this->cHtml->Table_2_Row_C2('Код:', $this->fNames->get()->id->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Наименование:", $this->fNames->get()->name->get(), "2");
        return $res;
    }

    public function Set_Default_Form_Content_View()
    {
        $this->fNames->get()->name->set($this->cHtml->Input_Text("name", '', '-'));

    }

    public function Set_Default_Dash_View()
    {
        $this->fNames->get()->name->set("-");
    }

    public function Set_Default_Select_View($stmt)
    {
        if ($stmt !== null && $stmt->rowCount() != 0) {
            foreach ($stmt as $key) {
                $this->fNames->get()->name->set($key["name"]);
            }
        }
        else {
            $this->Set_Default_Dash_View();
        }
    }

    public function Set_Default_Update_View($stmt)
    {
        if ($stmt !== null) {

            foreach ($stmt as $key) {
                $this->fNames->get()->name->set($this->cHtml->Input_Text("name", $key["name"]));
            }
        }
        else {
            $this->Set_Default_Form_Content_View();
        }
    }

}


