<?php
namespace Kidswork\Backend;


class cFraud extends mFraud
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
        $this->menu();
    }

    function Init_Ajax()
    {
        if ($this->cRouter->fRouter->get()->menu->get() == "3") {
            $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
            $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
            $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
        }
    }

    public function Print()
    {
        return $this->fFraud->get()->final_struct();
    }

    public function Menu()
    {
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("3" => null);
        \array_key_exists($menu, $active) ? $active[$menu] = true : false;
        if ($menu == "3") {
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
                //$this->Data_Control_Switcher();
                $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());
            }
            elseif ($submenu == "3") {
                //$this->Select_Audit_To_Table();
                $stmt = $this->cDatabase->fDatabase->get()->pdo_stmt->get();
                if ($stmt !== null) {
                    //$this->cCenter->fCenter->get()->struct->con($this->Datatable($stmt));

                }

            }
        }
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Фрод", "?menu=3", "", $active[3]));
    }

    function Data_Control_View()
    {

        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $data_mode = $this->fFraud->get()->data_mode->get();
        $sel = array(1 => null, 2 => null, 3 => null, 4 => null);


        $sel[$data_mode] = "selected";

        $res = "";
        $res .= $this->cHtml->Start_Center_Wrapper();
        $res .= $this->cHtml->Start_Center_Box();
        $res .= $this->cHtml->Start_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cap(0);
        $res .= $this->cHtml->C_Box_Caption_Text($this->cHtml->Input_Hidden("module", 'fraud', "Состояние фрода"));
        $res .= $this->cHtml->Box_Menu();

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
        $res .= $this->cHtml->End_Center_Wrapper();

        return $res;
    }

    public function Box_Content_View()
    {
        $res = "";
        $res .= $this->cHtml->Start_Datatable_Tr();
        $res .= $this->cHtml->Datatable_Td("Код:", "tab-name");
        $res .= $this->cHtml->Start_Datatable_Td("tab-text", 2);
        //$res .= $this->fAudit->get()->id->get();
        $res .= $this->cHtml->End_Datatable_Td();
        $res .= $this->cHtml->End_Datatable_Tr();
        $res .= $this->cHtml->Table_Btn_Row_C2('Фрод:', '-', "2", "", "?menu=10&submenu=2&child_module=divisions&ajax=1");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", '-', "2");
        $res .= $this->cHtml->Table_2_Row_C2("Предпринятые меры:", '-', "2");
        $res .= $this->cHtml->Table_2_Row_C2("Описание предпринятых мер:", '-', "2");

        return $res;
    }


    function Data_Control_Switcher()
    {
        switch ($this->fAudit->get()->data_mode->get()) {
            case 1 :
                break;
            case 2 :
                break;
            case 3 :
                break;
            case 4 :
                break;
            default :
                break;
        }
    }


    function Data_Control_Action()
    {
        $res = "";
        switch ($this->fFraud->get()->data_mode->get()) {
            case 1 :
                break;
            case 2 :
                break;
            case 3 :
                break;
            case 4 :
                break;
            default :
                break;
        }
    }
}