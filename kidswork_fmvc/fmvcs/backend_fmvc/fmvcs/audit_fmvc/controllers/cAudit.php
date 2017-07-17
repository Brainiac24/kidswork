<?php
namespace Kidswork\Backend;

class cAudit extends mAudit
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;
    private $data_mode = null;


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

    function Data_Control_Switcher()
    {
        $this->fAudit->set_data_mode($this->cRouter->get_request("data_mode"));
        switch ($this->fAudit->get_data_mode()) {
            case 1:
                $this->fAudit->set_date1("-");
                break;
            case 2:
                $this->fAudit->set_date1($this->cHtml->Input_Date("date1"));
                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", "listselectbox-2", 'Выберите значение' );
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '002 - ФҶСК "Бонки Эсхата" дар ш. Душанбе');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '003 - ФҶСК "Бонки Эсхата" дар ш. Қӯрғонтеппа-1');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '004 - ФҶСК "Бонки Эсхата" дар ш. Хуҷанд');
                $id_divisions .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_id_divisions($id_divisions);

                $this->fAudit->set_assets($this->cHtml->Input_Text("assets"));
                $assets_rate = $this->cHtml->Start_Select_Element("1", "assets_rate", "listrate", 'Выберите рейтинг' );
                $assets_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $assets_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $assets_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $assets_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_assets_rate($assets_rate);

                $this->fAudit->set_management_1($this->cHtml->Input_Text("management_1"));
                $management_rate_1 = $this->cHtml->Start_Select_Element("1", "management_rate_1", "listrate", 'Выберите рейтинг' );
                $management_rate_1 .= $this->cHtml->Option_Select_Element("1", '1');
                $management_rate_1 .= $this->cHtml->Option_Select_Element("1", '2');
                $management_rate_1 .= $this->cHtml->Option_Select_Element("1", '3');
                $management_rate_1 .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_management_rate_1($management_rate_1);

                $this->fAudit->set_management_2($this->cHtml->Input_Text("management_2"));
                $management_rate_2 = $this->cHtml->Start_Select_Element("1", "management_rate_2", "listrate", 'Выберите рейтинг' );
                $management_rate_2 .= $this->cHtml->Option_Select_Element("1", '1');
                $management_rate_2 .= $this->cHtml->Option_Select_Element("1", '2');
                $management_rate_2 .= $this->cHtml->Option_Select_Element("1", '3');
                $management_rate_2 .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_management_rate_2($management_rate_2);

                $this->fAudit->set_management_3($this->cHtml->Input_Text("management_3"));
                $management_rate_3 = $this->cHtml->Start_Select_Element("1", "management_rate_3", "listrate", 'Выберите рейтинг' );
                $management_rate_3 .= $this->cHtml->Option_Select_Element("1", '1');
                $management_rate_3 .= $this->cHtml->Option_Select_Element("1", '2');
                $management_rate_3 .= $this->cHtml->Option_Select_Element("1", '3');
                $management_rate_3 .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_management_rate_3($management_rate_3);

                $this->fAudit->set_earnings($this->cHtml->Input_Text("earnings"));
                $earnings_rate = $this->cHtml->Start_Select_Element("1", "earnings_rate", "listrate", 'Выберите рейтинг' );
                $earnings_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $earnings_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $earnings_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $earnings_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_earnings_rate($earnings_rate);

                $this->fAudit->set_turnover($this->cHtml->Input_Text("turnover"));
                $turnover_rate = $this->cHtml->Start_Select_Element("1", "turnover_rate", "listrate", 'Выберите рейтинг' );
                $turnover_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $turnover_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $turnover_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $turnover_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_turnover_rate($turnover_rate);

                $this->fAudit->set_reglaments($this->cHtml->Input_Text("reglaments"));
                $reglaments_rate = $this->cHtml->Start_Select_Element("1", "reglaments_rate", "listrate", 'Выберите рейтинг' );
                $reglaments_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $reglaments_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $reglaments_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $reglaments_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_reglaments_rate($reglaments_rate);
                
                $this->fAudit->set_projection($this->cHtml->Input_Text("projection"));
                $projection_rate = $this->cHtml->Start_Select_Element("1", "projection_rate", "listrate", 'Выберите рейтинг' );
                $projection_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $projection_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $projection_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $projection_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_projection_rate($projection_rate);
                $this->fAudit->set_reglaments_rate($reglaments_rate);
                
                $this->fAudit->set_risk($this->cHtml->Input_Text("risk"));
                $risk_rate = $this->cHtml->Start_Select_Element("1", "risk_rate", "listrate", 'Выберите рейтинг' );
                $risk_rate .= $this->cHtml->Option_Select_Element("1", '1');
                $risk_rate .= $this->cHtml->Option_Select_Element("1", '2');
                $risk_rate .= $this->cHtml->Option_Select_Element("1", '3');
                $risk_rate .= $this->cHtml->End_Select_Element();
                $this->fAudit->set_risk_rate($risk_rate);
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
        $res .= $this->cHtml->Table_2_Row_C3("Риски:", $this->fAudit->get_risk(), $this->fAudit->get_risk_rate());
        $res .= $this->cHtml->Table_2_Row_C2("Итоговый рейтинг:", $this->fAudit->get_total_rate(), "2");

        $res .= $this->cHtml->End_Datatable_Body();
        $res .= $this->cHtml->End_Table();
        
        $res .= $this->cHtml->End_Center_Box_Cont();

        $res .= $this->cHtml->Start_Center_Box_Bottom();
        $res .= $this->cHtml->End_Center_Box_Bottom();

        $res .= $this->cHtml->End_Center_Box();
        $res .= $this->cHtml->End_Center_Wrapper();

        return $res;
    }
}
