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
}
