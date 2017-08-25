<?php
namespace Kidswork\Backend;

class vHtml
{

    function Init()
    {
    }

    function Start_Html()
    {

        return '<html>';
    }

    function End_Html()
    {
        return '</html>';
    }

    function Start_Head()
    {
        return '<head>';
    }

    function End_Head()
    {
        return '</head>';
    }

    function Start_Body()
    {
        return '<body>';
    }

    function End_Body()
    {
        return '</body>';
    }

    function Headers($title = null)
    {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        return '<title>' . $title . '</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="' . self::Path() . 'css/styles.css">
                <script type="text/javascript" src="' . self::Path() . 'js/jquery-2.1.3.min.js"></script>
                <script type="text/javascript" src="' . self::Path() . 'js/jquery.form.min.js"></script>
                <script type="text/javascript" src="' . self::Path() . 'js/stickytableheaders.js"></script>
                <script type="text/javascript" src="' . self::Path() . 'js/listselectbox.js"></script>
                <script type="text/javascript" src="' . self::Path() . 'js/jscripts.js"></script>';

        //<script type="text/javascript" src="' . self::Path() . 'js/jssor.slider.mini.js"></script>


    }

    function Footers()
    {
    }

    function Path()
    {
        $dir = str_replace("\\", "/", __DIR__);
        $dir = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
        return $dir . '/';
    }

    function Start_Top()
    {
        return '<div class="top no-print">';
    }

    function End_Top()
    {
        return '</div>';
    }

    function Top_Left($Logo_name = '"Банк Эсхата" - ДБР')
    {
        return '<div class="top-left">
                    <a href="#" class="top-left-logo">' . $Logo_name . '</a>
                </div>';
    }

    function Start_Top_Center()
    {
        return '<div class="top-center">';
    }

    function End_Top_Center()
    {
        return '</div>';
    }

    function Start_Top_Menu()
    {
        return '<ul class="top-menu">';
    }

    function End_Top_Menu()
    {
        return '</ul>';
    }

    function Start_Top_Menu_Item($name, $url, $class = "")
    {
        return '<li><a href="' . $url . '" class="m-t-items ' . $class . '">' . $name;
    }

    function End_Top_Menu_Item()
    {
        return '</a></li>';
    }

    function Top_Menu_Badge($number)
    {
        return '<sup>' . $number . '</sup>';
    }
//-----------------------------------------------
    function Start_Top_Menu_2()
    {
        return '<div class="top-2">';
    }

    function End_Top_Menu_2()
    {
        return '</div>';
    }

    function Start_Top_Menu_2_Item($name, $url, $class = "")
    {
        return '<a href="' . $url . '" class="top-2-menu ' . $class . '">' . $name;
    }

    function End_Top_Menu_2_Item()
    {
        return '</a>';
    }
//------------------------------
    function Start_Left()
    {
        return '<div class="left no-print">';
    }

    function End_Left()
    {
        return '</div>';
    }

    function Left_Logo()
    {
        return '<div class="m-left-name">Филиал - № 002<br> г. Худжанд</div>';
    }

    function Start_Left_Menu()
    {
        return '<ul class="left-menu">';
    }

    function End_Left_Menu()
    {
        return '</ul>';
    }

    function Start_Left_Menu_Item($name, $url, $class = "")
    {
        return '<li><a href="' . $url . '" class="m-items ' . $class . '">' . $name . "";
    }

    function End_Left_Menu_Item($submenu='')
    {
        return '</a>'.$submenu.'</li>';
    }

    function Start_Left_Menu_Child()
    {
        return '<ul class="child-menu">';
    }

    function End_Left_Menu_Child()
    {
        return '</ul>';
    }

    function Left_Menu_Triangle()
    {
        return '<div class="triangle-left"></div>';
    }

    function Start_Datatable($class = 'datatable')
    {
        return '<div class="'.$class.'">';
    }

    function End_Datatable()
    {
        return '</div>';
    }

    function Start_Table($class = "table-1")
    {
        return '<table class="' . $class . '">';
    }

    function End_Table()
    {
        return '</table>';
    }

