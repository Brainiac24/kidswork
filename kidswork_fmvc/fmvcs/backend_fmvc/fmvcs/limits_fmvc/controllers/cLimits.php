<?php
namespace Kidswork\Backend;

class cLimits extends mLimits
{
    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        parent::Init($fClass);
        $cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        return !isset($cRouter->get_requests()["ajax"]) ? $this->Init_Full() : $this->Init_Ajax();
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cLeftmenu = $this->cKidswork->fKidswork->get_controllers_array()["cLeftmenu"];
        $cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];
        $cCenter = $this->cKidswork->fKidswork->get_controllers_array()["cCenter"];

        $menu = $this->cRouter->get_requests()["menu"] ?? '-1';
        $active = array("3"=>null,"4"=>null,"5"=>null);
        $active[$menu]=true;
        if ($menu=="3" || $menu=="4" ||$menu=="5") {
            $submenu = $this->cRouter->get_requests()["submenu"] ?? '-1';
            $active2 = array("1"=>null,"2"=>null);
            $active2[$submenu]=true;
            $cTopmenu2->fTopmenu2->add_struct_array(array("Установленные лимиты","?menu=".$menu."&submenu=1","",$active2[1]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Перелимит","?menu=".$menu."&submenu=2","1",$active2[2]));
        }
        $cLeftmenu->fLeftmenu->add_struct_array(array("Лимиты касс филиала","?menu=3","",$active[3]));
        $cLeftmenu->fLeftmenu->add_struct_array(array("Лимиты касс МХБ","?menu=4","2",$active[4]));
        $cLeftmenu->fLeftmenu->add_struct_array(array("Лимиты банкоматов","?menu=5","",$active[5]));

        $fDatabase = $this->Select_All_MHB()->fDatabase;
        $stmt = $fDatabase->get_pdo_stmt();
        
        //$cCenter->fCenter->add_struct($this->Datatable($stmt));
        $cCenter->fCenter->add_struct($this->Datatable_2($fDatabase));

        $cLeftmenu->fLeftmenu->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fLimits->get_final_struct();
    }

    function Datatable_2($fDatabase)
    {

        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $res = '';
        $res .= $this->Datatable_Module($fDatabase,$this->fLimits);
        
        
        
        return $res;
    }

    function Datatable($stmt)
    {

        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $res = '';
        $res .= $cHtml->Start_Datatable();
        $res .= $cHtml->Start_Table();
        $res .= $cHtml->Start_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Tr();
        $res .= $cHtml->Datatable_Th("ID");
        $res .= $cHtml->Datatable_Th("Код");
        $res .= $cHtml->Datatable_Th("Название");
        $res .= $cHtml->Datatable_Th("Счёт");
        $res .= $cHtml->Datatable_Th("Лимит");
        $res .= $cHtml->Datatable_Th("Валюта");
        $res .= $cHtml->Datatable_Th("Категория");
        $res .= $cHtml->End_Datatable_Tr();
        $res .= $cHtml->End_Datatable_Head();
        $res .= $cHtml->Start_Datatable_Body();
        if ($stmt != null) {
            foreach ($stmt as $key) {
                $res .= $cHtml->Start_Datatable_Tr();
                $res .= $cHtml->Datatable_Td($key['code_id']);
                $res .= $cHtml->Datatable_Td($key['code_1']);
                $res .= $cHtml->Datatable_Td($key['name_address']);
                $res .= $cHtml->Datatable_Td($key['code']);
                $res .= $cHtml->Datatable_Td($key['limit']);
                $res .= $cHtml->Datatable_Td($key['name_currency']);
                $res .= $cHtml->Datatable_Td($key['name']);
                $res .= $cHtml->End_Datatable_Tr();
            }
        }

        $res .= $cHtml->End_Datatable_Body();
        $res .= $cHtml->End_Table();
        $res .= $cHtml->End_Datatable();
        
        return $res;
    }
}
