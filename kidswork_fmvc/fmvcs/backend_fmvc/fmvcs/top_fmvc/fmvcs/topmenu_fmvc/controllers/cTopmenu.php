<?php
namespace Kidswork\Backend;

class cTopmenu extends mTopmenu
{

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls->ext("cHtml");
        $cTop = $this->cKidswork->ctrls->ext("cTop");

        $start = '';
        $end = '';
        $start .= $cHtml->Start_Top_Center();
        $start .= $cHtml->Start_Top_Menu();
        //$this->fTopmenu->add_struct_array(array("Вопросы","#2","1"));

        $struct_array=null;
        //var_dump($this->fTopmenu->get()->struct_array->get());
        $active = "";

        foreach ($this->fTopmenu->get()->struct_array->get() as $array) {
            $res = '';
            $is_active = isset($array[3]) ?? null;
            if ($is_active!=null) {
                $active="top-menu-li-a";
            }
            $res .= $cHtml->Start_Top_Menu_Item($array[0], $array[1], $active);
            $active="";
            if (isset($array[2]) && $array[2]!="") {
                $res .= $cHtml->Top_Menu_Badge($array[2]);
            }
            $res .= $cHtml->End_Top_Menu_Item();
            $struct_array[]=$res;
        }
        if ($struct_array!=null) {
            $this->fTopmenu->get()->struct_array->set($struct_array);
        }
        
        
        $end .= $cHtml->End_Top_Menu();
        $end .= $cHtml->End_Top_Center();
        
        $this->fTopmenu->get()->struct_start->set($start);
        $this->fTopmenu->get()->struct_end->set($end);
        //var_dump($start);
        $cTop->fTop->get()->struct->set($this->Print());
    }

    function Init_Ajax()
    {   
    }

    public function Print()
    {
        return $this->fTopmenu->get()->get_final_struct();
    }
}
