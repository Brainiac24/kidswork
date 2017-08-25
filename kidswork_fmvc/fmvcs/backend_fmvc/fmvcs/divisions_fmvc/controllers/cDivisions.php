<?php
namespace Kidswork\Backend;


class cDivisions extends mDivisions
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $cNames = null;
    private $cFraud = null;
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
        $this->Menu();
    }

    function Init_Ajax()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        $this->cNames = $this->cKidswork->ctrls_global->ext("cNames");
        $this->cFraud = $this->cKidswork->ctrls_global->ext("cFraud");
        $this->Menu_Ajax();
    }

    public function Print()
    {
        return $this->fDivisions->get()->final_struct();
    }

    public function Menu_Ajax()
    {
        //\var_dump($this->fDivisions->get()->id_divisions_2->get());
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $ajax = $this->cRouter->fRouter->get()->ajax->get();
        if ($menu == "13") {
            if ($ajax == "2") {
                if ($this->fDivisions->get()->data_mode->get() == "") {
                    $this->fDivisions->get()->data_mode->set("2");
                }
                $this->Data_Control_Switcher();
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
            }
            elseif ($ajax == "3") {
                $this->Select_To_Table();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt, 'datatable-2'));
                }
            }
            elseif ($ajax == "4") {
                $this->cCenter->fCenter->get()->struct->con($this->Fill_Names("", $this->fDivisions->get()->form_name->get(), "child-divisions", $this->fDivisions->get()->id_divisions_2->get()));
            }
            else {
                if ($this->fDivisions->get()->is_child->get() == "") {
                    $this->fDivisions->get()->is_child->set("0");
                }
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
            }
        }
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("13" => null);
        \array_key_exists($menu, $active) ? $active[$menu] = true : false;

        if ($menu == "13") {
            $this->Submenu();
        }
        $this->cFraud->fFraud->get()->submenu->add(array("Подразделение", "?menu=13", "", $active[13]));


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
            if ($this->fDivisions->get()->data_mode->get() == "") {
                $this->fDivisions->get()->data_mode->set("2");
            }
            if ($this->fDivisions->get()->is_child->get() == "") {
                $this->fDivisions->get()->is_child->set("0");
            }
            $this->Data_Control_Switcher();
            $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
        }
        elseif ($submenu == "3") {
            $this->Select_To_Table();
            $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
            if ($stmt !== null) {
                $this->cCenter->fCenter->get()->width->set("100");
                $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt));
            }
        }
    }

    public function Fill_Ids($selected_value = "", $self = true, $form_name = "id_divisions")
    {
        $value = '';
        if ($form_name == "id_divisions") {
            if ($selected_value != "") {
                $this->fDivisions->get()->id->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id->get();
            }
        }elseif ($form_name == "id_divisions_2") {
            if ($selected_value != "") {
                $this->fDivisions->get()->id_divisions_2->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id_divisions_2->get();
            }
        }else{
            if ($selected_value != "") {
                $this->fDivisions->get()->id->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id->get();
            }
        }
        $id_module_code = "id_module_code";
        if (!$self) {
            $id_module_code = "";
        }
        $id = $this->cHtml->Start_Select_Element($id_module_code, $form_name, $value, "listselectbox-2");
        $this->Select_Ids();
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $value) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

    public function Fill_Names($selected_value = "", $form_name = "id_divisions", $id_module_code = "", $id_divisions_2='')
    {
        $value = '';
        if ($form_name == "id_divisions") {
            if ($selected_value != "") {
                $this->fDivisions->get()->id->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id->get();
            }
        }elseif ($form_name == "id_divisions_2"){
            if ($selected_value != "") {
                $this->fDivisions->get()->id_divisions_2->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id_divisions_2->get();
            }
        }else{
            if ($selected_value != "") {
                $this->fDivisions->get()->id->set($selected_value);
                $value = $selected_value;
            }else{
                $value = $this->fDivisions->get()->id->get();
            }
        }
        //$id_module_code = "id_module_code";
        //\var_dump($id_divisions_2);
        $id = $this->cHtml->Start_Select_Element($id_module_code, $form_name, $value, "listselectbox-2");
        $this->Select_Names($id_divisions_2);
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $value) {
                    $selected = "selected";
                }
                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["name"], $selected);
            }
        }
        $id .= $this->cHtml->End_Select_Element();
        return $id;
    }

    public function Fill_Ids_Parent()
    {
        $form_name = $this->fDivisions->get()->form_name->get();
        if ($this->fDivisions->get()->form_name_return->get() != '') {
            $form_name = $this->fDivisions->get()->form_name_return->get();
        }
        //$res0 = $this->fDivisions->get()->id->get();
        $res0 = $this->Fill_Names($this->fDivisions->get()->id->get(), $form_name, $this->fDivisions->get()->id_module_code->get(), $this->fDivisions->get()->id_divisions_2->get());
        $res1 = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
        header("Content-Type: application/json;charset=utf-8");
        $res = \json_encode(array('cmb' => $res0, 'msg' => $res1));

        return $res;
    }

    function Data_Control_Action()
    {
        $res = "";
        switch ($this->fDivisions->get()->data_mode->get()) {
            case 1 :
                $stmt = "";
                if ($this->fDivisions->get()->id->get() != null) {
                    $this->Select_By_Id();
                    $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                }
                $this->Data_Control_Switcher($stmt);
                $res = $this->Box_Content_View();

                break;
            case 2 :
                foreach ($this->fDivisions->get() as $key => $value) {
                    if ($value->fValidation !== null) {
                    }
                }

                if ($this->fDivisions->get()->action->get() == 2) {
                    $this->Set_Default_1_Insert();
                    $this->Insert();
                    if ($this->cDatabase->fDatabase->get()->last_inserted_id->get() > 0) {
                        $this->fDivisions->get()->id->set($this->cDatabase->fDatabase->get()->last_inserted_id->get());
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

                if ($this->fDivisions->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->Fill_Ids_Parent();
                }
                else {
                    if ($this->fDivisions->get()->id->get() != null) {

                        $this->Select_By_Id();
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

                if ($this->fDivisions->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->Fill_Ids_Parent();
                }
                else {
                    if ($this->fDivisions->get()->id->get() != null) {
                        $this->Select_By_Id();
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
        switch ($this->fDivisions->get()->data_mode->get()) {
            case 1 :
                $this->fDivisions->get()->id->set($this->Fill_Ids());
                $this->Set_Default_Select_View($stmt);
                break;
            case 2 :
                $id = $this->cHtml->New_Code("- Новый -");
                $this->fDivisions->get()->id->set($id);
                $this->Set_Default_Form_Content_View();
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 3 :
                $this->fDivisions->get()->id->set($this->Fill_Ids());
                $this->Set_Default_Update_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 4 :
                $this->Select_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                $this->fDivisions->get()->id->set($this->Fill_Ids());
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
        $data_mode = $this->fDivisions->get()->data_mode->get();
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
        $res .= $this->cHtml->Start_Center_Box_Cap($this->fDivisions->get()->is_child->get(), $cap);
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Icon_Dot($this->fDivisions->get()->is_child->get()) . "Подразделение");
        $res .= $this->cHtml->Box_Menu($data_mode, $sel, $menu, $submenu, $this->fDivisions->get()->form_name_return->get(), $this->fDivisions->get()->id_module_code->get());

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
        $res .= $this->cHtml->Table_2_Row_C2('Код:', $this->fDivisions->get()->id->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Код оргструктуры:", $this->fDivisions->get()->code->get(), "2");
        $res .= $this->cHtml->Table_Btn_Row_C2('Наименование:', $this->fDivisions->get()->id_divisions_names->get(), "2", "", "?menu=10&module=names&table=divisions_names&table_name=Наименование подразделения");
        $res .= $this->cHtml->Table_Btn_Row_C2('Категория:', $this->fDivisions->get()->id_divisions_categories->get(), "2", "", "?menu=10&module=names&table=divisions_categories&table_name=Категория подразделения");
        $res .= $this->cHtml->Table_Btn_Row_C2('Вышестоящее подразделение:', $this->fDivisions->get()->id_divisions_2->get(), "2", "", "?menu=13&submenu=2");
        $res .= $this->cHtml->Table_2_Row_C2("Описание:", $this->fDivisions->get()->desc->get(), "2");

        return $res;
    }

    public function Set_Default_Form_Content_View()
    {
        $this->fDivisions->get()->id_divisions_names->set($this->cNames->Fill_Names("id_divisions_names", "divisions_names", ""));
        $this->fDivisions->get()->id_divisions_categories->set($this->cNames->Fill_Names("id_divisions_categories", "divisions_categories", $this->fDivisions->get()->id_divisions_categories->get()));
        //$this->fDivisions->get()->id_divisions_2->set($this->Fill_Ids($this->fDivisions->get()->id_divisions_2->get(), false, "id_divisions_2"));
        if ($this->fDivisions->get()->id_divisions_2->get() == "") {
            $this->fDivisions->get()->id_divisions_2->set(' ');
        }
        $this->fDivisions->get()->id_divisions_2->set($this->Fill_Names($this->fDivisions->get()->id_divisions_2->get(), 'id_divisions_2', ""));
        //\var_dump($this->fDivisions->get()->id_divisions_2->get());
        $this->fDivisions->get()->code->set($this->cHtml->Input_Text("code"));
        $this->fDivisions->get()->desc->set($this->cHtml->Input_RichText("desc", ""));
    }

    public function Set_Default_Dash_View()
    {
        $this->fDivisions->get()->id_divisions_categories->set('-');
        $this->fDivisions->get()->id_divisions_names->set('-');
        $this->fDivisions->get()->id_divisions_2->set('-');
        $this->fDivisions->get()->code->set('-');
        $this->fDivisions->get()->desc->set('-');
    }

    public function Set_Default_1_Insert()
    {
        if ($this->fDivisions->get()->id_divisions_categories->get() == "") {
            $this->fDivisions->get()->id_divisions_categories->set('1');
        }
        if ($this->fDivisions->get()->id_divisions_names->get() == "") {
            $this->fDivisions->get()->id_divisions_names->set('1');
        }
        if ($this->fDivisions->get()->id_divisions_2->get() == "") {
            $this->fDivisions->get()->id_divisions_2->set('1');
        }
    }

    public function Set_Default_Select_View($stmt)
    {
        if ($stmt != null) {
            if ($stmt->rowCount() != 0) {
                foreach ($stmt as $key) {
                    $this->fDivisions->get()->id_divisions_categories->set($this->cHtml->Expand_Code($key["name_divisions_categories"]));
                    $this->fDivisions->get()->id_divisions_names->set($this->cHtml->Expand_Code($key["name_divisions_names"]));
                    $this->fDivisions->get()->id_divisions_2->set($this->cHtml->Expand_Code($key["name_divisions_names_2"]));
                    $this->fDivisions->get()->code->set($key["code"]);
                    $this->fDivisions->get()->desc->set($key["desc"]);
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
                    $this->fDivisions->get()->id_divisions_categories->set($this->cNames->Fill_Names("id_divisions_categories", "divisions_categories", $key["id_divisions_categories"]));
                    $this->fDivisions->get()->id_divisions_names->set($this->cNames->Fill_Names("id_divisions_names", "divisions_names", $key["id_divisions_names"]));
                    $this->fDivisions->get()->id_divisions_2->set($this->Fill_Ids($key["id_divisions_2"], false, "id_divisions_2"));
                    $this->fDivisions->get()->code->set($this->cHtml->Input_Text("code",$key["code"]));
                    $this->fDivisions->get()->desc->set($this->cHtml->Input_RichText("desc", $key["desc"]));
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
        $res .= $cHtml->Datatable_Th("Код оргструктуры");
        $res .= $cHtml->Datatable_Th("Наименование");
        $res .= $cHtml->Datatable_Th("Категория");
        $res .= $cHtml->Datatable_Th("Вышестоящее подразделение");
        $res .= $cHtml->Datatable_Th("Описание");
        $res .= $cHtml->End_Datatable_Tr();
        $res .= $cHtml->End_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Body();
        if ($stmt != null) {
            foreach ($stmt as $key) {
                $res .= $cHtml->Start_Datatable_Tr();
                $res .= $cHtml->Datatable_Td($key['id']);
                $res .= $cHtml->Datatable_Td($key['code']);
                $res .= $cHtml->Datatable_Td($key['name_divisions_names']);
                $res .= $cHtml->Datatable_Td($key['name_divisions_categories']);
                $res .= $cHtml->Datatable_Td($key['name_divisions_names_2']);
                $res .= $cHtml->Datatable_Td($key['desc']);
                $res .= $cHtml->End_Datatable_Tr();
            }
        }

        $res .= $cHtml->End_Datatable_Body();
        $res .= $cHtml->End_Table();
        $res .= $cHtml->End_Datatable();

        return $res;
    }


}
