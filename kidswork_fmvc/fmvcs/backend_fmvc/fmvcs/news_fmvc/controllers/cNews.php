<?php
namespace Kidswork\Backend;

class cNews extends mNews
{
    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        parent::Init($fClass);
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cTopmenu = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu"];
        $cTopmenu2 = $this->cKidswork->fKidswork->get_controllers_array()["cTopmenu2"];

        $menu = is_null($this->cRouter->get_request("menu")) ? '-1': $this->cRouter->get_request("menu");
        //\var_dump($this->cRouter->get_request("menu"));
        $active = null;
        if ($menu=="1") {
            $active=true;
            $submenu = $this->cRouter->get_request("submenu") ?? '-1';
            $active2 = array("1"=>null,"2"=>null,"3"=>null,"4"=>null);
            $active2[$submenu]=true;
            $cTopmenu2->fTopmenu2->add_struct_array(array("Все новости","?menu=1&submenu=1","",$active2[1]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Новые","?menu=1&submenu=2","1",$active2[2]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Важные","?menu=1&submenu=3","",$active2[3]));
            $cTopmenu2->fTopmenu2->add_struct_array(array("Остальные","?menu=1&submenu=4","",$active2[4]));
        }
        $cTopmenu->fTopmenu->add_struct_array(array("Новости","?menu=1","2",$active));
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fNews->get_final_struct();
    }
}
