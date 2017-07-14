<?php
namespace Kidswork\Backend;


class cAudit extends mAudit
{
    private $cHtml = null;
    private $cLeftmenu = null;
    private $cTopmenu2 = null;
    private $cCenter = null;


    function Init_Full()
    {
        $this->cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $this->cLeftmenu = $this->cKidswork->fKidswork->get_controllers_array()["cLeftmenu"];
        $this->cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];
        $this->cCenter = $this->cKidswork->fKidswork->get_controllers_array()["cCenter"];
        $this->Menu();


        $this->cCenter->fCenter->add_struct($this->Data_Controller());

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
            
            $submenu = $this->cRouter->get_request("submenu") ?? '-1';
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

    function Data_Controller()
    {
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
        $res .= $this->cHtml->C_Box_Menu_Item("Просмотр", true);
        $res .= $this->cHtml->C_Box_Menu_Item("Добавление");
        $res .= $this->cHtml->C_Box_Menu_Item("Изменение");
        $res .= $this->cHtml->C_Box_Menu_Item("Удаление");
        $res .= $this->cHtml->End_Center_Box_Cap_2();
        $res .= $this->cHtml->End_Center_Box_Top();
        $res .= $this->cHtml->Start_Center_Box_Cont();
        $res .= $this->cHtml->Start_Table("table-box");
        $res .= $this->cHtml->Start_Datatable_Body();

        $res .= $this->cHtml->Table_2_Row_C2("Филиал:","-","2");
        $res .= $this->cHtml->Table_2_Row_C2("Дата:","13.07.2017","2");
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент нестандартных кредитов:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Нарушение на одно кредитное досье:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Амали муфиди хатоги ба як сайтвизити карзии гузаронда шуда:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Коэффициент ошибок на один сайтвизит по кредиту:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Рейтинг и показатели рентабельности:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Текучесть кадров:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Соблюдение регламентов:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Выполнение проекции:","-","-");
        $res .= $this->cHtml->Table_2_Row_C3("Риски:","-","-");

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
