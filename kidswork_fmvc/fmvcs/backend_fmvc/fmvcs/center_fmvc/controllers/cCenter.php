<?php
namespace Kidswork\Backend;


class cCenter extends mCenter
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
        return $this->fCenter->get_final_struct();
    }
}
