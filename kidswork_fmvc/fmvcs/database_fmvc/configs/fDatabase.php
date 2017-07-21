<?php

namespace Kidswork;

class fDatabase extends fConfigs
{
    public $debug_mode = true;
    public $pdo_dsn = '';
    public $pdo_username = '';
    public $pdo_password = '';
    public $query_table_names = array();
    public $query_column_names = array();
    public $query_text = '';
    public $query_switcher = '';
    public $query_parameters = array();
    public $query_conditions = array();
    public $query_connections = array();
    public $query_join_filters = '';
    public $query_group_by = array();
    public $query_order_by = array();
    public $query_limit = array();
    public $query_value_type = null;
    public $pdo_stmt = null;
    public $pdo = null;
    public $pdo_error_code = null;
    public $pdo_error_info = null;
    public $last_inserted_id = null;
    public $admin_key = '';
    public $session_key = '';

    function __construct($pdo_dsn, $pdo_username, $pdo_password)
    {
        parent::__construct();
        //\var_dump($this->pdo_dsn);
        $this->pdo_dsn->set($pdo_dsn);
        $this->pdo_username->set($pdo_username);
        $this->pdo_password->set($pdo_password);
    }

    function get_query_switched()
    {
        $res = '';
        switch ($this->query_switcher->get()) {
            case 's':
                $res = "SELECT ";
                break;
            case 'i':
                $res = "INSERT INTO ";
                break;
            case 'u':
                $res = "UPDATE ";
                break;
            case 'd':
                $res = "DELETE ";
                break;
            default:
                $res = "";
                break;
        }
        return $res;
    }

    function add_query_text_imploded($start_query, $array, $implode_char = ', ', $if_array_count_zero_echo = '')
    {
        $this->query_text->con($this->get_query_imploded($start_query, $array, $implode_char, $if_array_count_zero_echo));
    }

    function add_query_text_imploded_2($start_query, $array, $if_array_count_zero_echo = '')
    {
        $this->query_text->con($this->get_query_imploded_2($start_query, $array, $if_array_count_zero_echo));
    }

    function add_query_conditions($group_start, $column_name, $condition, $value, $group_end, $type, $connection)
    {
        $this->query_conditions->add(array($group_start, $column_name, $condition, $value, $group_end, $type, $connection));
    }

    function get_query_imploded($start_query, $array, $implode_char = ', ', $if_array_count_zero_echo = '')
    {
        if ($array != null && count($array) > 0) {
            return ' ' . $start_query . ' ' . implode(' ' . $implode_char . ' ', $array);
        }
        return ' ' . $if_array_count_zero_echo . ' ';
    }

    function get_query_imploded_2($start_query, $array, $if_array_count_zero_echo = '')
    {
        if ($array != null && count($array) > 0) {
            return ' ' . $start_query . ' ' . implode(' ', $array);
        }
        return ' ' . $if_array_count_zero_echo . ' ';
    }

    function set_array_walked(&$item1, $key)
    {
        if ($item1[3] != 'con') {
            if (strpos($item1[0], ".") > 0) {
                $col = str_replace('.', '.`', $item1[0]) . '` ';
            } else {
                $col = ' `' . $item1[0] . '` ';
            }
            $item1 = ' ' . $col . ' ' . $item1[1] . ' :' . str_replace('.', "_", $item1[0]) . '_pdo';
        } else {
            $item1 = ' ' . $item1[0] . ' ' . $item1[1] . ' ' . $item1[2];
        }
    }

    function get_query_array_walked($array)
    {
        $a = $array;
        if ($a != null) {
            array_walk($a, array('\Kidswork\fDatabase', 'set_array_walked'));
        }
        return $a;
    }

    //$db->add_query_parameters('(','email', '=', $fProducts->get_email(), ')', 'str', 'AND');

    function set_array_walked_2(&$item1, $key)
    {
        if ($item1[5] != 'con') {
            if (strpos($item1[1], ".") > 0) {
                $col = str_replace('.', '.`', $item1[1]) . '` ';
            } else {
                $col = ' `' . $item1[1] . '` ';
            }
            $item1 = ' '. $item1[0] . $col . ' ' . $item1[2] . ' :' . str_replace('.', "_", $item1[1]) . '_pdo'.$item1[4]." ".$item1[6];
        } else {
            $item1 = ' ' . $item1[0] . $item1[1] . ' ' . $item1[2] . ' ' . $item1[3]. ' ' . $item1[4]. ' ' . $item1[6];
        }
    }

    function get_query_array_walked_2($array)
    {
        $a = $array;
        if ($a != null) {
            array_walk($a, array('\Kidswork\fDatabase', 'set_array_walked_2'));
        }
        return $a;
    }
    
    function add_query_parameters($column_name, $condition, $value, $type)
    {
        $this->query_parameters->add(array($column_name, $condition, $value, $type));
    }

    function get_query_value_type_value($value_type = 'str')
    {
        $a = array('' => \PDO::PARAM_STR, 'str' => \PDO::PARAM_STR, 'float' => \PDO::PARAM_STR, 'con' => \PDO::PARAM_STR, 'arr' => \PDO::PARAM_STR, 'int' => \PDO::PARAM_INT);
        return $a[$value_type];
    }

}
