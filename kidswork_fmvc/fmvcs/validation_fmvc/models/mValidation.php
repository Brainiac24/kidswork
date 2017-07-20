<?php
namespace Kidswork;

class mValidation extends mModels
{
    public $fValidation;

    public function __construct($cKidswork)
    {
        parent::__construct($cKidswork);
        $this->fValidation->set(new fValidation());
        //$cKidswork->Import($this->fValidation);


    }

    public function Var_Init($validation)
    {
        $this->fValidation->set(new fValidation());
        foreach ($validation as $key => $value) {
            $this->fValidation->get()->var_name->set($key);
            foreach ($value as $key2 => $value2) {
                $this->fValidation->get()->rules->add($key2, $value2);
            }
        }
        return $this->fValidation;
    }

    protected function Validate($fVariable, $sel_ins_upd_del)
    {
        $this->fValidation = $fVariable->fValidation;
        $this->fValidation->get()->var_name->set(trim($this->fValidation->get()->var_name->get()));
        $this->Receive_Variables_From_Client();
        $err = array();

        if ($this->fValidation->get()->rules->ext($sel_ins_upd_del) === null) {
            $arr = explode("|", $this->fValidation->get()->rules->ext(0));
        }
        else {
            $arr = explode("|", $this->fValidation->get()->rules->ext($sel_ins_upd_del)) + explode("|", $this->fValidation->get()->rules->ext(0));
        }

        foreach ($arr as $key => $val) {
            switch ($val) {
                case "required" :
                    $this->Required();
                    break;
                case "int" :
                    $this->Integer();
                    break;
                case "str" :
                    break;
                case "foto" :
                    $this->Foto();
                    break;
                case "numeric" :
                    $this->Numeric();
                    break;
                case "float" :
                    $this->Float();
                    break;
                case "date" :
                    $this->Valid_Date();
                    break;
                case "selected" :
                    $this->Selected();
                    break;
                case "bool" :
                    $this->Bool();
                    break;
                default :
                    break;
            }
        }

        $fVariable->fValidation = $this->fValidation;
        $fVariable->set($this->fValidation->get()->value->get());
        
        return $fVariable;
    }

    protected function Receive_Variables_From_Client()
    {
        $res = '';
        $name = $this->fValidation->get()->var_name->get();
        $mode = $this->fValidation->get()->mode->get();
        switch ($mode) {
            case 'request' :
                $res = filter_input(INPUT_GET, trim($name), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if ($res == null) {
                    $res = filter_input(INPUT_POST, trim($name), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                }
                break;
            case 'post' :
                $res = filter_input(INPUT_POST, trim($name), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'get' :
                $res = filter_input(INPUT_GET, trim($name), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'file' :
                $res = filter_var_array($_FILES, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            case 'arrayint' :
                $res = filter_var_array($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
            default :
                $res = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                break;
        }

        $this->fValidation->get()->value->set($res);
    }

    protected function Print_Errors_Messages($columns, $arr_message = '')
    {
        $res = '';
        $col = '';
        $msg = '';
        foreach ($this->errors->get() as $key => $value) {
            if (isset($columns[$key])) {
                $col = $columns[$key];
            }
            else {
                $col = $key;
            }
            if (isset($arr_message[$key])) {
                $msg = $arr_message[$key];
            }
            else {
                $msg = $this->fValidation->get()->message->ext($value);
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
        $value = $this->fValidation->value->get();
        if (!$this->Not_Null_Or_Empty($value)) {
            if (!is_array($value)) {
                $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не может быть пустым');
            }
            else {
                if (empty($value)) {
                    $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не может быть пустым');
                }
            }
        }
        return $this->fValidation;
    }

    private function Foto()
    {
        $file = $this->fValidation->value->get();
        $file_dimensions = getimagesize($file['tmp_name']);
        if ($file_dimensions['mime'] == "image/jpeg" || $file_dimensions['mime'] == "image/jpg" || $file_dimensions['mime'] == "image/png" || $file_dimensions['mime'] == "image/gif" || $file_dimensions['mime'] == "image/x-ms-bmp" || $file_dimensions['mime'] == "image/wbmp") {
        }
        else {
            $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Загружаемый файл не распознан как фотография');
        }
        return $this->fValidation;
    }

    private function Numeric()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->value->get())) {
            $this->fValidation->set_value(str_replace(',', '.', trim($this->fValidation->value->get())));
            if (is_numeric($this->fValidation->value->get()) == false) {
                $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не является числовым параметром');
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
        if ($this->Not_Null_Or_Empty($this->fValidation->value->get())) {
            if (count($this->Numeric($this->fValidation)->errors->get()) == 0) {
                if (is_integer(intval(trim($this->fValidation->value->get()))) == false) {
                    $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не является целым числовым параметром');
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
        if ($this->Not_Null_Or_Empty($this->fValidation->value->get())) {
            if (count($this->Numeric($this->fValidation)->errors->get()) == 0) {
                if (is_float(floatval(str_replace(',', '.', trim($this->fValidation->value->get())))) == false) {
                    $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не является дробьным числовым параметром');
                }
            }
        }
        return $this->fValidation;
    }

    private function Selected()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->value->get())) {
            if (trim($this->fValidation->value->get()) == 'Новый' || trim($this->fValidation->value->get()) == 'Выберите значение' || trim($this->fValidation->value->get()) == -1 || trim($this->fValidation->value->get()) == '-1') {
                $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не выбрано');
            }
        }
        return $this->fValidation;
    }

    private function Valid_Date()
    {
        $stamp = strtotime(mDatabase::Convert_Date_To_Mysql(trim($this->fValidation->value->get())));
        if (!is_numeric($stamp)) {
            $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не является датой');
        }
        else {
            $day = date('d', $stamp);
            $month = date('m', $stamp);
            $year = date('Y', $stamp);
            if (!checkdate($month, $day, $year)) {
                $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не является датой');
            }
        }
        return $this->fValidation;
    }

    private function Bool()
    {
        if ($this->Not_Null_Or_Empty($this->fValidation->value->get())) {
            $this->fValidation->set_value(str_replace(',', '.', trim($this->fValidation->value->get())));
            if ($this->fValidation->value->get() == false) {
                $this->fValidation->errors->add($this->fValidation->var_name->get(), 'Значение поля не отмечено');
            }
        }
        return $this->fValidation;
    }
}
