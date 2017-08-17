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
            $active = '';
            $submenu = '';
            if (isset($array[4])) {
                $submenu = $cHtml->Start_Left_Menu_Child();
                foreach ($array[4] as $array2) {
                    if (!isset($array2[3])) {
                        $submenu .= $cHtml->Start_Left_Menu_Item($array2[0], $array2[1]);
                    } else {
                        //, "m-items-a"
                        $active = "m-items-a";
                        $submenu .= $cHtml->Start_Left_Menu_Item($array2[0], $array2[1], $active);
                    }
                    $submenu .= $cHtml->Left_Menu_Triangle();
                    if (isset($array2[2]) && $array2[2]!="") {
                        $submenu .= $cHtml->Top_Menu_Badge($array2[2]);
                    }
                }
                $submenu .= $cHtml->End_Left_Menu_Child();
            }

            $res = '';

            if (!isset($array[3])) {
                $res .= $cHtml->Start_Left_Menu_Item($array[0], $array[1], $active);
            } else {
                //, "m-items-a"
                $active = "m-items-a";
                $res .= $cHtml->Start_Left_Menu_Item($array[0], $array[1], $active);
            }
            $res .= $cHtml->Left_Menu_Triangle();
            if (isset($array[2]) && $array[2]!="") {
                $res .= $cHtml->Top_Menu_Badge($array[2]);
            }
            

            $res .= $cHtml->End_Left_Menu_Item($submenu);
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
