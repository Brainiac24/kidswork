<?php
namespace Kidswork;

use \Kidswork\mModels;
use \PDO;

class mDatabase
{
    public $fDatabase;
    protected $cKidswork;

    private $pdo_dsn = 'mysql:dbname=dbr_limits;host=127.0.0.1';
    private $pdo_username = 'root';
    private $pdo_password = '123';
    private $admin_key = 'daler';
    private $session_key = '1';

    protected function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $pdo_dsn = $this->cKidswork->fKidswork->configs->get_pdo_dsn();
        $pdo_username  = $this->cKidswork->fKidswork->configs->get_pdo_username();
        $pdo_password  = $this->cKidswork->fKidswork->configs->get_pdo_password();
        $this->fDatabase = new fDatabase($pdo_dsn, $pdo_username, $pdo_password);
    }

    protected function Connection()
    {
        try {
            return new \PDO($this->fDatabase->get_pdo_dsn(), $this->fDatabase->get_pdo_username(), $this->fDatabase->get_pdo_password(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            return 'Connection error: ' . $e->getMessage();
        } catch (Exception $e) {
            return 'Unknown error: ' . $e->getMessage();
        }
    }

    protected function Operation()
    {
        if ($this->fDatabase != null) {
            $from = '';
            if ($this->fDatabase->get_query_switcher() == 's' || $this->fDatabase->get_query_switcher() == 'd') {
                $from = 'FROM';
            }
            $this->fDatabase->set_query_text($this->fDatabase->get_query_switched());
            $this->fDatabase->add_query_text_imploded('', $this->fDatabase->get_query_column_names(), ", ", "");
            $this->fDatabase->add_query_text_imploded($from, $this->fDatabase->get_query_table_names(), ",");
            $this->fDatabase->add_query_text($this->fDatabase->get_query_join_filters());
            $this->fDatabase->add_query_text_imploded('SET', $this->fDatabase->get_query_array_walked($this->fDatabase->get_query_parameters()), ",");
            $this->fDatabase->add_query_text_imploded_2('WHERE', $this->fDatabase->get_query_array_walked_2($this->fDatabase->get_query_conditions()));
            $this->fDatabase->add_query_text_imploded('GROUP BY', $this->fDatabase->get_query_group_by(), ",");
            $this->fDatabase->add_query_text_imploded('ORDER BY', $this->fDatabase->get_query_order_by(), ",");
            $this->fDatabase->add_query_text_imploded('LIMIT', $this->fDatabase->get_query_limit(), ",");
            //echo $this->fDatabase->get_query_text() . '<br>';
            if ($this->fDatabase->get_pdo() == null) {
                $this->fDatabase->set_pdo($this->Connection($this->fDatabase));
            }
            $this->fDatabase->set_pdo_stmt($this->fDatabase->get_pdo()->prepare($this->fDatabase->get_query_text()));
            $this->Bind_Value_Operation($this->fDatabase, $this->fDatabase->get_query_parameters());
            $this->Bind_Value_Operation($this->fDatabase, $this->fDatabase->get_query_conditions());
            $this->fDatabase->get_pdo_stmt()->execute();
            $this->fDatabase->set_last_inserted_id($this->fDatabase->get_pdo()->lastInsertId());
            $this->fDatabase->set_pdo_error_code($this->fDatabase->get_pdo_stmt()->errorCode());
            $this->fDatabase->set_pdo_error_info($this->fDatabase->get_pdo_stmt()->errorInfo());
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
                $this->fDatabase->get_pdo_stmt()->bindValue($value[0], $value[2], $this->fDatabase->get_query_value_type_value($value[3]));
            } else {
                $value[0] = ':' . str_replace('.', '_', $value[0]) . '_pdo';
                $this->fDatabase->get_pdo_stmt()->bindValue($value[0], $value[2], $this->fDatabase->get_query_value_type_value($value[3]));
            }
        }
    }

    protected function Clear()
    {
        $this->fDatabase->set_query_table_names(array());
        $this->fDatabase->set_query_text('');
        $this->fDatabase->set_query_switcher('');
        $this->fDatabase->set_query_conditions(array());
        $this->fDatabase->set_query_group_by(array());
        $this->fDatabase->set_query_order_by(array());
        $this->fDatabase->set_query_limit(array());
        $this->fDatabase->set_pdo_stmt(null);
        $this->fDatabase->set_query_column_names(array());
        $this->fDatabase->set_query_parameters(array());
        $this->fDatabase->set_query_value_type(null);
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
            $res = cTemplates::Box_Message_Error($error_code);
        }
        return $res;
    }

    function Pdo_Error_Break()
    {
    }
}
