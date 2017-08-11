<?php
namespace Kidswork\Backend;

class cHtml extends mHtml
{


    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
    }

    function Init()
    {
        return $this;
    }

    function Init_Full()
    {
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fHtml->get_final_struct();
    }

    public function Start_Html()
    {

        return $this->vHtml->Start_Html();
    }

    public function End_Html()
    {
        return $this->vHtml->End_Html();
    }

    public function Start_Head()
    {
        return $this->vHtml->Start_Head();
    }

    public function End_Head()
    {
        return $this->vHtml->End_Head();
    }

    public function Start_Body()
    {
        return $this->vHtml->Start_Body();
    }

    public function End_Body()
    {
        return $this->vHtml->End_Body();
    }

    public function Headers($title = null)
    {
        return $this->vHtml->Headers($title);
    }

    public function Footers()
    {
        return $this->vHtml->Footers();
    }

    public function Path()
    {
        return $this->vHtml->Path();
    }

    public function Start_Top()
    {
        return $this->vHtml->Start_Top();
    }

    public function End_Top()
    {
        return $this->vHtml->End_Top();
    }

    function Top_Left($Logo_name = '" Банк Эсхата " - ДБР')
    {
        return $this->vHtml->Top_Left($Logo_name);
    }

    function Start_Top_Center()
    {
        return $this->vHtml->Start_Top_Center();
    }

    function End_Top_Center()
    {
        return $this->vHtml->End_Top_Center();
    }

    function Start_Top_Menu()
    {
        return $this->vHtml->Start_Top_Menu();
    }

    function End_Top_Menu()
    {
        return $this->vHtml->End_Top_Menu();
    }

    function Start_Top_Menu_Item($name, $url, $class = "")
    {
        return $this->vHtml->Start_Top_Menu_Item($name, $url, $class);
    }

    function End_Top_Menu_Item()
    {
        return $this->vHtml->End_Top_Menu_Item();
    }

    function Top_Menu_Badge($number)
    {
        return $this->vHtml->Top_Menu_Badge($number);
    }
    //---------------------------------------------
    function Start_Top_Menu_2()
    {
        return $this->vHtml->Start_Top_Menu_2();
    }

    function End_Top_Menu_2()
    {
        return $this->vHtml->End_Top_Menu_2();
    }

    function Start_Top_Menu_2_Item($name, $url, $class = "")
    {
        return $this->vHtml->Start_Top_Menu_2_Item($name, $url, $class);
    }

    function End_Top_Menu_2_Item()
    {
        return $this->vHtml->End_Top_Menu_2_Item();
    }
    //---------------------------------------------

    function Start_Left()
    {
        return $this->vHtml->Start_Left();
    }

    function End_Left()
    {
        return $this->vHtml->End_Left();
    }

    function Left_Logo()
    {
        return $this->vHtml->Left_Logo();
    }

    function Start_Left_Menu()
    {
        return $this->vHtml->Start_Left_Menu();
    }

    function End_Left_Menu()
    {
        return $this->vHtml->End_Left_Menu();
    }

    function Start_Left_Menu_Item($name, $url, $class = "")
    {
        return $this->vHtml->Start_Left_Menu_Item($name, $url, $class);
    }

    function End_Left_Menu_Item()
    {
        return $this->vHtml->End_Left_Menu_Item();
    }

    function Left_Menu_Triangle()
    {
        return $this->vHtml->Left_Menu_Triangle();
    }

    function Start_Datatable()
    {
        return $this->vHtml->Start_Datatable();
    }

    function End_Datatable()
    {
        return $this->vHtml->End_Datatable();
    }

    function Start_Datatable_Head()
    {
        return $this->vHtml->Start_Datatable_Head();
    }

    function End_Datatable_Head()
    {
        return $this->vHtml->End_Datatable_Head();
    }

    function Start_Datatable_Body($class = "")
    {
        return $this->vHtml->Start_Datatable_Body($class);
    }

    function End_Datatable_Body()
    {
        return $this->vHtml->End_Datatable_Body();
    }

    function Start_Datatable_Tr($class = "")
    {
        return $this->vHtml->Start_Datatable_Tr($class);
    }

    function End_Datatable_Tr()
    {
        return $this->vHtml->End_Datatable_Tr();
    }

    function Start_Datatable_Th()
    {
        return $this->vHtml->Start_Datatable_Th();
    }

    function End_Datatable_Th()
    {
        return $this->vHtml->End_Datatable_Th();
    }

    function Datatable_Th($val)
    {
        return $this->vHtml->Start_Datatable_Th() . $val . $this->vHtml->End_Datatable_Th();
    }

    function Start_Datatable_Td($class = "", $colspan = "", $child_module = "")
    {
        if ($colspan != "") {
            $colspan = 'colspan="' . $colspan . '"';
        }
        return $this->vHtml->Start_Datatable_Td($class, $colspan, $child_module);
    }

    function End_Datatable_Td()
    {
        return $this->vHtml->End_Datatable_Td();
    }

    function Datatable_Td($val, $class = "", $colspan = "")
    {
        return $this->vHtml->Start_Datatable_Td($class, $colspan) . $val . $this->vHtml->End_Datatable_Td();
    }

    function Start_Middle_Center()
    {
        return $this->vHtml->Start_Middle_Center();
    }

    function End_Middle_Center()
    {
        return $this->vHtml->End_Middle_Center();
    }

    function Start_Table($class = "")
    {
        return $this->vHtml->Start_Table($class);
    }

    function End_Table()
    {
        return $this->vHtml->End_Table();
    }
