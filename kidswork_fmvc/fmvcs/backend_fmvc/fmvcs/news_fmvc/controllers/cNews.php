<?php
namespace Kidswork\Backend;

class cNews extends mNews
{
    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $cTopmenu = $this->cKidswork->ctrls_global->ext("cTopmenu");
        $cTopmenu2 = $this->cKidswork->ctrls_global->ext("cTopmenu2");

        $menu = $this->cRouter->fRouter->get()->menu->get();;
        //\var_dump($this->cRouter->get_request("menu"));
        $active = null;
        if ($menu=="1") {
            $active=true;
            $submenu = $cTopmenu2->fTopmenu2->get()->submenu->get();
            $active2 = array("1"=>null,"2"=>null,"3"=>null,"4"=>null);
            $active2[$submenu]=true;
            $cTopmenu2->fTopmenu2->get()->struct_array->add(array("Все новости","?menu=1&submenu=1","",$active2[1]));
            $cTopmenu2->fTopmenu2->get()->struct_array->add(array("Новые","?menu=1&submenu=2","1",$active2[2]));
            $cTopmenu2->fTopmenu2->get()->struct_array->add(array("Важные","?menu=1&submenu=3","",$active2[3]));
            $cTopmenu2->fTopmenu2->get()->struct_array->add(array("Остальные","?menu=1&submenu=4","",$active2[4]));
        }
        $this->cRouter->fRouter->get()->struct_array->add(array("Новости","?menu=1","2",$active));
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fNews-get()->get_final_struct();
    }
}
