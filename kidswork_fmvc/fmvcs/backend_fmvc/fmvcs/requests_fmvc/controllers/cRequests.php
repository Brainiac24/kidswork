<?php
namespace Kidswork\Backend;


class cRequests extends mRequests
{
    function Init_Full()
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cTopmenu = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu"];
        $cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];

        $menu = $this->cRouter->get_request("menu");
        $active = null;
        if ($menu=="2") {
            $active=true;
            $submenu = $this->cRouter->get_request("submenu");
            $active2 = array("1"=>null,"2"=>null,"3"=>null,"4"=>null,"5"=>null);
            $active2[$submenu]=true;
            $cTopmenu2->fTopmenu2->add_struct_array(array("Все заявки","?menu=2&submenu=1","",$active2[1]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Заявки ДБР","?menu=2&submenu=2","1",$active2[2]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Мои заявки","?menu=2&submenu=3","",$active2[3]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("На рассмотрении","?menu=2&submenu=4","",$active2[4]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Утверждённые","?menu=2&submenu=5","",$active2[5]));
        }
        $cTopmenu->fTopmenu->add_struct_array(array("Заявки","?menu=2","",$active));
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fRequests->get_final_struct();
    }
}
