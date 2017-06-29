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
                    <a href="#" class="top-left-logo">'.$Logo_name.'</a>
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
        return '<li><a href="'.$url.'" class="m-t-items '.$class.'">'.$name;
    }

    function End_Top_Menu_Item()
    {
        return '</a></li>';
    }

    function Top_Menu_Badge($number)
    {
        return '<sup>'.$number.'</sup>';
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
        return '<a href="'.$url.'" class="top-2-menu '.$class.'">'.$name;
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
        return '<li><a href="'.$url.'" class="m-items '.$class.'">'.$name."";
    }

    function End_Left_Menu_Item()
    {
        return '</a></li>';
    }

    function Left_Menu_Triangle()
    {
        return '<div class="triangle-left"></div>';
    }

    function Start_Datatable()
    {
        return '<div class="datatable">';
    }

    function End_Datatable()
    {
        return '</div>';
    }

    function Start_Table()
    {
        return '<table class="table-1">';
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

    function Start_Datatable_Body()
    {
        return '<tbody>';
    }

    function End_Datatable_Body()
    {
        return '</tbody>';
    }

    function Start_Datatable_Tr()
    {
        return '<tr>';
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

    function Start_Datatable_Td()
    {
        return '<td>';
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

    function Start_Module_Row_2($name_category, $show) {
        return '<div class="m-b-l-r-10 pure-g ' . $show . ' ' . $name_category . ' ">';
    }

    function End_Module_Row() {
        return '</div>';
    }

    function Start_Table_Sticky($classes = '', $table_name) {
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
            <table class = "' . $classes . '" data-table="' . $table_name . '">'
        ;
    }

    function Start_Thead_Element() {
        return '<thead>';
    }

    function End_Thead_Element() {
        return '</thead> <tbody class="filtered-tbody">
                    </tbody><tbody class="orig-tbody">';
    }

    function Start_Tr_Element($class) {
        return '<tr class = "' . $class . '">';
    }

    function End_Tr_Element() {
        return '</tr>';
    }

    function Start_Td_Element() {
        return '<td>';
    }

    function End_Td_Element() {
        return '</td>';
    }

    function Start_Th_Element($class, $datatype, $attr = '') {
        return '<th class = "' . $class . '" data-type="' . $datatype . '" ' . $attr . '>';
    }

    function End_Th_Element() {
        return '</th>';
    }

    function Start_Tfoot_Element() {
        return '</tbody><tfoot>';
    }

    function End_Tfoot_Element() {
        return '</tfoot>';
    }

    function Export_Btn_Table() {
        return '<input type="button" class="excel-btn" value="Экспорт в Excel">';
    }

    function End_Table_Sticky() {
        return '</tbody></table></div>
            <div class="sticky-footers ">
                <div class="sticky-table ">
                </div>
            </div>';
    }


}
