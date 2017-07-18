<?php
namespace Kidswork\Backend;

class cAudit extends mAudit
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $data_mode = null;
    private $box_bottom = null;


    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $this->cLeftmenu = $this->cKidswork->fKidswork->get_controllers_array()["cLeftmenu"];
        $this->cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];
        $this->cCenter = $this->cKidswork->fKidswork->get_controllers_array()["cCenter"];
        $this->Menu();

        $this->Data_Control_Switcher();
        $this->cCenter->fCenter->add_struct($this->Data_Control_View());

        //$this->cLeftmenu->fLeftmenu->add_struct($this->Print());
    }

    function Init_Ajax()
    {
        $this->cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];

        $this->cKidswork->fKidswork->set_ajax($this->Data_Control_Action());
    }

    public function Print()
    {
        return $this->fAudit->get_final_struct();
    }

    public function Menu()
    {
        $menu = $this->cRouter->get_request("menu");
        $active = array("3"=>null,"4"=>null,"5"=>null,"6"=>null,"7"=>null,"8"=>null,"9"=>null);
        $active[$menu]=true;
        if ($menu=="5") {
            $submenu = $this->cRouter->get_request("submenu");
            $active2 = array("1"=>null,"2"=>null,"3"=>null);
            $active2[$submenu]=true;
            $this->cTopmenu2->fTopmenu2->add_struct_array(array("Мониторинг","?menu=".$menu."&submenu=1","1",$active2[1]));
            $this->cTopmenu2->fTopmenu2->add_struct_array(array("Ввод данных","?menu=".$menu."&submenu=2","",$active2[2]));
            $this->cTopmenu2->fTopmenu2->add_struct_array(array("Итоговый отчёт","?menu=".$menu."&submenu=3","",$active2[3]));
        }
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Фрод","?menu=3","",$active[3]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Жалобы","?menu=4","",$active[4]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Аудит","?menu=5","",$active[5]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Недосдачи / излишки кассы","?menu=6","",$active[6]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Операции более 1-го раза","?menu=7","",$active[7]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Ликвидированные документы","?menu=8","",$active[8]));
        $this->cLeftmenu->fLeftmenu->add_struct_array(array("Перелимиты","?menu=9","",$active[9]));
    }

    function Data_Control_Action()
    {   
        $res = "";
        $this->fAudit->set_data_mode($this->cRouter->get_request("data_mode"));
        switch ($this->fAudit->get_data_mode()) {
            case 1:
                break;
            case 2:
                



                $res .= $this->cHtml->Action_Buttons_Text("Уведомление:");
                $res .= $this->cHtml->Action_Message_Success("Данные успешно сохранены!");
                break;
            case 3:
                break;
            case 4:
                break;
            default:
                # code...
                break;
        }

        return $res;
    }

    function Data_Control_Switcher()
    {
        $this->fAudit->set_data_mode($this->cRouter->get_request("data_mode"));
        switch ($this->fAudit->get_data_mode()) {
            case 1:
                $this->fAudit->set_date1("-");
                break;
            case 2:
                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", "listselectbox-2", 'Выберите значение' );
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '002 - ФҶСК "Бонки Эсхата" дар ш. Душанбе');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '003 - ФҶСК "Бонки Эсхата" дар ш. Қӯрғонтеппа-1');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '004 - ФҶСК "Бонки Эсхата" дар ш. Хуҷанд');
                $id_divisions .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_id_divisions($id_divisions);

                $this->fAudit->set_date1($this->cHtml->Input_Date("date1",(new \DateTime())->format('Y-m-d')));

                $this->fAudit->set_assets($this->cHtml->Input_Text("assets"));
                $this->fAudit->set_assets_rate('-');

                $this->fAudit->set_management_1($this->cHtml->Input_Text("management_1"));
                $this->fAudit->set_management_rate_1('-');

                $this->fAudit->set_management_2($this->cHtml->Input_Text("management_2"));
                $this->fAudit->set_management_rate_2('-');

                $this->fAudit->set_management_3($this->cHtml->Input_Text("management_3"));
                $this->fAudit->set_management_rate_3('-');

                $this->fAudit->set_earnings($this->cHtml->Input_Text("earnings"));
                $this->fAudit->set_earnings_rate('-');

                $this->fAudit->set_turnover($this->cHtml->Input_Text("turnover"));
                $this->fAudit->set_turnover_rate('-');

                $this->fAudit->set_reglaments($this->cHtml->Input_Text("reglaments"));
                $this->fAudit->set_reglaments_rate('-');
                
                $this->fAudit->set_projection($this->cHtml->Input_Text("projection"));
                $this->fAudit->set_projection_rate('-');
                
                $this->fAudit->set_risk($this->cHtml->Input_Text("risk"));
                $this->fAudit->set_risk_rate('-');

                $this->fAudit->set_total_rate('-');

                $this->box_bottom = "";
                $this->box_bottom .= $this->cHtml->Start_Center_Box_Bottom();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Text("Действие:");
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Add("Добавить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons("b-l-1");
                $this->box_bottom .= $this->cHtml->Action_Buttons_Default("Очистить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->End_Center_Box_Bottom();

                break;

            case 3:
                $this->box_bottom = "";
                $this->box_bottom .= $this->cHtml->Start_Center_Box_Bottom();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Text("Действие:");
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons("b-r-1");
                $this->box_bottom .= $this->cHtml->Action_Buttons_Edit("Изменить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Default("Очистить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->End_Center_Box_Bottom();
                break;
            case 4:
            $this->box_bottom = "";
                $this->box_bottom .= $this->cHtml->Start_Center_Box_Bottom();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Text("Действие:");
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons("b-r-1");
                $this->box_bottom .= $this->cHtml->Action_Buttons_Add("Удалить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Start_Action_Buttons();
                $this->box_bottom .= $this->cHtml->Action_Buttons_Default("Очистить");
                $this->box_bottom .= $this->cHtml->End_Action_Buttons();
                $this->box_bottom .= $this->cHtml->End_Center_Box_Bottom();
                break;
            
            default:
                # code...
                break;
        }
    }

    function Data_Control_View()
    {
        $menu = $this->cRouter->get_request("menu");
        $submenu = $this->cRouter->get_request("submenu");
        $data_mode = $this->cRouter->get_request("data_mode");
        $sel = array(1=>null,2=>null,3=>null,4=>null);

        //\var_dump($data_mode);
        $sel[$data_mode]=true;

        $res = "";

        $res .= $this->cHtml->Start_Center_Wrapper();
        $res .= $this->cHtml->Start_Center_Box();
        $res .= $this->cHtml->Start_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cap();
        $res .= $this->cHtml->C_Box_Caption_Text("Ввод данных по аудированию");
        $res .= $this->cHtml->End_Center_Box_Cap();
        $res .= $this->cHtml->Start_Center_Box_Cap_2();
        $res .= $this->cHtml->Start_Center_Box_Code();
        $res .= $this->cHtml->Start_Select_Element("1", "id_audit", "btn-code-2", 'Код:' );
        $res .= $this->cHtml->Option_Select_Element("1", "1");
        $res .= $this->cHtml->Option_Select_Element("1", "2");
        $res .= $this->cHtml->Option_Select_Element("1", "3");
        $res .= $this->cHtml->End_Select_Element();
        $res .= $this->cHtml->End_Center_Box_Code();
        $res .= $this->cHtml->C_Box_Menu_Item("Просмотр", "?menu=".$menu."&submenu=".$submenu."&data_mode=1", $sel[1]);
        $res .= $this->cHtml->C_Box_Menu_Item("Добавление", "?menu=".$menu."&submenu=".$submenu."&data_mode=2", $sel[2]);
        $res .= $this->cHtml->C_Box_Menu_Item("Изменение", "?menu=".$menu."&submenu=".$submenu."&data_mode=3", $sel[3]);
        $res .= $this->cHtml->C_Box_Menu_Item("Удаление", "?menu=".$menu."&submenu=".$submenu."&data_mode=4", $sel[4]);
        $res .= $this->cHtml->End_Center_Box_Cap_2();
        $res .= $this->cHtml->End_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cont();
        $res .= $this->cHtml->Start_Table("table-box");
        $res .= $this->cHtml->Start_Datatable_Body();   

        $res .= $this->cHtml->Table_2_Row_C2("Филиал:", $this->fAudit->get_id_divisions(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fAudit->get_date1(), "2");
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент нестандартных кредитов:", $this->fAudit->get_assets(), $this->fAudit->get_assets_rate());
        $res .= $this->cHtml->Table_2_Row_C3("Нарушение на одно кредитное досье:", $this->fAudit->get_management_1(), $this->fAudit->get_management_rate_1());
        $res .= $this->cHtml->Table_2_Row_C3("Амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда:", $this->fAudit->get_management_2(), $this->fAudit->get_management_rate_2());
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент ошибок на один сайтвизит по кредиту:", $this->fAudit->get_management_3(), $this->fAudit->get_management_rate_3());
        $res .= $this->cHtml->Table_2_Row_C3("Рейтинг и показатели рентабельности:", $this->fAudit->get_earnings(), $this->fAudit->get_earnings_rate());
        $res .= $this->cHtml->Table_2_Row_C3("Текучесть кадров:", $this->fAudit->get_turnover(), $this->fAudit->get_turnover_rate());
        $res .= $this->cHtml->Table_2_Row_C3("Соблюдение регламентов:", $this->fAudit->get_reglaments(), $this->fAudit->get_reglaments_rate());
        $res .= $this->cHtml->Table_2_Row_C3("Выполнение проекции:", $this->fAudit->get_projection(), $this->fAudit->get_projection_rate());
        $res .= $this->cHtml->Table_2_Row_C3("Выявленные риски:", $this->fAudit->get_risk(), $this->fAudit->get_risk_rate());
        $res .= $this->cHtml->Table_2_Row_C2("Итоговый рейтинг:", $this->fAudit->get_total_rate(), "2");

        $res .= $this->cHtml->End_Datatable_Body();
        $res .= $this->cHtml->End_Table();
        
        $res .= $this->cHtml->End_Center_Box_Cont();

        $res .= $this->box_bottom;
        $res .= $this->cHtml->Start_Center_Box_Msg();
        $res .= $this->cHtml->End_Center_Box_Msg();

        $res .= $this->cHtml->End_Center_Box();
        $res .= $this->cHtml->End_Center_Wrapper();

        return $res;
    }
}