//----------------------------------------------------------------------
    function Start_Module_Row_2($name_category = '', $show = true)
    {
        $res = '';
        if ($show == false) {
            $res = ' d-none ';
        }
        return $this->vHtml->Start_Module_Row_2($name_category, $res);
    }

    function End_Module_Row()
    {
        return $this->vHtml->End_Module_Row();
    }

    function Start_Table_Sticky($classes = '', $table_name)
    {
        return $this->vHtml->Start_Table_Sticky($classes, $table_name);
    }

    function Start_Thead_Element()
    {
        return $this->vHtml->Start_Thead_Element();
    }

    function End_Thead_Element()
    {
        return $this->vHtml->End_Thead_Element();
    }

    function Start_Tr_Element($class = '')
    {
        return $this->vHtml->Start_Tr_Element($class);
    }

    function End_Tr_Element()
    {
        return $this->vHtml->End_Tr_Element();
    }

    function Start_Td_Element()
    {
        return $this->vHtml->Start_Td_Element();
    }

    function End_Td_Element()
    {
        return $this->vHtml->End_Td_Element();
    }

    function Start_Th_Element($class, $datatype, $attr = '')
    {
        return $this->vHtml->Start_Th_Element($class, $datatype, $attr = '');
    }

    function End_Th_Element()
    {
        return $this->vHtml->End_Th_Element();
    }

    function Start_Tfoot_Element()
    {
        return $this->vHtml->Start_Tfoot_Element();
    }

    function End_Tfoot_Element()
    {
        return $this->vHtml->End_Tfoot_Element();
    }

    function Export_Btn_Table()
    {
        return $this->vHtml->Export_Btn_Table();
    }

    function End_Table_Sticky()
    {
        return $this->vHtml->End_Table_Sticky();
    }

    function Start_Center_Wrapper()
    {
        return $this->vHtml->Start_Center_Wrapper();
    }

    function End_Center_Wrapper()
    {
        return $this->vHtml->End_Center_Wrapper();
    }

    function Start_Center_Box()
    {
        return $this->vHtml->Start_Center_Box();
    }

    function End_Center_Box()
    {
        return $this->vHtml->End_Center_Box();
    }

    function Start_Center_Box_Top($text = "")
    {
        return $this->vHtml->Start_Center_Box_Top($text);
    }

    function End_Center_Box_Top()
    {
        return $this->vHtml->End_Center_Box_Top();
    }

    function Start_Center_Box_Content()
    {
        return $this->vHtml->Start_Center_Box_Content();
    }

    function End_Center_Box_Content()
    {
        return $this->vHtml->End_Center_Box_Content();
    }

    function Start_Center_Box_Cap($chid_num = "0", $selected = "")
    {
        return $this->vHtml->Start_Center_Box_Cap($chid_num, $selected);
    }

    function End_Center_Box_Cap()
    {
        return $this->vHtml->End_Center_Box_Cap();
    }

    function C_Box_Caption_Text($name)
    {
        return $this->vHtml->C_Box_Caption_Text($name);
    }

    function Start_Center_Box_Cap_2()
    {
        return $this->vHtml->Start_Center_Box_Cap_2();
    }

    function End_Center_Box_Cap_2()
    {
        return $this->vHtml->End_Center_Box_Cap_2();
    }

    function C_Box_Menu_Item($name, $url, $active = false)
    {
        $class = "";
        if ($active) {
            $class = "c-box-menu-item-a";
        }
        return $this->vHtml->C_Box_Menu_Item($name, $url, $class);
    }

    function Start_Center_Box_Cont()
    {
        return $this->vHtml->Start_Center_Box_Cont();
    }

    function End_Center_Box_Cont()
    {
        return $this->vHtml->End_Center_Box_Cont();
    }

    function Start_Center_Box_Row()
    {
        return $this->vHtml->Start_Center_Box_Row();
    }

    function End_Center_Box_Row()
    {
        return $this->vHtml->End_Center_Box_Row();
    }

    function C_Box_Row_Name($name)
    {
        return $this->vHtml->C_Box_Row_Name($name);
    }

    function Start_C_Box_Row_Text()
    {
        return $this->vHtml->Start_C_Box_Row_Text();
    }

    function End_C_Box_Row_Text()
    {
        return $this->vHtml->End_C_Box_Row_Text();
    }

    function Start_Center_Box_Bottom()
    {
        return $this->vHtml->Start_Center_Box_Bottom();
    }

    function End_Center_Box_Bottom()
    {
        return $this->vHtml->End_Center_Box_Bottom();
    }

    public function Table_Btn_Row_C2($name, $text, $colspan = "", $trclass = "", $child_module = "")
    {
        $res = "";
        $res .= $this->Start_Datatable_Tr($trclass);
        $res .= $this->Start_Datatable_Td("box-child-btn", "", $child_module);
        $res .= $name;
        $res .= $this->Ic_Add();
        $res .= $this->End_Datatable_Td();
        $res .= $this->Start_Datatable_Td("tab-text", $colspan);
        $res .= $text;
        $res .= $this->End_Datatable_Td();
        $res .= $this->End_Datatable_Tr();

        return $res;
    }

    public function Table_2_Row_C2($name, $text, $colspan = "", $trclass = "", $tdclass = "tab-name")
    {
        $res = "";
        $res .= $this->Start_Datatable_Tr($trclass);
        $res .= $this->Start_Datatable_Td($tdclass);
        $res .= $name;
        $res .= $this->End_Datatable_Td();
        $res .= $this->Start_Datatable_Td("tab-text", $colspan);
        $res .= $text;
        $res .= $this->End_Datatable_Td();
        $res .= $this->End_Datatable_Tr();

        return $res;
    }

    public function Table_2_Td_C2($name, $text)
    {
        $res = "";
        $res .= $this->Start_Datatable_Td("tab-name");
        $res .= $name;
        $res .= $this->End_Datatable_Td();
        $res .= $this->Start_Datatable_Td("tab-text", "2");
        $res .= $text;
        $res .= $this->End_Datatable_Td();
        return $res;
    }

    public function Table_2_Row_C3($name, $text1, $text2, $trclass = "")
    {
        $res = "";
        $res .= $this->Start_Datatable_Tr($trclass);
        $res .= $this->Start_Datatable_Td("tab-name");
        $res .= $name;
        $res .= $this->End_Datatable_Td();
        $res .= $this->Start_Datatable_Td("tab-text w-41p");
        $res .= $text1;
        $res .= $this->End_Datatable_Td();
        $res .= $this->End_Datatable_Td();
        $res .= $this->Start_Datatable_Td("tab-text w-41p");
        $res .= $text2;
        $res .= $this->End_Datatable_Td();
        $res .= $this->End_Datatable_Tr();

        return $res;
    }

    function Start_Select_Element($id_cmb, $name_for_form, $value, $class = "", $name = 'Выберите значение')
    {
        return $this->vHtml->Start_Select_Element($id_cmb, $name_for_form, $value, $class, $name);
    }

    function End_Select_Element()
    {
        return $this->vHtml->End_Select_Element();
    }

    function Option_Select_Element($value, $name, $selected_text = '')
    {
        return $this->vHtml->Option_Select_Element($value, $name, $selected_text);
    }

    function Start_Center_Box_Code()
    {
        return $this->vHtml->Start_Center_Box_Code();
    }

    function End_Center_Box_Code()
    {
        return $this->vHtml->End_Center_Box_Code();
    }

    function Input_Date($name, $value = "", $class = "")
    {
        return $this->vHtml->Input_Date($name, $value, $class);
    }

    function Input_Text($name, $value = "", $class = "")
    {
        return $this->vHtml->Input_Text($name, $value, $class);
    }


    function Input_RichText($name, $value, $class = "")
    {
        return $this->vHtml->Input_RichText($name, $value, $class);
    }

    function Input_Hidden($name, $value, $class = "")
    {
        return $this->vHtml->Input_Hidden($name, $value, $class);
    }

    function Action_Buttons_Text($text)
    {
        return $this->vHtml->Action_Buttons_Text($text);
    }

    function Action_Buttons_Add($text)
    {
        return $this->vHtml->Action_Buttons_Add($text);
    }

    function Action_Buttons_Default($text)
    {
        return $this->vHtml->Action_Buttons_Default($text);
    }

    function Action_Buttons_Edit($text)
    {
        return $this->vHtml->Action_Buttons_Edit($text);
    }

    function Action_Buttons_Delete($text)
    {
        return $this->vHtml->Action_Buttons_Delete($text);
    }

    function Start_Action_Buttons($class = "")
    {
        return $this->vHtml->Start_Action_Buttons($class);
    }

    function End_Action_Buttons()
    {
        return $this->vHtml->End_Action_Buttons();
    }

    function Action_Message_Success($text, $class = "")
    {
        return $this->vHtml->Action_Message_Success($text, $class = "");
    }

    function Start_Center_Box_Msg()
    {
        return $this->vHtml->Start_Center_Box_Msg();
    }

    function End_Center_Box_Msg()
    {
        return $this->vHtml->End_Center_Box_Msg();
    }

    function New_Code($text)
    {
        return $this->vHtml->New_Code($text);
    }

    function Start_K_Table_1($class = "")
    {
        return $this->vHtml->Start_K_Table_1($class);
    }

    function End_K_Table_1()
    {
        return $this->vHtml->End_K_Table_1();
    }

    function Start_K_Thead()
    {
        return $this->vHtml->Start_K_Thead();
    }

    function End_K_Thead()
    {
        return $this->vHtml->End_K_Thead();
    }

    function Start_K_Tbody($class = "")
    {
        return $this->vHtml->Start_K_Tbody($class);
    }

    function End_K_Tbody()
    {
        return $this->vHtml->End_K_Tbody();
    }

    function Start_K_Tfoot()
    {
        return $this->vHtml->Start_K_Tfoot();
    }

    function End_K_Tfoot()
    {
        return $this->vHtml->End_K_Tfoot();
    }

    function Start_K_Tr()
    {
        return $this->vHtml->Start_K_Tr();
    }

    function End_K_Tr()
    {
        return $this->vHtml->End_K_Tr();
    }

    function Start_K_Th()
    {
        return $this->vHtml->Start_K_Th();
    }

    function End_K_Th()
    {
        return $this->vHtml->End_K_Th();
    }

    function Start_K_Td_1()
    {
        return $this->vHtml->Start_K_Td_1();
    }

    function End_K_Td_1()
    {
        return $this->vHtml->End_K_Td_1();
    }

    function K_Td_1($text)
    {
        return $this->vHtml->K_Td_1($text);
    }

    function Start_K_Td_2()
    {
        return $this->vHtml->Start_K_Td_2();
    }

    function End_K_Td_2()
    {
        return $this->vHtml->End_K_Td_2();
    }

    function K_Td_2($text)
    {
        return $this->vHtml->K_Td_2($text);
    }


    function Box_K_Row_2($text1, $text2)
    {
        $res = "";
        $res .= $this->Start_K_Tr();
        $res .= $this->K_Td_1($text1);
        $res .= $this->Start_K_Td_2();
        $res .= $text2;
        $res .= $this->End_K_Td_2();
        $res .= $this->End_K_Tr();
        return $res;
    }

    function Start_K_Td_3()
    {
        return $this->vHtml->Start_K_Td_3();
    }

    function End_K_Td_3()
    {
        return $this->vHtml->End_K_Td_3();
    }

    function K_Td_3($text)
    {
        return $this->vHtml->K_Td_3($text);
    }

    function Box_K_Row_3($text1, $text2, $text3)
    {
        $res = "";
        $res .= $this->Start_K_Tr();
        $res .= $this->K_Td_1($text1);
        $res .= $this->K_Td_3($text2);
        $res .= $this->K_Td_3($text3);
        $res .= $this->End_K_Tr();
        return $res;
    }

    function Start_K_Tgroup()
    {
        return $this->vHtml->Start_K_Tgroup();
    }

    function End_K_Tgroup()
    {
        return $this->vHtml->End_K_Tgroup();
    }


    function Ic_Add()
    {
        return $this->vHtml->Ic_Add();
    }

    function Box_Menu($value, $sel, $menu, $submenu)
    {
        return $this->vHtml->Box_Menu($value, $sel, $menu, $submenu);
    }

    function Start_Dialog_Box()
    {
        return $this->vHtml->Start_Dialog_Box();
    }

    function End_Dialog_Box()
    {
        return $this->vHtml->End_Dialog_Box();
    }

    function Start_Center_Child_Box()
    {
        return $this->vHtml->Start_Center_Child_Box();
    }

    function End_Center_Child_Box()
    {
        return $this->vHtml->End_Center_Child_Box();
    }

    function Icon_Dot($dot_count)
    {
        $res = "";
        for ($i = 0; $i < \intval($dot_count); $i++) {
            $res .= $this->vHtml->Icon_Dot();
        }
        return $res;
    }

    function Expand_Code($text)
    {
        return $this->vHtml->Expand_Code($text);
    }

}