    function Start_Datatable_Head()
    {
        return '<thead>';
    }

    function End_Datatable_Head()
    {
        return '</thead>';
    }

    function Start_Datatable_Body($class)
    {
        return '<tbody class="' . $class . '">';
    }

    function End_Datatable_Body()
    {
        return '</tbody>';
    }

    function Start_Datatable_Tr($class = "")
    {
        return '<tr class="' . $class . '">';
    }

    function End_Datatable_Tr()
    {
        return '</tr>';
    }

    function Start_Datatable_Th()
    {
        return '<th>';
    }

    function End_Datatable_Th()
    {
        return '</th>';
    }

    function Start_Datatable_Td($class = "", $colspan = "", $child_module = "")
    {
        return '<td class="' . $class . '" ' . $colspan . ' ' . $child_module . '>';
    }

    function End_Datatable_Td()
    {
        return '</td>';
    }

    function Start_Middle_Center()
    {
        return '<div class="middle-center">';
    }

    function End_Middle_Center()
    {
        return '</div>';
    }

    function Start_Module_Row_2($name_category, $show)
    {
        return '<div class="m-b-l-r-10 pure-g ' . $show . ' ' . $name_category . ' ">';
    }

    function End_Module_Row()
    {
        return '</div>';
    }

    function Start_Table_Sticky($classes = '', $table_name)
    {
        return '<div class="sticky-headers ">
                    <div class="sticky-table ">
                    </div>
                    <div class="sticky-filters ">
                    </div>
                </div>
                <div class="sticky-filters-list ">
                    <div class="sticky-table ">
                    </div>
                </div>
            <div class="sticky-cont">
            <table class = "' . $classes . '" data-table="' . $table_name . '">';
    }

    function Start_Thead_Element()
    {
        return '<thead>';
    }

    function End_Thead_Element()
    {
        return '</thead> <tbody class="filtered-tbody">
                    </tbody><tbody class="orig-tbody">';
    }

    function Start_Tr_Element($class)
    {
        return '<tr class = "' . $class . '">';
    }

    function End_Tr_Element()
    {
        return '</tr>';
    }

    function Start_Td_Element()
    {
        return '<td>';
    }

    function End_Td_Element()
    {
        return '</td>';
    }

    function Start_Th_Element($class, $datatype, $attr = '')
    {
        return '<th class = "' . $class . '" data-type="' . $datatype . '" ' . $attr . '>';
    }

    function End_Th_Element()
    {
        return '</th>';
    }

    function Start_Tfoot_Element()
    {
        return '</tbody><tfoot>';
    }

    function End_Tfoot_Element()
    {
        return '</tfoot>';
    }

    function Export_Btn_Table()
    {
        return '<input type="button" class="excel-btn" value="Экспорт в Excel">';
    }

    function End_Table_Sticky()
    {
        return '</tbody></table></div>
            <div class="sticky-footers ">
                <div class="sticky-table ">
                </div>
            </div>';
    }

    function Start_Center_Wrapper($width="50")
    {
        return '<div class="center-wrap-'.$width.'">';
    }

    function End_Center_Wrapper()
    {
        return '</div>';
    }

    function Start_Center_Box()
    {
        return '<div class="center-box">';
    }

    function End_Center_Box()
    {
        return '</div>';
    }

    function Start_Center_Child_Box()
    {
        return '<div class="center-child-box">';
    }

    function End_Center_Child_Box()
    {
        return '</div>';
    }

    function Start_Center_Box_Top($text)
    {
        return '<div class="center-box-top"> ' . $text;
    }

    function End_Center_Box_Top()
    {
        return '</div>';
    }

    function Start_Center_Box_Content()
    {
        return '<div class="center-box-content">';
    }

    function End_Center_Box_Content()
    {
        return '</div>';
    }

    function Start_Center_Box_Cap($chid_num = "0", $selected = "")
    {
        return '<div class="center-box-cap ' . $selected . '"><input type="hidden" name="ischild" value="' . $chid_num . '">';
    }

    function End_Center_Box_Cap()
    {
        return '</div>';
    }

