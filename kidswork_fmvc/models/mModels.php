<?php
namespace Kidswork;

class mModels
{
    protected $cKidswork;
    protected $ctrls;

    protected function __construct($cKidswork)
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }
        $this->cKidswork = $cKidswork;
    }

    function Init($fConfig)
    {
        $this->ctrls->set($this->cKidswork->ctrls->get());
        $cRouter = $this->ctrls->ext("cRouter");
        return $cRouter->fRouter->get()->ajax->get() === null ? $this->Init_Full() : $this->Init_Ajax();
    }

    public function Request_Variables($fConfig, $sel_ins_upd_del)
    {
        $cValidation = $this->cKidswork->ctrls->ext("cValidation");
       
            foreach ($fConfig->get() as $key => $value) {
                if (isset($value->fValidation)) {
                    $value = $cValidation->Request($value, $sel_ins_upd_del);
                }
            }
        return $fConfig;
    }
}
