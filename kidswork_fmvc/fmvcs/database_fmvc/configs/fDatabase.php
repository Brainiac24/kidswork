<?php

namespace Kidswork;

class fDatabase extends fConfigs
{
    
    function __construct($pdo_dsn, $pdo_username, $pdo_password)
    {
        $this->set_pdo_dsn($pdo_dsn);
        $this->set_pdo_username($pdo_username);
        $this->set_pdo_password($pdo_password);
    }

    private $debug_mode = true;
    private $pdo_dsn = '';
    private $pdo_username = '';
    private $pdo_password = '';
    private $query_table_names = array();
    private $query_column_names = array();
    private $query_text = '';
    private $query_switcher = '';
    private $query_parameters = array();
    private $query_conditions = array();
    private $query_connections = array();
    private $query_join_filters = '';
    private $query_group_by = array();
    private $query_order_by = array();
    private $query_limit = array();
    private $query_value_type = null;
    private $pdo_stmt = null;
    private $pdo = null;
    private $pdo_error_code = null;
    private $pdo_error_info = null;
    private $last_inserted_id = null;

    function get_debug_mode()
    {
        return $this->debug_mode;
    }

    function get_pdo_dsn()
    {
        return $this->pdo_dsn;
    }

    function get_pdo_username()
    {
        return $this->pdo_username;
    }

    function get_pdo_password()
    {
        return $this->pdo_password;
    }

    function set_debug_mode($debug_mode)
    {
        $this->debug_mode = $debug_mode;
    }

    function set_pdo_dsn($pdo_dsn)
    {
        $this->pdo_dsn = $pdo_dsn;
    }

    function set_pdo_username($pdo_username)
    {
        $this->pdo_username = $pdo_username;
    }

    function set_pdo_password($pdo_password)
    {
        $this->pdo_password = $pdo_password;
    }

    function get_query_table_names()
    {
        return $this->query_table_names;
    }

    function set_query_table_names($query_table_names)
    {
        $this->query_table_names = $query_table_names;
    }

    function get_query_text()
    {
        return $this->query_text;
    }

    function get_query_switcher()
    {
        return $this->query_switcher;
    }

    function get_query_switched()
    {
        $res = '';
        switch ($this->query_switcher) {
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

    function get_query_conditions()
    {
        return $this->query_conditions;
    }

    function get_query_group_by()
    {
        return $this->query_group_by;
    }

    function get_query_order_by()
    {
        return $this->query_order_by;
    }

    function get_query_limit()
    {
        return $this->query_limit;
    }

    function set_query_text($query_text)
    {
        $this->query_text = $query_text;
    }

    function add_query_text($query_text)
    {
        $this->query_text .= $query_text;
    }

    function add_query_text_imploded($start_query, $array, $implode_char = ', ', $if_array_count_zero_echo = '')
    {
        $this->query_text .= $this->get_query_imploded($start_query, $array, $implode_char, $if_array_count_zero_echo);
    }

    function add_query_text_imploded_2($start_query, $array, $if_array_count_zero_echo = '')
    {
        $this->query_text .= $this->get_query_imploded_2($start_query, $array, $if_array_count_zero_echo);
    }

    function get_last_inserted_id()
    {
        return $this->last_inserted_id;
    }

    function set_last_inserted_id($last_inserted_id)
    {
        $this->last_inserted_id = $last_inserted_id;
    }

    /**
     *
     * @param type $query_switcher: SelectAll = sa,
     * Select = s,
     * Insert = i,
     * Update = u,
     * Delete = d;
     */
    function set_query_switcher($query_switcher)
    {
        $this->query_switcher = $query_switcher;
    }

    function set_query_conditions($query_conditions)
    {
        $this->query_conditions = $query_conditions;
    }

    function add_query_conditions($group_start, $column_name, $condition, $value, $group_end, $type, $connection)
    {
        $this->query_conditions[] = array($group_start, $column_name, $condition, $value, $group_end, $type, $connection);
    }

    function set_query_group_by($query_group_by)
    {
        $this->query_group_by = $query_group_by;
    }

    function set_query_order_by($query_order_by)
    {
        $this->query_order_by = $query_order_by;
    }

    function set_query_limit($query_limit)
    {
        $this->query_limit = $query_limit;
    }

    function get_pdo_stmt()
    {
        return $this->pdo_stmt;
    }

    function set_pdo_stmt($pdo_stmt)
    {
        $this->pdo_stmt = $pdo_stmt;
    }

    function get_query_column_names()
    {
        return $this->query_column_names;
    }

    function get_query_parameters()
    {
        return $this->query_parameters;
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
    
    
    function set_query_column_names($query_column_names)
    {
        $this->query_column_names = $query_column_names;
    }

    function set_query_parameters($query_parameters)
    {
        $this->query_parameters = $query_parameters;
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

    function get_query_value_type()
    {
        return $this->query_value_type;
    }

    function set_query_value_type($query_value_type)
    {
        $this->query_value_type = $query_value_type;
    }

    function get_pdo_error_code()
    {
        return $this->pdo_error_code;
    }

    function set_pdo_error_code($pdo_error_code)
    {
        $this->pdo_error_code = $pdo_error_code;
    }

    function get_pdo_error_info()
    {
        return $this->pdo_error_info;
    }

    function set_pdo_error_info($pdo_error_info)
    {
        $this->pdo_error_info = $pdo_error_info;
    }

    function get_pdo()
    {
        return $this->pdo;
    }

    function set_pdo($pdo)
    {
        $this->pdo = $pdo;
    }

    function get_query_join_filters()
    {
        return $this->query_join_filters;
    }

    function set_query_join_filters($query_join_filters)
    {
        $this->query_join_filters = $query_join_filters;
    }

    function get_query_connections()
    {
        return $this->query_connections;
    }

    function set_query_connections($query_connections)
    {
        $this->query_connections = $query_connections;
    }
}
