<?php
namespace Kidswork\Backend;

class cLeftmenu extends mLeftmenu
{

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $cLeft = $this->cKidswork->ctrls_global->ext("cLeft");
        $start = '';
        $end = '';
        $start .= $cHtml->Start_Left();
        $start .= $cHtml->Left_Logo();
        $start .= $cHtml->Start_Left_Menu();
        
        $struct_array=null;
        //var_dump($this->fLeftmenu->get()->struct_array->get());
        foreach ($this->fLeftmenu->get()->struct_array->get() as $array) {
            $res = '';
            if (!isset($array[3])) {
                $res .= $cHtml->Start_Left_Menu_Item($array[0], $array[1]);
            } else {
                //, "m-items-a"
                $res .= $cHtml->Start_Left_Menu_Item($array[0], $array[1]);
                $res .= $cHtml->Left_Menu_Triangle();
            }
            
            if (isset($array[2]) && $array[2]!="") {
                $res .= $cHtml->Top_Menu_Badge($array[2]);
            }
            $res .= $cHtml->End_Left_Menu_Item();
            $struct_array[]=$res;
        }
        if ($struct_array!=null) {
            $this->fLeftmenu->get()->struct_array->set($struct_array);
        }
        
        $end .= $cHtml->End_Left_Menu();
        $end .= $cHtml->End_Left();
        
        $this->fLeftmenu->get()->struct_start->set($start);
        $this->fLeftmenu->get()->struct_end->set($end);
        //var_dump($start);
        $cLeft->fLeft->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fLeftmenu->get()->get_final_struct();
    }
}
