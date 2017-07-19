<?php
namespace Kidswork;


class cDatabase extends mDatabase
{
    
    function Init_Full()
    {
    }

    function Init_Ajax()
    {
    }

    public function Print()
    {
        return $this->fDatabase->final_struct->get();
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
