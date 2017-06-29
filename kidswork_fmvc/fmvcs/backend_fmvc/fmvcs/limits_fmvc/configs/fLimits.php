<?php

namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fLimits extends fConfigs
{
    private $fmvc_array = array();
   
    function __construct()
    {
        $this->add_column('code_id', 'ID');
        $this->add_column('code_1', 'Код');
        $this->add_column('name_address', 'Наименование');
        $this->add_column('code', 'Счёт');
        $this->add_column('limit', 'Лимит');
        $this->add_column('name_currency', 'Валюта');
        $this->add_column('name', 'Категория');
        /*
        $this->fmvc_array["NAME_fmvc"] = "Kidswork\NAME";
        $this->set_fmvc_array($this->fmvc_array);
        $this->set_path(__DIR__);
        */
    }
}