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

        $this->Data_Control_Switcher();
        $this->cCenter->fCenter->get()->struct->con($this->Data_Control_View());

        //$this->cLeftmenu->fLeftmenu->add_struct($this->Print());
    }

    function Init_Ajax()
    {
        $this->cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $this->cCenter = $this->cKidswork->ctrls_global->ext("cCenter");
        
        
        $this->cCenter->fCenter->get()->struct->con($this->Data_Control_Action());
    }

    public function Print()
    {
        return $this->fAudit-get()->final_struct();
    }

    public function Menu()
    {
        
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $active = array("3"=>null,"4"=>null,"5"=>null,"6"=>null,"7"=>null,"8"=>null,"9"=>null);
        
        \array_key_exists($menu, $active) ? $active[$menu]=true : false;
        /*echo "<pre>";
        \var_dump($active[$menu]); 
        echo "</pre>";*/
        if ($menu=="5") {
            $submenu = $this->cRouter->fRouter->get()->submenu->get();
            $active2 = array("1"=>null,"2"=>null,"3"=>null);
            \array_key_exists($submenu, $active2) ? $active2[$submenu]=true : false;
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Мониторинг","?menu=".$menu."&submenu=1","1",$active2[1]));
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Ввод данных","?menu=".$menu."&submenu=2","",$active2[2]));
            $this->cTopmenu2->fTopmenu2->get()->struct_array->add(array("Итоговый отчёт","?menu=".$menu."&submenu=3","",$active2[3]));
        }
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Фрод","?menu=3","",$active[3]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Жалобы","?menu=4","",$active[4]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Аудит","?menu=5","",$active[5]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Недосдачи / излишки кассы","?menu=6","",$active[6]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Операции более 1-го раза","?menu=7","",$active[7]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Ликвидированные документы","?menu=8","",$active[8]));
        $this->cLeftmenu->fLeftmenu->get()->struct_array->add(array("Перелимиты","?menu=9","",$active[9]));

        //\var_dump($this->cLeftmenu->fLeftmenu->get()->struct_array->get());
    }

    function Data_Control_Action()
    {   
        $res = "";
        switch ($this->fAudit->get()->data_mode->get()) {
            case 1:
                break;
            case 2:
                $this->Insert();
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
        switch ($this->fAudit->get()->data_mode->get()) {
            case 1:
                $this->fAudit->get()->date1->set("-");
                break;
            case 2:
                $id_divisions = $this->cHtml->Start_Select_Element("1", "id_divisions", "listselectbox-2", 'Выберите значение' );
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '002 - ФҶСК "Бонки Эсхата" дар ш. Душанбе');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '003 - ФҶСК "Бонки Эсхата" дар ш. Қӯрғонтеппа-1');
                $id_divisions .= $this->cHtml->Option_Select_Element("1", '004 - ФҶСК "Бонки Эсхата" дар ш. Хуҷанд');
                $id_divisions .= $this->cHtml->End_Select_Element();
                $this->fAudit->get()->id_divisions->set($id_divisions);

                $this->fAudit->get()->date1->set($this->cHtml->Input_Date("date1",(new \DateTime())->format('Y-m-d')));

                $this->fAudit->get()->assets->set($this->cHtml->Input_Text("assets"));
                $this->fAudit->get()->assets_rate->set('-');

                $this->fAudit->get()->management_1->set($this->cHtml->Input_Text("management_1"));
                $this->fAudit->get()->management_rate_1->set('-');

                $this->fAudit->get()->management_2->set($this->cHtml->Input_Text("management_2"));
                $this->fAudit->get()->management_rate_2->set('-');

                $this->fAudit->get()->management_3->set($this->cHtml->Input_Text("management_3"));
                $this->fAudit->get()->management_rate_3->set('-');

                $this->fAudit->get()->earnings->set($this->cHtml->Input_Text("earnings"));
                $this->fAudit->get()->earnings_rate->set('-');

                $this->fAudit->get()->turnover->set($this->cHtml->Input_Text("turnover"));
                $this->fAudit->get()->turnover_rate->set('-');

                $this->fAudit->get()->reglaments->set($this->cHtml->Input_Text("reglaments"));
                $this->fAudit->get()->reglaments_rate->set('-');
                
                $this->fAudit->get()->projection->set($this->cHtml->Input_Text("projection"));
                $this->fAudit->get()->projection_rate->set('-');
                
                $this->fAudit->get()->risk->set($this->cHtml->Input_Text("risk"));
                $this->fAudit->get()->risk_rate->set('-');

                $this->fAudit->get()->total_rate->set('-');

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
        $menu = $this->cRouter->fRouter->get()->menu->get();
        $submenu = $this->cRouter->fRouter->get()->submenu->get();
        $data_mode = $this->fAudit->get()->data_mode->get();
        $sel = array(1=>null,2=>null,3=>null,4=>null);

        
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

        $res .= $this->cHtml->Table_2_Row_C2("Филиал:", $this->fAudit->get()->id_divisions->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:", $this->fAudit->get()->date1->get(), "2");
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент нестандартных кредитов:", $this->fAudit->get()->assets->get(), $this->fAudit->get()->assets_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Нарушение на одно кредитное досье:", $this->fAudit->get()->management_1->get(), $this->fAudit->get()->management_rate_1->get());
        $res .= $this->cHtml->Table_2_Row_C3("Амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда:", $this->fAudit->get()->management_2->get(), $this->fAudit->get()->management_rate_2->get());
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент ошибок на один сайтвизит по кредиту:", $this->fAudit->get()->management_3->get(), $this->fAudit->get()->management_rate_3->get());
        $res .= $this->cHtml->Table_2_Row_C3("Рейтинг и показатели рентабельности:", $this->fAudit->get()->earnings->get(), $this->fAudit->get()->earnings_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Текучесть кадров:", $this->fAudit->get()->turnover->get(), $this->fAudit->get()->turnover_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Соблюдение регламентов:", $this->fAudit->get()->reglaments->get(), $this->fAudit->get()->reglaments_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Выполнение проекции:", $this->fAudit->get()->projection->get(), $this->fAudit->get()->projection_rate->get());
        $res .= $this->cHtml->Table_2_Row_C3("Выявленные риски:", $this->fAudit->get()->risk->get(), $this->fAudit->get()->risk_rate->get());
        $res .= $this->cHtml->Table_2_Row_C2("Итоговый рейтинг:", $this->fAudit->get()->total_rate->get(), "2");

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
