<?php
namespace Kidswork\Backend;

use \Kidswork\fConfigs;

class fFraud extends fConfigs
{
    public $data_mode = array("validation" => array("data_mode" => array("rules" => array(0 => "int|required"))));
    public $action = array("validation" => array("act" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $is_child = array("validation" => array("ischild" => array("rules" => array(0 => "int|required", 2 => ""))), "value" => "1");
    public $child_module = array("validation" => array("child_module" => array("rules" => array(0 => "str|required", 2 => ""))));

    public $id = array("validation" => array("id_fraud" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $id_fraud_attr = array("validation" => array("id_fraud_attr" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $date1 = array("validation" => array("date1" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $id_fraud_actions = array("validation" => array("id_fraud_actions" => array("rules" => array(0 => "int|required", 2 => ""))));
    public $desc = array("validation" => array("desc" => array("rules" => array(0 => "str|required", 2 => ""))));
    public $imported_file = array("validation" => array("imported_file" => array("rules" => array(0 => "str|required", 2 => ""))));

    public $colls = null;

    function __construct()
    {
        parent::__construct();
        $this->fmvc_array->add("fraud_attr_fmvc", "Kidswork\Backend");
        $this->path->set(__DIR__);

        $this->colls->add('id_fraud', array('Код', 'count'));
        $this->colls->add('date1', array('Дата', 'date'));
        $this->colls->add('id_fraud_attr', array('Код описания фрода', 'summ'));
        $this->colls->add('name_divisions_filial', array('Филиал', ''));
        $this->colls->add('name_divisions_mhb', array('Подразделение', ''));
        $this->colls->add('name_business_line', array('Бизнес линия', ''));
        $this->colls->add('name_risk_category', array('Вид риска', ''));
        $this->colls->add('name_risk_factor', array('Факторы риска', ''));
        $this->colls->add('name_loss_type', array('Вид потерь', ''));
        $this->colls->add('loss_amount_base', array('Сумма номинальных потерь', 'summ'));
        $this->colls->add('loss_amount_current', array('Сумма текущих потерь', 'summ'));
        $this->colls->add('loss_amount_restored', array('Востановленная сумма', 'summ'));
        $this->colls->add('loss_amount_fact', array('Фактическая сумма потерь', 'summ'));
        $this->colls->add('name_currency', array('Валюта', ''));
        $this->colls->add('rate', array('Курс валюты', ''));
        $this->colls->add('loss_amount_base_tjs', array('Сумма номинальных потерь в Сомони', 'summ'));
        $this->colls->add('loss_amount_current_tjs', array('Сумма текущих потерь в Сомони', 'summ'));
        $this->colls->add('loss_amount_restored_tjs', array('Востановленная сумма в Сомони', 'summ'));
        $this->colls->add('loss_amount_fact_tjs', array('Фактическая сумма потерь в Сомони', 'summ'));
        $this->colls->add('responsible_person', array('Ответственные лица', ''));
        $this->colls->add('desc_fraud_attr', array('Подробное описание события', ''));
        $this->colls->add('date_fraud', array('Дата изменения статуса', ''));
        $this->colls->add('name_fraud_action', array('Предпринятые меры', ''));
        $this->colls->add('desc_fraud', array('Описание предпринятых мер', ''));
    }
}