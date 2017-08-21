<?php
namespace Kidswork\Backend;


class cCurrency_rates extends mCurrency_rates
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
        return $this->fCurrency_rates->get()->final_struct();
    }

    public function Menu_Ajax()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $ajax = $this->cRouter->fRouter->get()->ajax->get();
        if ($menu == "12") {
            if ($ajax == "2") {
                if ($this->fCurrency_rates->get()->data_mode->get() == "") {
                    $this->fCurrency_rates->get()->data_mode->set("2");
                }
                $this->Data_Control_Switcher();
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
            }elseif($ajax == "3"){
                $this->Select_To_Table();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    $this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt,'datatable-2'));
                }
            }
            else {
                if ($this->fCurrency_rates->get()->is_child->get() == "") {
                    $this->fCurrency_rates->get()->is_child->set("0");
                }
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
            }
        }
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("12" => null);
        \array_key_exists($menu, $active) ? $active[$menu] = true : false;

        if ($menu == "12") {
            $this->Submenu();
        }
        $this->cFraud->fFraud->get()->submenu->add(array("Курс валют", "?menu=12", "" , $active[12]));
        
    
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
            if ($this->fCurrency_rates->get()->data_mode->get() == "") {
                $this->fCurrency_rates->get()->data_mode->set("2");
            }
            if ($this->fCurrency_rates->get()->is_child->get() == "") {
                $this->fCurrency_rates->get()->is_child->set("0");
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

    public function Fill_Id_Currency_Rates($selected_value = "", $self = true)
    {
        if ($selected_value != "") {
            $this->fCurrency_rates->get()->id->set($selected_value);
        }
        $id_module_code = "id_module_code";
        if (!$self) {
            $id_module_code = "";
        }
        //\var_dump($this->fCurrency_rates->get()->id->get());
        $id = $this->cHtml->Start_Select_Element($id_module_code, "id_currency_rates", $this->fCurrency_rates->get()->id->get(), "listselectbox-2");
        $this->Select_Ids();
        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
        if ($stmt !== null) {
            foreach ($stmt as $key) {
                $selected = "";
                if ($key["id"] == $this->fCurrency_rates->get()->id->get()) {
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
        switch ($this->fCurrency_rates->get()->data_mode->get()) {
            case 1 :
                $stmt = "";
                if ($this->fCurrency_rates->get()->id->get() != null) {
                    $this->Select_By_Id();
                    $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                }
                $this->Data_Control_Switcher($stmt);
                $res = $this->Box_Content_View();

                break;
            case 2 :
                foreach ($this->fCurrency_rates->get() as $key => $value) {
                    if ($value->fValidation !== null) {
                    }
                }

                if ($this->fCurrency_rates->get()->action->get() == 2) {
                    $this->Set_Default_1_Insert();
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

                if ($this->fCurrency_rates->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fCurrency_rates->get()->id->get() != null) {

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

                if ($this->fCurrency_rates->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fCurrency_rates->get()->id->get() != null) {
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
        switch ($this->fCurrency_rates->get()->data_mode->get()) {
            case 1 :
                $this->fCurrency_rates->get()->id->set($this->Fill_Id_Currency_Rates());
                $this->Set_Default_Select_View($stmt);
                break;
            case 2 :
                $id = $this->cHtml->New_Code("- Новый -");
                $this->fCurrency_rates->get()->id->set($id);
                $this->Set_Default_Form_Content_View();
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 3 :
                $this->fCurrency_rates->get()->id->set($this->Fill_Id_Currency_Rates());
                $this->Set_Default_Update_View($stmt);
                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Отмена"), "center-box-btn");
                break;
            case 4 :
                $this->Select_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                $this->fCurrency_rates->get()->id->set($this->Fill_Id_Currency_Rates());
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
        $data_mode = $this->fCurrency_rates->get()->data_mode->get();
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
        $res .= $this->cHtml->Start_Center_Box_Cap($this->fCurrency_rates->get()->is_child->get(), $cap);
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Icon_Dot($this->fCurrency_rates->get()->is_child->get())."Курс валют");
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
        $res .= $this->cHtml->Table_2_Row_C2('Код:', $this->fCurrency_rates->get()->id->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fCurrency_rates->get()->date1->get(), "2");
        $res .= $this->cHtml->Table_Btn_Row_C2('Валюта:', $this->fCurrency_rates->get()->id_currency->get(), "2", "", "?menu=10&module=names&table=currency&table_name=Валюта");
        $res .= $this->cHtml->Table_2_Row_C2("Курс:", $this->fCurrency_rates->get()->rate->get(), "2");

        return $res;
    }

    public function Set_Default_Form_Content_View()
    {    
        $this->fCurrency_rates->get()->id_currency->set($this->cNames->Fill_Names("id_currency", "currency", ""));    
        $this->fCurrency_rates->get()->date1->set($this->cHtml->Input_Date("date1", (new \DateTime())->format('Y-m-d')));
        $this->fCurrency_rates->get()->rate->set(($this->cHtml->Input_Text("rate")));
    }

    public function Set_Default_Dash_View()
    {
        $this->fCurrency_rates->get()->id_currency->set("-");
        $this->fCurrency_rates->get()->date1->set("-");
        $this->fCurrency_rates->get()->rate->set("-");
    }

    public function Set_Default_1_Insert()
    {
        if ($this->fCurrency_rates->get()->id_currency->get()=="") {
            $this->fCurrency_rates->get()->id_currency->set('1');
        }
        if ($this->fCurrency_rates->get()->rate->get()=="") {
            $this->fCurrency_rates->get()->rate->set('1');
        }
    }

    public function Set_Default_Select_View($stmt)
    {
        if ($stmt != null) {
            if ($stmt->rowCount() != 0) {
                foreach ($stmt as $key) {
                    $this->fCurrency_rates->get()->id_currency->set($this->cHtml->Expand_Code($key["name_currency"]));
                    $this->fCurrency_rates->get()->date1->set($this->cDatabase->Convert_Date_To_Label($key["date1"]));
                    $this->fCurrency_rates->get()->rate->set($key["rate"]);
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
                    //\var_dump($key["id_fraud_attr"]);
                    $this->fCurrency_rates->get()->id_currency->set($this->cNames->Fill_Names("id_currency", "currency", $key["id_currency"]));
                    $this->fCurrency_rates->get()->date1->set($this->cHtml->Input_Date("date1", $key["date1"]));
                    $this->fCurrency_rates->get()->rate->set(($this->cHtml->Input_Text("rate",$key["rate"])));

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

    function Datatable($stmt, $class='datatable')
    {

        $cHtml = $this->cHtml;
        $res = '';
        $res .= $cHtml->Start_Datatable($class);
        $res .= $cHtml->Start_Table("table-1");
        $res .= $cHtml->Start_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Tr();
        $res .= $cHtml->Datatable_Th("Код");
        $res .= $cHtml->Datatable_Th("Дата");
        $res .= $cHtml->Datatable_Th("Валюта");
        $res .= $cHtml->Datatable_Th("Курс");
        $res .= $cHtml->End_Datatable_Tr();
        $res .= $cHtml->End_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Body();
        if ($stmt != null) {
            foreach ($stmt as $key) {
                $res .= $cHtml->Start_Datatable_Tr();
                $res .= $cHtml->Datatable_Td($key['id_currency_rates']);
                $res .= $cHtml->Datatable_Td($this->cDatabase->Convert_Date_To_Label($key['date1']));
                $res .= $cHtml->Datatable_Td($key['name_currency']);
                $res .= $cHtml->Datatable_Td($key['rate']);
                $res .= $cHtml->End_Datatable_Tr();
            }
        }

        $res .= $cHtml->End_Datatable_Body();
        $res .= $cHtml->End_Table();
        $res .= $cHtml->End_Datatable();

        return $res;
    }



}
