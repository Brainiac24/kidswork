<?php
namespace Kidswork\Backend;

class cAudit extends mAudit
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $data_mode = null;
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


        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");


        $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
    }

    public function Print()
    {
        return $this->fAudit->get()->final_struct();
    }

    public function Menu()
    {

        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("3" => null, "4" => null, "5" => null, "6" => null, "7" => null, "8" => null, "9" => null, "10" => null);

        \array_key_exists($menu, $active) ? $active[$menu] = true : false;
        /*echo "<pre>";
        \var_dump($active[$menu]); 
        echo "</pre>";*/
        if ($menu == "5") {
            $submenu = $this->cRouter->fRouter->get()->submenu->get();
            $active2 = array("1" => null, "2" => null, "3" => null);
            \array_key_exists($submenu, $active2) ? $active2[$submenu] = true : false;
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Мониторинг", "?menu=" . $menu . "&submenu=1", "1", $active2[1]));
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Ввод данных", "?menu=" . $menu . "&submenu=2", "", $active2[2]));
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Отчётая таблица", "?menu=" . $menu . "&submenu=3", "", $active2[3]));
            if ($submenu == "2") {
                if ($this->fAudit->get()->data_mode->get() == "") {
                    $this->fAudit->get()->data_mode->set("2");
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
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Фрод", "?menu=3", "", $active[3]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Жалобы", "?menu=4", "", $active[4]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Аудит", "?menu=5", "", $active[5]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Недосдачи / излишки кассы", "?menu=6", "", $active[6]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Операции более 1-го раза", "?menu=7", "", $active[7]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Ликвидированные документы", "?menu=8", "", $active[8]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Перелимиты", "?menu=9", "", $active[9]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Справочник", "?menu=9", "", $active[10]));

        //\var_dump($this->cLeftmenu->fLeftmenu->get()->struct_array->get());



    }

    function Data_Control_Action()
    {
        $res = "";

        switch ($this->fAudit->get()->data_mode->get()) {
            case 1 :

                $this->Select_Audit_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();

                $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "listselectbox-2");
                $this->Select_Ids();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $selected = "";

                        if ($key["id"] == $this->fAudit->get()->id->get()) {
                            $selected = "selected";
                        }
                        $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                    }
                }
                $id .= $this->cHtml->End_Select_Element();

                $this->fAudit->get()->id->set($id);
                //\var_dump($stmt2);

                if ($stmt2 !== null) {
                    foreach ($stmt2 as $key) {
                        $this->fAudit->get()->id_divisions->set($key["name"]);

                        $this->fAudit->get()->date1->set($this->cDatabase->Convert_Date_To_Label($key["date1"]));

                        $this->fAudit->get()->assets->set($key["assets"]);
                        $this->fAudit->get()->assets_rate->set($key["assets_rate"]);

                        $this->fAudit->get()->management_1->set($key["management_1"]);
                        $this->fAudit->get()->management_rate_1->set($key["management_rate_1"]);

                        $this->fAudit->get()->management_2->set($key["management_2"]);
                        $this->fAudit->get()->management_rate_2->set($key["management_rate_2"]);

                        $this->fAudit->get()->management_3->set($key["management_3"]);
                        $this->fAudit->get()->management_rate_3->set($key["management_rate_3"]);

                        $this->fAudit->get()->earnings->set($key["earnings"]);
                        $this->fAudit->get()->earnings_rate->set($key["earnings_rate"]);

                        $this->fAudit->get()->turnover->set($key["turnover"]);
                        $this->fAudit->get()->turnover_rate->set($key["turnover_rate"]);

                        $this->fAudit->get()->reglaments->set($key["reglaments"]);
                        $this->fAudit->get()->reglaments_rate->set($key["reglaments_rate"]);

                        $this->fAudit->get()->projection->set($key["projection"]);
                        $this->fAudit->get()->projection_rate->set($key["projection_rate"]);

                        $this->fAudit->get()->risk->set($key["risk"]);
                        $this->fAudit->get()->risk_rate->set($key["risk_rate"]);

                        $this->fAudit->get()->total_rate->set($key["total_rate"]);
                    }
                }

                if ($stmt2->rowCount() == 0) {
                    $this->Set_Default_Dash_View();
                }

                $res = $this->Box_Content_View();
               
                break;
            case 2 :
                foreach ($this->fAudit->get() as $key => $value) {
                    if ($value->fValidation !== null) {
                        //var_dump($value->fValidation->get()->errors->get()) ;


                    }
                }

                if ($this->fAudit->get()->action->get() == 2) {
                    $this->Insert();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    $this->Data_Control_Switcher();
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"), "2", "center-box-msg");
                }

                break;
            case 3 :
                if ($this->fAudit->get()->action->get() == 3) {
                    $this->Update();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fAudit->get()->id->get() == null) {
                        $this->Data_Control_Switcher();
                    }
                    else {
                        $this->Select_Audit_By_Id();
                        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();

                        $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "listselectbox-2");
                        $this->Select_Ids();
                        $stmt1 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                        if ($stmt1 !== null) {
                            foreach ($stmt1 as $key) {
                                $selected = "";
                                if ($key["id"] == $this->fAudit->get()->id->get()) {
                                    $selected = "selected";
                                }
                                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                            }
                        }
                        $id .= $this->cHtml->End_Select_Element();
                        $this->fAudit->get()->id->set($id);

                        if ($stmt !== null) {
                            foreach ($stmt as $key) {
                                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", $key["id_divisions2"], "listselectbox-2", 'Выберите значение');
                                $this->Select_Ids_Divisions();
                                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                                if ($stmt2 !== null) {
                                    foreach ($stmt2 as $key2) {
                                        $selected = "";
                                        //echo $key["audit_id"];
                                        if ($key2["id"] == $key["id_divisions2"]) {
                                            $selected = "selected";

                                        }
                                        $id_divisions .= $this->cHtml->Option_Select_Element($key2["id"], $key2["name"], $selected);
                                    }
                                }
                                $id_divisions .= $this->cHtml->End_Select_Element();
                                $this->fAudit->get()->id_divisions->set($id_divisions);

                                $this->fAudit->get()->date1->set($this->cHtml->Input_Date("date1", $key["date1"]));

                                $this->fAudit->get()->assets->set($this->cHtml->Input_Text("assets", $key["assets"]));
                                $this->fAudit->get()->assets_rate->set($this->cHtml->Input_Hidden("assets_rate", $key["assets_rate"], $key["assets_rate"]));

                                $this->fAudit->get()->management_1->set($this->cHtml->Input_Text("management_1", $key["management_1"]));
                                $this->fAudit->get()->management_rate_1->set($this->cHtml->Input_Hidden("management_rate_1", $key["management_rate_1"], $key["management_rate_1"]));

                                $this->fAudit->get()->management_2->set($this->cHtml->Input_Text("management_2", $key["management_2"]));
                                $this->fAudit->get()->management_rate_2->set($this->cHtml->Input_Hidden("management_rate_2", $key["management_rate_2"], $key["management_rate_2"]));

                                $this->fAudit->get()->management_3->set($this->cHtml->Input_Text("management_3", $key["management_3"]));
                                $this->fAudit->get()->management_rate_3->set($this->cHtml->Input_Hidden("management_rate_3", $key["management_rate_3"], $key["management_rate_3"]));

                                $this->fAudit->get()->earnings->set($this->cHtml->Input_Text("earnings", $key["earnings"]));
                                $this->fAudit->get()->earnings_rate->set($this->cHtml->Input_Hidden("earnings_rate", $key["earnings_rate"], $key["earnings_rate"]));

                                $this->fAudit->get()->turnover->set($this->cHtml->Input_Text("turnover", $key["turnover"]));
                                $this->fAudit->get()->turnover_rate->set($this->cHtml->Input_Hidden("turnover_rate", $key["turnover_rate"], $key["turnover_rate"]));

                                $this->fAudit->get()->reglaments->set($this->cHtml->Input_Text("reglaments", $key["reglaments"]));
                                $this->fAudit->get()->reglaments_rate->set($this->cHtml->Input_Hidden("reglaments_rate", $key["reglaments_rate"], $key["reglaments_rate"]));

                                $this->fAudit->get()->projection->set($this->cHtml->Input_Text("projection", $key["projection"]));
                                $this->fAudit->get()->projection_rate->set($this->cHtml->Input_Hidden("projection_rate", $key["projection_rate"], $key["projection_rate"]));

                                $this->fAudit->get()->risk->set($this->cHtml->Input_Text("risk", $key["risk"]));
                                $this->fAudit->get()->risk_rate->set($this->cHtml->Input_Hidden("risk_rate", $key["risk_rate"], $key["risk_rate"]));

                                $this->fAudit->get()->total_rate->set($this->cHtml->Input_Hidden("total_rate", $key["total_rate"], $key["total_rate"]));
                            }
                        }
                    }

                   
                    $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Очистить"), "center-box-btn");
                    
                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"), "2", "center-box-msg");
                }


                break;
            case 4 :
                if ($this->fAudit->get()->action->get() == 4) {
                    $this->Delete();
                    $res = $this->cHtml->Table_2_Td_C2("Уведомление", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"));
                }
                else {
                    if ($this->fAudit->get()->id->get() == null) {
                        
                        
                        $this->Data_Control_Switcher();
                    }
                    else {
                        $this->Select_Audit_By_Id();
                        $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();

                        $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "listselectbox-2");
                        $this->Select_Ids();
                        $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                        if ($stmt !== null) {
                            foreach ($stmt as $key) {
                                $selected = "";

                                if ($key["id"] == $this->fAudit->get()->id->get()) {
                                    $selected = "selected";
                                }
                                $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                            }
                        }
                        $id .= $this->cHtml->End_Select_Element();

                        $this->fAudit->get()->id->set($id);

                        if ($stmt2 !== null) {
                            foreach ($stmt2 as $key) {
                                $this->fAudit->get()->id_divisions->set($key["name"]);

                                $this->fAudit->get()->date1->set($this->cDatabase->Convert_Date_To_Label($key["date1"]));

                                $this->fAudit->get()->assets->set($key["assets"]);
                                $this->fAudit->get()->assets_rate->set($key["assets_rate"]);

                                $this->fAudit->get()->management_1->set($key["management_1"]);
                                $this->fAudit->get()->management_rate_1->set($key["management_rate_1"]);

                                $this->fAudit->get()->management_2->set($key["management_2"]);
                                $this->fAudit->get()->management_rate_2->set($key["management_rate_2"]);

                                $this->fAudit->get()->management_3->set($key["management_3"]);
                                $this->fAudit->get()->management_rate_3->set($key["management_rate_3"]);

                                $this->fAudit->get()->earnings->set($key["earnings"]);
                                $this->fAudit->get()->earnings_rate->set($key["earnings_rate"]);

                                $this->fAudit->get()->turnover->set($key["turnover"]);
                                $this->fAudit->get()->turnover_rate->set($key["turnover_rate"]);

                                $this->fAudit->get()->reglaments->set($key["reglaments"]);
                                $this->fAudit->get()->reglaments_rate->set($key["reglaments_rate"]);

                                $this->fAudit->get()->projection->set($key["projection"]);
                                $this->fAudit->get()->projection_rate->set($key["projection_rate"]);

                                $this->fAudit->get()->risk->set($key["risk"]);
                                $this->fAudit->get()->risk_rate->set($key["risk_rate"]);

                                $this->fAudit->get()->total_rate->set($key["total_rate"]);
                            }
                        }

                        if ($stmt2->rowCount() == 0) {
                            $this->Set_Default_Dash_View();
                        }
                    }

                    $res = $this->Box_Content_View();
                    $res .= $this->box_bottom;
                    $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"), "2", "center-box-msg");
                }
                break;
            default :
                # code...
                break;
        }

        return $res;
    }

    function Data_Control_Switcher()
    {
        switch ($this->fAudit->get()->data_mode->get()) {
            case 1 :
                $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "btn-code-2", 'Код:');
                $this->Select_Ids();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $selected = "";
                        if ($key["id"] == $this->fAudit->get()->id->get()) {
                            $selected = "selected";
                        }
                        $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                    }
                }
                $id .= $this->cHtml->End_Select_Element();
                $this->fAudit->get()->id->set($id);

                $this->Set_Default_Dash_View();

                break;
            case 2 :

                $id = $this->cHtml->New_Code("- Новый -");
                $this->fAudit->get()->id->set($id);

                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", $this->fAudit->get()->id_divisions->get(), "listselectbox-2", 'Выберите значение');
                $this->Select_Ids_Divisions();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $id_divisions .= $this->cHtml->Option_Select_Element($key["id"], $key["name"]);
                    }
                }
                $id_divisions .= $this->cHtml->End_Select_Element();
                $this->fAudit->get()->id_divisions->set($id_divisions);

                $this->Set_Default_Form_Content_View();

                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Add("Добавить"), $this->cHtml->Action_Buttons_Default("Очистить"), "center-box-btn");
                break;

            case 3 :
                $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "listselectbox-2");
                $this->Select_Ids();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $selected = "";
                        if ($key["id"] == $this->fAudit->get()->id->get()) {
                            $selected = "selected";
                        }
                        $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                    }
                }
                $id .= $this->cHtml->End_Select_Element();
                $this->fAudit->get()->id->set($id);

                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", $this->fAudit->get()->id_divisions->get(), "listselectbox-2", 'Выберите значение');
                $this->Select_Ids_Divisions();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $id_divisions .= $this->cHtml->Option_Select_Element($key["id"], $key["name"]);
                    }
                }
                $id_divisions .= $this->cHtml->End_Select_Element();
                $this->fAudit->get()->id_divisions->set($id_divisions);

                $this->Set_Default_Form_Content_View();

                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Edit("Изменить"), $this->cHtml->Action_Buttons_Default("Очистить"));
                break;
            case 4 :

                $this->Select_Audit_By_Id();
                $stmt2 = $this->cDatabase->fDatabase->get()->pdo_stmt->get();

                $id = $this->cHtml->Start_Select_Element("id_module_code", "id_audit", $this->fAudit->get()->id->get(), "listselectbox-2");
                $this->Select_Ids();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    foreach ($stmt as $key) {
                        $selected = "";

                        if ($key["id"] == $this->fAudit->get()->id->get()) {
                            $selected = "selected";
                        }
                        $id .= $this->cHtml->Option_Select_Element($key["id"], $key["id"], $selected);
                    }
                }
                $id .= $this->cHtml->End_Select_Element();

                $this->fAudit->get()->id->set($id);

                $this->Set_Default_Dash_View();

                $this->box_bottom = $this->cHtml->Table_2_Row_C3("Действие:", $this->cHtml->Action_Buttons_Delete("Удалить"), $this->cHtml->Action_Buttons_Default("Очистить"));
                break;

            default :
                # code...
                break;
        }
    }

    function Data_Control_View()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $data_mode = $this->fAudit->get()->data_mode->get();
        $sel = array(1 => null, 2 => null, 3 => null, 4 => null);


        $sel[$data_mode] = "selected";
        
        $res = "";
        $res .= $this->cHtml->Start_Center_Wrapper();
        $res .= $this->cHtml->Start_Center_Box();
        $res .= $this->cHtml->Start_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cap();
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Input_Hidden("module", 'audit', "Ввод данных аудита"));
        $res .= $this->cHtml->Box_Menu();
        
        $res .= $this->cHtml->End_Center_Box_Cap();
        $res .= $this->cHtml->End_Center_Box_Top();

        $res .= $this->cHtml->Start_Table("table-box");
       /* $res .= $this->cHtml->Start_Datatable_Body("center-box-cap-2");

        $res .= $this->cHtml->Start_Datatable_Tr();
        $res .= $this->cHtml->Datatable_Td("Режим:", "tab-name");
        $res .= $this->cHtml->Start_Datatable_Td("tab-text", "2");
        $res .= $this->cHtml->Start_Select_Element("1", "data_mode", $this->fAudit->get()->data_mode->get(), "listselectbox-2", 'Выберите значение');
        $res .= $this->cHtml->Option_Select_Element("1", "Просмотр", $sel[1]);
        $res .= $this->cHtml->Option_Select_Element("2", "Добавление", $sel[2]);
        $res .= $this->cHtml->Option_Select_Element("3", "Изменение", $sel[3]);
        $res .= $this->cHtml->Option_Select_Element("4", "Удаление", $sel[4]);
        $res .= $this->cHtml->End_Select_Element();
        $res .= $this->cHtml->End_Datatable_Td();
        $res .= $this->cHtml->End_Datatable_Tr();
        $res .= $this->cHtml->End_Datatable_Body();
*/
        $res .= $this->cHtml->Start_Datatable_Body("center-box-cont");
        $res .= $this->Box_Content_View();
        
        $res .= $this->box_bottom;
        $res .= $this->cHtml->Table_2_Row_C2("Уведомление:", $this->cHtml->Action_Message_Success("Данные успешно сохранены!"), "2", "center-box-msg");
        $res .= $this->cHtml->End_Datatable_Body();
        $res .= $this->cHtml->End_Table();

        $res .= $this->cHtml->End_Center_Box();
        $res .= $this->cHtml->End_Center_Wrapper();
        $res .= $this->cHtml->Start_Center_Wrapper();
        $res .= $this->cHtml->End_Center_Wrapper();

        return $res;
    }


    public function Box_Content_View()
    {
        $res = "";
        $res .= $this->cHtml->Start_Datatable_Tr();
        $res .= $this->cHtml->Datatable_Td("Код:", "tab-name");
        $res .= $this->cHtml->Start_Datatable_Td("tab-text", 2);
        $res .= $this->fAudit->get()->id->get();
        $res .= $this->cHtml->End_Datatable_Td();
        $res .= $this->cHtml->End_Datatable_Tr();
        $res .= $this->cHtml->Table_Btn_Row_C2('Филиал:', $this->fAudit->get()->id_divisions->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fAudit->get()->date1->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент нестандартных кредитов:", $this->fAudit->get()->assets->get(), $this->fAudit->get()->assets_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Нарушение на одно кредитное досье:", $this->fAudit->get()->management_1->get(), $this->fAudit->get()->management_rate_1->get());
        $res .= $this->cHtml->Table_2_Row_C3("<div>Амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда: </div> <div>+</div>", $this->fAudit->get()->management_2->get(), $this->fAudit->get()->management_rate_2->get());
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент ошибок на один сайтвизит по кредиту:", $this->fAudit->get()->management_3->get(), $this->fAudit->get()->management_rate_3->get());
        $res .= $this->cHtml->Table_2_Row_C3("Рейтинг и показатели рентабельности:", $this->fAudit->get()->earnings->get(), $this->fAudit->get()->earnings_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Текучесть кадров:", $this->fAudit->get()->turnover->get(), $this->fAudit->get()->turnover_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Соблюдение регламентов:", $this->fAudit->get()->reglaments->get(), $this->fAudit->get()->reglaments_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Выполнение проекции:", $this->fAudit->get()->projection->get(), $this->fAudit->get()->projection_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Выявленные риски:", $this->fAudit->get()->risk->get(), $this->fAudit->get()->risk_rate->get());
        $res .= $this->cHtml->Table_2_Row_C2("Итоговый рейтинг:", $this->fAudit->get()->total_rate->get(), "2");

        return $res;
    }

    public function Set_Default_Form_Content_View()
    {
        $this->fAudit->get()->date1->set($this->cHtml->Input_Date("date1", (new \DateTime())->format('Y-m-d')));

        $this->fAudit->get()->assets->set($this->cHtml->Input_Text("assets"));
        $this->fAudit->get()->assets_rate->set($this->cHtml->Input_Hidden("assets_rate", '', '-'));

        $this->fAudit->get()->management_1->set($this->cHtml->Input_Text("management_1"));
        $this->fAudit->get()->management_rate_1->set($this->cHtml->Input_Hidden("management_rate_1", '', '-'));

        $this->fAudit->get()->management_2->set($this->cHtml->Input_Text("management_2"));
        $this->fAudit->get()->management_rate_2->set($this->cHtml->Input_Hidden("management_rate_2", '', '-'));

        $this->fAudit->get()->management_3->set($this->cHtml->Input_Text("management_3"));
        $this->fAudit->get()->management_rate_3->set($this->cHtml->Input_Hidden("management_rate_3", '', '-'));

        $this->fAudit->get()->earnings->set($this->cHtml->Input_Text("earnings"));
        $this->fAudit->get()->earnings_rate->set($this->cHtml->Input_Hidden("earnings_rate", '', '-'));

        $this->fAudit->get()->turnover->set($this->cHtml->Input_Text("turnover"));
        $this->fAudit->get()->turnover_rate->set($this->cHtml->Input_Hidden("turnover_rate", '', '-'));

        $this->fAudit->get()->reglaments->set($this->cHtml->Input_Text("reglaments"));
        $this->fAudit->get()->reglaments_rate->set($this->cHtml->Input_Hidden("reglaments_rate", '', '-'));

        $this->fAudit->get()->projection->set($this->cHtml->Input_Text("projection"));
        $this->fAudit->get()->projection_rate->set($this->cHtml->Input_Hidden("projection_rate", '', '-'));

        $this->fAudit->get()->risk->set($this->cHtml->Input_Text("risk"));
        $this->fAudit->get()->risk_rate->set($this->cHtml->Input_Hidden("risk_rate", '', '-'));

        $this->fAudit->get()->total_rate->set($this->cHtml->Input_Hidden("total_rate", '', '-'));

    }

    public function Set_Default_Dash_View()
    {
        $this->fAudit->get()->id_divisions->set("-");
        $this->fAudit->get()->date1->set("-");
        $this->fAudit->get()->assets->set("-");
        $this->fAudit->get()->assets_rate->set("-");
        $this->fAudit->get()->management_1->set("-");
        $this->fAudit->get()->management_rate_1->set("-");
        $this->fAudit->get()->management_2->set("-");
        $this->fAudit->get()->management_rate_2->set("-");
        $this->fAudit->get()->management_3->set("-");
        $this->fAudit->get()->management_rate_3->set("-");
        $this->fAudit->get()->earnings->set("-");
        $this->fAudit->get()->earnings_rate->set("-");
        $this->fAudit->get()->turnover->set("-");
        $this->fAudit->get()->turnover_rate->set("-");
        $this->fAudit->get()->reglaments->set("-");
        $this->fAudit->get()->reglaments_rate->set("-");
        $this->fAudit->get()->projection->set("-");
        $this->fAudit->get()->projection_rate->set("-");
        $this->fAudit->get()->risk->set("-");
        $this->fAudit->get()->risk_rate->set("-");
        $this->fAudit->get()->total_rate->set("-");
    }



    function Datatable($stmt)
    {

        $cHtml = $this->cHtml;
        $res = '';
        $res .= $cHtml->Start_Datatable();
        $res .= $cHtml->Start_Table("table-1");
        $res .= $cHtml->Start_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Tr();
        $res .= $cHtml->Datatable_Th("Код");
        $res .= $cHtml->Datatable_Th("Дата");
        $res .= $cHtml->Datatable_Th("Филиал");
        $res .= $cHtml->Datatable_Th("Коэффициент нестандартных кредитов");
        $res .= $cHtml->Datatable_Th("Рейтинг коэффициента нестандартных кредитов");
        $res .= $cHtml->Datatable_Th("Нарушение на одно кредитное досье");
        $res .= $cHtml->Datatable_Th("Рейтинг нарушениа на одно кредитное досье");
        $res .= $cHtml->Datatable_Th("Амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда");
        $res .= $cHtml->Datatable_Th("Рейтинг амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда");
        $res .= $cHtml->Datatable_Th("Коэффициент ошибок на один сайтвизит по кредиту");
        $res .= $cHtml->Datatable_Th("Рейтинг коэффициента ошибок на один сайтвизит по кредиту");
        $res .= $cHtml->Datatable_Th("Рейтинг и показатели рентабельности");
        $res .= $cHtml->Datatable_Th("Бал рейтинга и показателий рентабельности");
        $res .= $cHtml->Datatable_Th("Текучесть кадров");
        $res .= $cHtml->Datatable_Th("Рейтинг текучести кадров");
        $res .= $cHtml->Datatable_Th("Соблюдение регламентов");
        $res .= $cHtml->Datatable_Th("Рейтинг соблюдения регламентов");
        $res .= $cHtml->Datatable_Th("Выполнение проекции");
        $res .= $cHtml->Datatable_Th("Рейтинг выполнения проекции");
        $res .= $cHtml->Datatable_Th("Выявленные риски");
        $res .= $cHtml->Datatable_Th("Рейтинг выявленных рисков");
        $res .= $cHtml->Datatable_Th("Итоговый рейтинг");
        $res .= $cHtml->End_Datatable_Tr();
        $res .= $cHtml->End_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Body();
        if ($stmt != null) {
            foreach ($stmt as $key) {
                $res .= $cHtml->Start_Datatable_Tr();
                $res .= $cHtml->Datatable_Td($key['id_audit']);
                $res .= $cHtml->Datatable_Td($key['date1']);
                $res .= $cHtml->Datatable_Td($key['name']);
                $res .= $cHtml->Datatable_Td($key['assets']);
                $res .= $cHtml->Datatable_Td($key['assets_rate']);
                $res .= $cHtml->Datatable_Td($key['management_1']);
                $res .= $cHtml->Datatable_Td($key['management_2']);
                $res .= $cHtml->Datatable_Td($key['management_3']);
                $res .= $cHtml->Datatable_Td($key['management_rate_1']);
                $res .= $cHtml->Datatable_Td($key['management_rate_2']);
                $res .= $cHtml->Datatable_Td($key['management_rate_3']);
                $res .= $cHtml->Datatable_Td($key['earnings']);
                $res .= $cHtml->Datatable_Td($key['earnings_rate']);
                $res .= $cHtml->Datatable_Td($key['turnover']);
                $res .= $cHtml->Datatable_Td($key['turnover_rate']);
                $res .= $cHtml->Datatable_Td($key['reglaments']);
                $res .= $cHtml->Datatable_Td($key['reglaments_rate']);
                $res .= $cHtml->Datatable_Td($key['projection']);
                $res .= $cHtml->Datatable_Td($key['projection_rate']);
                $res .= $cHtml->Datatable_Td($key['risk']);
                $res .= $cHtml->Datatable_Td($key['risk_rate']);
                $res .= $cHtml->Datatable_Td($key['total_rate']);
                $res .= $cHtml->End_Datatable_Tr();
            }
        }

        $res .= $cHtml->End_Datatable_Body();
        $res .= $cHtml->End_Table();
        $res .= $cHtml->End_Datatable();

        return $res;
    }



}
