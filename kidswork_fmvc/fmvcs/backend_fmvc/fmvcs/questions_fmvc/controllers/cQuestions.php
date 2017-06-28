<?php
namespace Kidswork\Backend;


class cQuestions extends mQuestions
{
    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init($fClass=null)
    {
        parent::Init($fClass);
        $cRouter = $this->cKidswork->fKidswork->get_controllers_array()["cRouter"];
        return !isset($cRouter->get_requests()["ajax"]) ? $this->Init_Full() : $this->Init_Ajax();
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cTopmenu = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu"];
        $cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];

        $menu = $this->cRouter->get_requests()["menu"] ?? '-1';
        $active = null;
        if ($menu=="3") {
            $active=true;
            $submenu = $this->cRouter->get_requests()["submenu"] ?? '-1';
            $active2 = array("1"=>null,"2"=>null,"3"=>null,"4"=>null,"5"=>null);
            $active2[$submenu]=true;
            $cTopmenu2->fTopmenu2->add_struct_array(array("Все вопросы","?menu=3&submenu=1","",$active2[1]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Вопросы ДБР","?menu=3&submenu=2","1",$active2[2]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Мои вопросы","?menu=3&submenu=3","",$active2[3]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("На рассмотрении","?menu=3&submenu=4","",$active2[4]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Решённые","?menu=3&submenu=5","",$active2[5]));
        }
        $cTopmenu->fTopmenu->add_struct_array(array("Вопросы","?menu=3","",$active));
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fQuestions->get_final_struct();
    }
}
