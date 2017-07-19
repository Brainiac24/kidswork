<?php

namespace Kidswork;

class fDatabase extends fConfigs
{
    protected $debug_mode = true;
    protected $pdo_dsn = '';
    protected $pdo_username = '';
    protected $pdo_password = '';
    protected $query_table_names = array();
    protected $query_column_names = array();
    protected $query_text = '';
    protected $query_switcher = '';
    protected $query_parameters = array();
    protected $query_conditions = array();
    protected $query_connections = array();
    protected $query_join_filters = '';
    protected $query_group_by = array();
    protected $query_order_by = array();
    protected $query_limit = array();
    protected $query_value_type = null;
    protected $pdo_stmt = null;
    protected $pdo = null;
    protected $pdo_error_code = null;
    protected $pdo_error_info = null;
    protected $last_inserted_id = null;
    protected $admin_key = '';
    protected $session_key = '';

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
        $this->query_text .= $this->get_query_imploded($start_query, $array, $implode_char, $if_array_count_zero_echo);
    }

    function add_query_text_imploded_2($start_query, $array, $if_array_count_zero_echo = '')
    {
        $this->query_text .= $this->get_query_imploded_2($start_query, $array, $if_array_count_zero_echo);
    }

    function add_query_conditions($group_start, $column_name, $condition, $value, $group_end, $type, $connection)
    {
        $this->query_conditions[] = array($group_start, $column_name, $condition, $value, $group_end, $type, $connection);
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
            array_walk($a, array('fDatabase', 'set_array_walked'));
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
        $this->query_parameters[] = array($column_name, $condition, $value, $type);
    }

    function get_query_value_type_value($value_type = 'str')
    {
        $a = array('' => PDO::PARAM_STR, 'str' => PDO::PARAM_STR, 'con' => PDO::PARAM_STR, 'arr' => PDO::PARAM_STR, 'int' => PDO::PARAM_INT);
        return $a[$value_type];
    }

}