    function C_Box_Caption_Text($name)
    {
        return '<div class="c-box-cap-text">' . $name . '</div>';
    }

    function Start_Center_Box_Cap_2()
    {
        return '<div class="center-box-cap-2">';
    }

    function End_Center_Box_Cap_2()
    {
        return '</div>';
    }

    function C_Box_Menu_Item($name, $url, $class = "")
    {
        return '<a href="' . $url . '" class="c-box-menu-item ' . $class . '" data-tab-btn="1">' . $name . '</a>';
    }

    function Start_Center_Box_Cont()
    {
        return '<div class="center-box-cont">';
    }

    function End_Center_Box_Cont()
    {
        return '</div>';
    }

    function Start_Center_Box_Row()
    {
        return '<div class="tab-row">';
    }

    function End_Center_Box_Row()
    {
        return '</div>';
    }

    function C_Box_Row_Name($name)
    {
        return '<div class="tab-name">' . $name . '</div>';
    }

    function Start_C_Box_Row_Text()
    {
        return '<div class="tab-text">';
    }

    function End_C_Box_Row_Text()
    {
        return '</div>';
    }

    function Start_Center_Box_Bottom()
    {
        return '<div class="center-box-bot">';
    }

    function End_Center_Box_Bottom()
    {
        return '</div>';
    }

    function Start_Center_Box_Msg()
    {
        return '<div class="center-box-msg">';
    }

    function End_Center_Box_Msg()
    {
        return '</div>';
    }

    function Start_Select_Element($id_cmb, $name_for_form, $value = "", $class = "", $name = 'Выберите значение')
    {
        $res = '<div class="listselectbox noactive ' . $class . ' " tabindex="-1">
                <div class="icons btn-grid"></div>
                <div class="btn btn-code btn-select">' . $name . ' </div>
                <div class="dropdownlist" >
                    <input type="text" class="textbox" placeholder="Поиск">
                    <input type="hidden" class="hiddenbox ' . $id_cmb . '" name = "' . $name_for_form . '" value="' . $value . '" >
                <ul class="orig-list">';
        return $res;
    }

    function End_Select_Element()
    {
        return '</ul> <ul class="filtered-list"></ul> 
            </div>
            </div>';
    }

    function Option_Select_Element($value, $name, $selected_text = '')
    {
        return '<li data-v= "' . $value . '" class="' . $selected_text . '">' . $name . '</li>';
    }

    function Start_Center_Box_Code()
    {
        return '<div class="center-box-code">';
    }

    function End_Center_Box_Code()
    {
        return '</div>';
    }

    function Input_Date($name, $value, $class = "")
    {
        return '<input type="date" class="w-100 ' . $class . '" name="' . $name . '" value="' . $value . '" />';
    }

    function Input_Text($name, $value, $class = "")
    {
        return '<input type="text" class="w-100 ' . $class . '" name="' . $name . '" value="' . $value . '" />';
    }

    function Input_RichText($name, $value, $class = "")
    {
        return '<textarea class="w-100 ' . $class . '" name="' . $name . '" >' . $value . '</textarea>';
    }

    function Input_Hidden($name, $value, $value2 = "", $class = "")
    {
        return '<input type="hidden" class="w-100 ' . $class . '" name="' . $name . '" value="' . $value . '" /><div class="h-text">' . $value2 . '</div>';
    }

    function Action_Buttons_Text($text)
    {
        return '<div class="ac-btn-text">' . $text . '</div>';
    }

    function Action_Buttons_Add($text)
    {
        return '<button class="ac-btn-add">' . $text . '</button>';
    }

    function Action_Buttons_Default($text)
    {
        return '<button class="ac-btn-default">' . $text . '</button>';
    }

    function Action_Buttons_Edit($text)
    {
        return '<button class="ac-btn-edit">' . $text . '</button>';
    }

    function Action_Buttons_Delete($text)
    {
        return '<button class="ac-btn-del">' . $text . '</button>';
    }

    function Start_Action_Buttons($class = "")
    {
        return '<div class="ac-btns ' . $class . '">';
    }

