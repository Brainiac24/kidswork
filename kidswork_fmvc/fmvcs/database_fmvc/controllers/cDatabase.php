<?php
namespace Kidswork;


class cDatabase extends mDatabase
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
        return $this->fDatabase->get_final_struct();
    }

    public function Connection() {
        return parent::Connection();
    }

    public function Operation() {
        return parent::Operation();
    }
    
    public function Clear() {
        return parent::Clear();
    }
    
    function Convert_Date_To_Label($date_string) {
        return parent::Convert_Date_To_Label($date_string);
    }

}
