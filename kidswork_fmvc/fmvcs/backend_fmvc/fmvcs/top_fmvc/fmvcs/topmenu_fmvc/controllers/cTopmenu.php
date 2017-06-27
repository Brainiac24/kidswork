<?php
namespace Kidswork\Backend;

class cTopmenu extends mTopmenu
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
        $cTop = $this->cKidswork->fKidswork->get_controllers_array()["cTop"];

        $start = '';
        $end = '';
        $start .= $cHtml->Start_Top_Center();
        $start .= $cHtml->Start_Top_Menu();
        $this->fTopmenu->add_struct_array(array("Новости","#2","2"));
        $this->fTopmenu->add_struct_array(array("Заявки","#3","",true));
        $this->fTopmenu->add_struct_array(array("Вопросы","#2","1"));

        $struct_array=null;
        //var_dump($this->fTopmenu->get_struct_array());
        foreach ($this->fTopmenu->get_struct_array() as $array) {
            $res = '';
            if (!isset($array[3])) {
                $res .= $cHtml->Start_Top_Menu_Item($array[0], $array[1]);
            } else {
                $res .= $cHtml->Start_Top_Menu_Item($array[0], $array[1], "top-menu-li-a");
            }
            
            if (isset($array[2]) && $array[2]!="") {
                $res .= $cHtml->Top_Menu_Badge($array[2]);
            }
            $res .= $cHtml->End_Top_Menu_Item();
            $struct_array[]=$res;
        }
        if ($struct_array!=null) {
            $this->fTopmenu->set_struct_array($struct_array);
        }
        
        
        $end .= $cHtml->End_Top_Menu();
        $end .= $cHtml->End_Top_Center();
        
        $this->fTopmenu->set_struct_start($start);
        $this->fTopmenu->set_struct_end($end);
        //var_dump($start);
        $cTop->fTop->add_struct($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fTopmenu->get_final_struct();
    }
}