    function End_Action_Buttons()
    {
        return '</div>';
    }

    function Action_Message_Success($text, $class = "")
    {
        return '<div class="ac-btn-msg"><div class="ac-btn-msg-text">' . $text . '</div><button class="ac-btn-ok">Ок</button></div>';
    }

    function New_Code($text)
    {
        return '<div class="">' . $text . '</div>';
    }

    function Start_K_Table_1($class = "")
    {
        return '<div class="' . $class . ' k-table-1">';
    }

    function End_K_Table_1()
    {
        return '</div>';
    }

    function Start_K_Thead()
    {
        return '<div class="k-thead">';
    }

    function End_K_Thead()
    {
        return '</div>';
    }

    function Start_K_Tbody($class = "")
    {
        return '<div class="' . $class . ' k-tbody">';
    }

    function End_K_Tbody()
    {
        return '</div>';
    }

    function Start_K_Tfoot()
    {
        return '<div class="k-tfoot">';
    }

    function End_K_Tfoot()
    {
        return '</div>';
    }

    function Start_K_Tr()
    {
        return '<div class="k-tr">';
    }

    function End_K_Tr()
    {
        return '</div>';
    }

    function Start_K_Th()
    {
        return '<div class="k-th">';
    }

    function End_K_Th()
    {
        return '</div>';
    }

    function Start_K_Td_1()
    {
        return '<div class="k-td-1">';
    }

    function End_K_Td_1()
    {
        return '</div>';
    }

    function K_Td_1($text)
    {
        return '<div class="k-td-1">' . $text . '</div>';
    }

    function Start_K_Td_2()
    {
        return '<div class="k-td-2">';
    }

    function End_K_Td_2()
    {
        return '</div>';
    }

    function K_Td_2($text)
    {
        return '<div class="k-td-2">' . $text . '</div>';
    }

    function Start_K_Td_3()
    {
        return '<div class="k-td-3">';
    }

    function End_K_Td_3()
    {
        return '</div>';
    }

    function K_Td_3($text)
    {
        return '<div class="k-td-3">' . $text . '</div>';
    }

    function Start_K_Tgroup()
    {
        return '<div class="k-tgroup">';
    }

    function End_K_Tgroup()
    {
        return '</div>';
    }

    function Ic_Add()
    {
        return '<i class="ic-add"></i>';
    }

    function Box_Menu($value, $selected, $menu, $submenu, $form_name_return='', $id_module_code='')
    {
        return '<div class="box-menu icons ic-menu">
                    <input type="hidden" name="menu" value="' . $menu . '">
                    <input type="hidden" name="submenu" value="' . $submenu . '">
                    <input type="hidden" name="data_mode" value="' . $value . '">
                    <input type="hidden" name="form_name_return" value="' . $form_name_return . '">
                    <input type="hidden" name="id_module_code" value="' . $id_module_code . '">
                    <div class="dropdown">
                        <div class="b-item item-sel ' . $selected[1] . '" data-val="1"><i class="icons ic-menu-sel"></i>Просмотр</div>
                        <div class="b-item item-add ' . $selected[2] . '" data-val="2"><i class="icons ic-menu-add"></i>Добавление</div>
                        <div class="b-item item-upd ' . $selected[3] . '" data-val="3"><i class="icons ic-menu-upd"></i>Изменение</div>
                        <div class="b-item item-del ' . $selected[4] . '" data-val="4"><i class="icons ic-menu-del"></i>Удаление</div>
                        <div class="b-item item-close" data-val="0"><i class="icons ic-menu-close"></i>Закрыть</div>
                    </div>
                </div>';
    }

    function Start_Dialog_Box()
    {
        return '<div class="dialog-box" tabindex="1">
                <div class="fade-box">';
    }

    function End_Dialog_Box()
    {
        return '</div><div class="center-d-box"></div></div>';
    }

    function Icon_Dot()
    {
        return '<i class="ic-dot"></i>';
    }

    function Expand_Code($text)
    {
        return '<div class="exp-code">' . $text . '<i class="ic-exp-code"></i><div>';
    }




}
