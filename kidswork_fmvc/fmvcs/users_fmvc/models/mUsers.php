<?php
namespace Kidswork\Backend;

class mUsers
{
    public $fUsers;

    public function __construct($cKidswork)
    {
        $this->fUsers = new fUsers();
        //$cKidswork->Import($this->fUsers);
    }
}