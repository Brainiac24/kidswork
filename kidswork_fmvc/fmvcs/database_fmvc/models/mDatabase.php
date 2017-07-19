<?php
namespace Kidswork;

use \Kidswork\mModels;
use \PDO;

class mDatabase extends mModels
{
    public $fDatabase;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->cKidswork->set($cKidswork);
        $pdo_dsn = $this->cKidswork->get()->fKidswork->get()->configs->get()->pdo_dsn->get();
        $pdo_username  = $this->cKidswork->get()->fKidswork->get()->configs->get()->pdo_username->get();
        $pdo_password  = $this->cKidswork->get()->fKidswork->get()->configs->get()->pdo_password->get();
        $this->fDatabase->set(new fDatabase($pdo_dsn, $pdo_username, $pdo_password));
    }

    protected function Connection()
    {
        try {
            return new \PDO($this->fDatabase->pdo_dsn->get(), $this->fDatabase->pdo_username->get(), $this->fDatabase->pdo_password->get(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            return 'Connection error: ' . $e->getMessage();
        } catch (Exception $e) {
            return 'Unknown error: ' . $e->getMessage();
        }
    }

    protected function Operation()
    {
        if ($this->fDatabase->get() != null) {
            $from = '';
            if ($this->fDatabase->query_switcher->get() == 's' || $this->fDatabase->query_switcher->get() == 'd') {
                $from = 'FROM';
            }
            $this->fDatabase->query_text->set($this->fDatabase->query_switcher->get());
            $this->fDatabase->add_query_text_imploded('', $this->fDatabase->get_query_column_names(), ", ", "");
            $this->fDatabase->add_query_text_imploded($from, $this->fDatabase->get_query_table_names(), ",");
            $this->fDatabase->query_text->con($this->fDatabase->query_join_filters->get());
            $this->fDatabase->add_query_text_imploded('SET', $this->fDatabase->get_query_array_walked($this->fDatabase->query_parameters->get()), ",");
            $this->fDatabase->add_query_text_imploded_2('WHERE', $this->fDatabase->get_query_array_walked_2($this->fDatabase->query_conditions->get()));
            $this->fDatabase->add_query_text_imploded('GROUP BY', $this->fDatabase->query_group_by->get(), ",");
            $this->fDatabase->add_query_text_imploded('ORDER BY', $this->fDatabase->query_order_by->get(), ",");
            $this->fDatabase->add_query_text_imploded('LIMIT', $this->fDatabase->query_limit->get(), ",");
            //echo $this->fDatabase->get_query_text() . '<br>';
            if ($this->fDatabase->pdo->get() == null) {
                $this->fDatabase->pdo->set($this->Connection($this->fDatabase->get()));
            }
            $this->fDatabase->pdo_stmt->set($this->fDatabase->pdo->get()->prepare($this->fDatabase->query_text->get()));
            $this->Bind_Value_Operation($this->fDatabase, $this->fDatabase->query_parameters->get());
            $this->Bind_Value_Operation($this->fDatabase, $this->fDatabase->query_conditions->get());
            $this->fDatabase->pdo_stmt->get()->execute();
            $this->fDatabase->last_inserted_id->set($this->fDatabase->pdo->get()->lastInsertId());
            $this->fDatabase->pdo_error_code->set($this->fDatabase->pdo_stmt->get()->errorCode());
            $this->fDatabase->pdo_error_info->set($this->fDatabase->pdo_stmt->get()->errorInfo());
            //var_dump($this->fDatabase->get_pdo_stmt());
        }
        return $this;
    }

    protected function Bind_Value_Operation($array)
    {
        foreach ($array as $key => $value) {
            //echo ($value[2]).'/--/';
            if ($value[3] == 'con') {
            } elseif ($value[3] == 'arr') {
                $value[0] = ':' . str_replace('.', '_', $value[0]) . '_pdo';
                $this->fDatabase->pdo_stmt->get()->bindValue($value[0], $value[2], $this->fDatabase->get_query_value_type_value($value[3]));
            } else {
                $value[0] = ':' . str_replace('.', '_', $value[0]) . '_pdo';
                $this->fDatabase->pdo_stmt->get()->bindValue($value[0], $value[2], $this->fDatabase->get_query_value_type_value($value[3]));
            }
        }
    }

    protected function Clear()
    {
        $this->fDatabase->query_table_names->set(array());
        $this->fDatabase->query_text->set('');
        $this->fDatabase->query_switcher->set('');
        $this->fDatabase->query_conditions->set(array());
        $this->fDatabase->query_group_by->set(array());
        $this->fDatabase->query_order_by->set(array());
        $this->fDatabase->query_limit->set(array());
        $this->fDatabase->pdo_stmt->set(null);
        $this->fDatabase->query_column_names->set(array());
        $this->fDatabase->query_parameters->set(array());
        $this->fDatabase->query_value_type->set(null);
    }

    function Convert_Date_To_Mysql($date_string)
    {
        if ($date_string != null || $date_string != '') {
            date_default_timezone_set('GMT');
            //echo date_format(date_create($date_string), 'Y-m-d H:i:s');
            return date_format(date_create($date_string), 'Y-m-d H:i:s');
        }
    }

    function Convert_Date_To_Html($date_string)
    {
        if ($date_string != null || $date_string != '') {
            date_default_timezone_set('GMT');
            return date_format(date_create($date_string), 'Y-m-d\TH:i');
        }
    }

    function Convert_Date_To_Label($date_string)
    {
        if ($date_string != null || $date_string != '') {
            date_default_timezone_set('GMT');
            return date_format(date_create(str_replace("T", " ", $date_string)), 'd.m.Y H:i');
        }
    }

    function Pdo_Error_Handler($error_code, $name = '', $value = '', $btn_2 = false)
    {
        $res = '';
        if (is_array($error_code)) {
            switch ($error_code[0]) {
                case "00000":
                    $res = $error_code[0] . '; ' . $error_code[1] . '; ' . $error_code[2];
                    break;
                default:
                    $res = $error_code[0] . '; ' . $error_code[1] . '; ' . $error_code[2];
                    break;
            }
        } else {
            $res = $error_code;
        }
        return $res;
    }

    function Pdo_Error_Break()
    {
    }
}
