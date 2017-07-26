<?php
namespace Kidswork;

use \Kidswork\mModels;
use \PDO;

class mDatabase extends mModels
{
    public $fDatabase;

    public function __construct($cKidswork)
    {
        
        $pdo_dsn = $cKidswork->fKidswork->get()->configs->get()->pdo_dsn->get();
        $pdo_username  = $cKidswork->fKidswork->get()->configs->get()->pdo_username->get();
        $pdo_password  = $cKidswork->fKidswork->get()->configs->get()->pdo_password->get();
        $this->fDatabase = new fDatabase($pdo_dsn, $pdo_username, $pdo_password);
        $this->fConfig = $this->fDatabase;
        parent::__construct($cKidswork);
        
    }

    protected function Connection()
    {
        try {
            return new \PDO($this->fDatabase->get()->pdo_dsn->get(), $this->fDatabase->get()->pdo_username->get(), $this->fDatabase->get()->pdo_password->get(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
            if ($this->fDatabase->get()->query_switcher->get() == 's' || $this->fDatabase->get()->query_switcher->get() == 'd') {
                $from = 'FROM';
            }
            $this->fDatabase->get()->query_text->set($this->fDatabase->get()->get_query_switched());
            $this->fDatabase->get()->add_query_text_imploded('', $this->fDatabase->get()->query_column_names->get(), ", ", "");
            $this->fDatabase->get()->add_query_text_imploded($from, $this->fDatabase->get()->query_table_names->get(), ",");
            $this->fDatabase->get()->query_text->con($this->fDatabase->get()->query_join_filters->get());
            $this->fDatabase->get()->add_query_text_imploded('SET', $this->fDatabase->get()->get_query_array_walked($this->fDatabase->get()->query_parameters->get()), ",");
            $this->fDatabase->get()->add_query_text_imploded_2('WHERE', $this->fDatabase->get()->get_query_array_walked_2($this->fDatabase->get()->query_conditions->get()));
            $this->fDatabase->get()->add_query_text_imploded('GROUP BY', $this->fDatabase->get()->query_group_by->get(), ",");
            $this->fDatabase->get()->add_query_text_imploded('ORDER BY', $this->fDatabase->get()->query_order_by->get(), ",");
            $this->fDatabase->get()->add_query_text_imploded('LIMIT', $this->fDatabase->get()->query_limit->get(), ",");
            //echo $this->fDatabase->get()->query_text->get() . '<br>';
            if ($this->fDatabase->get()->pdo->get() == null) {
                $this->fDatabase->get()->pdo->set($this->Connection($this->fDatabase->get()));
            }
            $this->fDatabase->get()->pdo_stmt->set($this->fDatabase->get()->pdo->get()->prepare($this->fDatabase->get()->query_text->get()));
            $this->Bind_Value_Operation($this->fDatabase->get()->query_parameters->get());
            $this->Bind_Value_Operation_2($this->fDatabase->get()->query_conditions->get());
            $this->fDatabase->get()->pdo_stmt->get()->execute();
            $this->fDatabase->get()->last_inserted_id->set($this->fDatabase->get()->pdo->get()->lastInsertId());
            $this->fDatabase->get()->pdo_error_code->set($this->fDatabase->get()->pdo_stmt->get()->errorCode());
            $this->fDatabase->get()->pdo_error_info->set($this->fDatabase->get()->pdo_stmt->get()->errorInfo());
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
                $this->fDatabase->get()->pdo_stmt->get()->bindValue($value[0], $value[2], $this->fDatabase->get()->get_query_value_type_value($value[3]));
            } else {
                $value[0] = ':' . str_replace('.', '_', $value[0]) . '_pdo';
                $this->fDatabase->get()->pdo_stmt->get()->bindValue($value[0], $value[2], $this->fDatabase->get()->get_query_value_type_value($value[3]));
            }

        }
    }

        public function Bind_Value_Operation_2($array) {
        foreach ($array as $key => $value) {
            //echo ($value[2]).'/--/';
            if ($value[5] == 'con') {
                
            } else if ($value[3] == 'arr') {
                $value[1] = ':' . str_replace('.', '_', $value[1]) . '_pdo';
                $this->fDatabase->get()->pdo_stmt->get()->bindValue($value[1], $value[3], $this->fDatabase->get()->get_query_value_type_value($value[5]));
            } else {
                $value[1] = ':' . str_replace('.', '_', $value[1]) . '_pdo';
                $this->fDatabase->get()->pdo_stmt->get()->bindValue($value[1], $value[3], $this->fDatabase->get()->get_query_value_type_value($value[5]));
            }
        }
    }

    protected function Clear()
    {
        $this->fDatabase->get()->query_table_names->set(array());
        $this->fDatabase->get()->query_text->set('');
        $this->fDatabase->get()->query_switcher->set('');
        $this->fDatabase->get()->query_conditions->set(array());
        $this->fDatabase->get()->query_group_by->set(array());
        $this->fDatabase->get()->query_order_by->set(array());
        $this->fDatabase->get()->query_limit->set(array());
        $this->fDatabase->get()->pdo_stmt->set(null);
        $this->fDatabase->get()->query_column_names->set(array());
        $this->fDatabase->get()->query_parameters->set(array());
        $this->fDatabase->get()->query_value_type->set(null);
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
            return date_format(date_create(str_replace("T", " ", $date_string)), 'd.m.Y');
            // H:i
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
