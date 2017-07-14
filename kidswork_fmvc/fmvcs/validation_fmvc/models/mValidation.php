<?php
namespace Kidswork;

class mValidation
{
    public $fValidation;

    public function __construct($cKidswork)
    {
        $this->fValidation = new fValidation();
        //$cKidswork->Import($this->fValidation);
    }

    protected function Validate($var_name, $conditions, $mode = '')
    {   $this->fValidation = new fValidation();
        $this->fValidation->set_variable(trim($var_name));
        $this->fValidation->set_value($this->Variable_Mode_Switcher($var_name, $mode));
        $this->fValidation->set_conditions(explode("|", $conditions));
        foreach ($this->fValidation->get_conditions() as $key => $val) {
            switch ($val) {
                case "required":
                    $this->fValidation = $this->Required();
                    break;
                case "int":
                    $this->fValidation = $this->Integer();
                    break;
                case "str":
                    break;
                case "foto":
                    $this->fValidation = $this->Foto();
                    break;
                case "numeric":
                    $this->fValidation = $this->Numeric();
                    break;
                case "float":
                    $this->fValidation = $this->Float();
                    break;
                case "date":
                    $this->fValidation = $this->Valid_Date();
                    break;
                case "selected":
                    $this->fValidation = $this->Selected();
                    break;
                case "bool":
                    $this->fValidation = $this->Bool();
                    break;
                default:
                    break;
            }
        }
        return $this->fValidation;
    }

    protected function Variable_Mode_Switcher($variable, $mode)
    {
        $res = '';
        switch ($mode) {
            case 'request':
                $res = filter_input(INPUT_GET, trim($variable), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ($res == null) {
                    $res = filter_input(INPUT_POST, trim($variable), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }
                break;
            case 'post':
                $res = filter_input(INPUT_POST, trim($variable), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'get':
                $res = filter_input(INPUT_GET, trim($variable), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'file':
                $res = filter_var_array($_FILES, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'arrayint':
                $res = filter_var_array($variable, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            default:
                $res = filter_var($variable, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
        }

        return $res;
    }

    protected function Print_Errors_Messages($columns, $arr_message = '')
    {
        $res = '';
        $col = '';
        $msg = '';
        foreach ($this->get_errors() as $key => $value) {
            if (isset($columns[$key])) {
                $col = $columns[$key];
            } else {
                $col = $key;
            }
            if (isset($arr_message[$key])) {
                $msg = $arr_message[$key];
            } else {
                $msg = $this->get_message($value);
            }
            $res .= 'Ошибка в поле: "' . $col . '" - ' . $msg . '<br>';
        }
        return $res;
    }

    private function Not_Null_Or_Empty($value)
    {
        $res = false;
        if ($value != null && trim($value) != '') {
            $res = true;
        }
        return $res;
    }

    private function Required()
    {
        $value = $this->fValidation->get_value();
        if (!$this->Not_Null_Or_Empty($value)) {
            if (!is_array($value)) {
                $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не может быть пустым');
            } else {
                if (empty($value)) {
                    $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не может быть пустым');
                }
            }
        }
        return $this->fValidation;
    }

    private function Foto()
    {
        $file = $this->fValidation->get_value();
        $file_dimensions = getimagesize($file['tmp_name']);
        if ($file_dimensions['mime'] == "image/jpeg" || $file_dimensions['mime'] == "image/jpg" || $file_dimensions['mime'] == "image/png" || $file_dimensions['mime'] == "image/gif" || $file_dimensions['mime'] == "image/x-ms-bmp" || $file_dimensions['mime'] == "image/wbmp") {
        } else {
            $this->fValidation->add_errors($this->fValidation->get_variable(), 'Загружаемый файл не распознан как фотография');
        }
        return $this->fValidation;
    }

    private function Numeric()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->get_value())) {
            $this->fValidation->set_value(str_replace(',', '.', trim($this->fValidation->get_value())));
            if (is_numeric($this->fValidation->get_value()) == false) {
                $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не является числовым параметром');
            }
        }
        return $this->fValidation;
    }

    /**
     * @param $str макс длина не должна превышать 9симв.(999999999)
     * @return mixed
     */
    private function Integer()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->get_value())) {
            if (count($this->Numeric($this->fValidation)->get_errors()) == 0) {
                if (is_integer(intval(trim($this->fValidation->get_value()))) == false) {
                    $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не является целым числовым параметром');
                }
            }
        }
        return $this->fValidation;
    }

    /**
     * @param $str разделитель "."
     * @return bool
     */
    private function Float()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->get_value())) {
            if (count($this->Numeric($this->fValidation)->get_errors()) == 0) {
                if (is_float(floatval(str_replace(',', '.', trim($this->fValidation->get_value())))) == false) {
                    $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не является дробьным числовым параметром');
                }
            }
        }
        return $this->fValidation;
    }

    private function Selected()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->get_value())) {
            if (trim($this->fValidation->get_value()) == 'Новый' || trim($this->fValidation->get_value()) == 'Выберите значение' || trim($this->fValidation->get_value()) == -1 || trim($this->fValidation->get_value()) == '-1') {
                $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не выбрано');
            }
        }
        return $this->fValidation;
    }

    private function Valid_Date()
    {
        $stamp = strtotime(mDatabase::Convert_Date_To_Mysql(trim($this->fValidation->get_value())));
        if (!is_numeric($stamp)) {
            $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не является датой');
        } else {
            $day = date('d', $stamp);
            $month = date('m', $stamp);
            $year = date('Y', $stamp);
            if (!checkdate($month, $day, $year)) {
                $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не является датой');
            }
        }
        return $this->fValidation;
    }

    private function Bool()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->get_value())) {
            $this->fValidation->set_value(str_replace(',', '.', trim($this->fValidation->get_value())));
            if ($this->fValidation->get_value() == false) {
                $this->fValidation->add_errors($this->fValidation->get_variable(), 'Значение поля не отмечено');
            }
        }
        return $this->fValidation;
    }
}
