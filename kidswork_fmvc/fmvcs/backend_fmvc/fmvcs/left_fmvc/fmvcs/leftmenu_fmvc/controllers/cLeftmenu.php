<?php
namespace Kidswork\Backend;

class cLeftmenu extends mLeftmenu
{
    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
    }

    function Init($fClass = null)
    {
        return parent::Init($fClass);
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->fKidswork->get_controllers_array()["cHtml"];
        $cLeft = $this->cKidswork->fKidswork->get_controllers_array()["cLeft"];
        $start = '';
        $end = '';
        $start .= $cHtml->Start_Left();
        $start .= $cHtml->Left_Logo();
        $start .= $cHtml->Start_Left_Menu();
        /*
        $this->fLeftmenu->add_struct_array(array("Лимиты касс филиалов","#2","2"));
        $this->fLeftmenu->add_struct_array(array("Лимиты касс МХБ","#3","",true));
        $this->fLeftmenu->add_struct_array(array("Лимиты банкоматов","#2","1"));
        */
        $struct_array=null;
        //var_dump($this->fLeftmenu->get_struct_array());
        foreach ($this->fLeftmenu->get_struct_array() as $array) {
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
            $this->fLeftmenu->set_struct_array($struct_array);
        }
        
        $end .= $cHtml->End_Left_Menu();
        $end .= $cHtml->End_Left();
        
        $this->fLeftmenu->set_struct_start($start);
        $this->fLeftmenu->set_struct_end($end);
        //var_dump($start);
        $cLeft->fLeft->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fLeftmenu->get_final_struct();
    }
}
