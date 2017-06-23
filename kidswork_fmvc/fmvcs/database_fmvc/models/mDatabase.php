<?php
namespace Kidswork\Backend;

class mDatabase
{
    public $fDatabase;

    public function __construct($cKidswork)
    {
        $this->fDatabase = new fDatabase();
        //$cKidswork->Import($this->fDatabase);
    }
}