<?php
namespace Kidswork\Backend;


class cTopmenu2 extends mTopmenu2
{
    public function __construct($cKidswork)
    {   
        parent::__construct($cKidswork);
    }

    function Init($fClass=null)
    {
        parent::Init($fClass);
    }

    function Init_Full()
    {
        $cHtml = $this->cKidswork->ctrls_global->ext("cHtml");
        $cTop = $this->cKidswork->ctrls_global->ext("cTop");

        $start = '';
        $end = '';
        $start .= $cHtml->Start_Top_Menu_2();
        //$this->fTopmenu2->add_struct_array(array("Заявки","#3",""));

        $struct_array=null;
        //var_dump($this->fTopmenu2->get_struct_array());
        if (\is_array($this->fTopmenu2->get()->struct_array->get())) {
            foreach ($this->fTopmenu2->get()->struct_array->get() as $array) {
            $res = '';
            if (!isset($array[3])) {
                $res .= $cHtml->Start_Top_Menu_2_Item($array[0], $array[1]);
            } else {
                $res .= $cHtml->Start_Top_Menu_2_Item($array[0], $array[1], "top-2-menu-a");
            }
            
            if (isset($array[2]) && $array[2]!="") {
                $res .= $cHtml->Top_Menu_Badge($array[2]);
            }
            $res .= $cHtml->End_Top_Menu_2_Item();
            $struct_array[]=$res;
        }
        if ($struct_array!=null) {
            $this->fTopmenu2->get()->struct_array->set($struct_array);
        }
        }
        
        
        
        $end .= $cHtml->End_Top_Menu();
        $end .= $cHtml->End_Top_Center();
        
        $this->fTopmenu2->get()->struct_start->set($start);
        $this->fTopmenu2->get()->struct_end->set($end);
        //var_dump($start);
        $cTop->fTop->get()->struct->con($this->Print());
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fTopmenu2->get()->get_final_struct();
    }
}
