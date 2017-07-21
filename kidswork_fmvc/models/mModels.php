<?php
namespace Kidswork;

class mModels
{
    protected $cKidswork;
    protected $ctrls;
    protected $fConfig;
    public $cRouter;
    public $ini = 0;

    protected function __construct($cKidswork)
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }
        $this->cKidswork = $cKidswork;

        if ($this->cKidswork != null) {
            $this->ctrls = $this->cKidswork->Import($this->fConfig);
            
        }
        
    }

    function Init($fConfig)
    {
        
        /*
        if ($this->ini->get()==1) {
            \var_dump($fConfig);
        }
        */
        $this->Request_Variables();
        $controllers_arr = $this->ctrls->get();
        if (\is_array($controllers_arr)) {
            foreach ($controllers_arr as $controller) {
                $controller->Init($fConfig);
            }
        }

        $this->ctrls->set($this->cKidswork->ctrls_global->get());
        $this->cRouter = $this->ctrls->ext("cRouter");
        return $this->cRouter->fRouter->get()->ajax->get() === null ? $this->Init_Full() : $this->Init_Ajax();
    }

    public function Request_Variables()
    {
        //\var_dump($this->cKidswork);
        $cValidation = $this->cKidswork->ctrls_global->ext("cValidation");
        foreach ($this->fConfig->get() as $key => $value) {
            if (isset($value->fValidation)) {
                $value = $cValidation->Request($value, 0);
                //\var_dump($value);
            }
        }
    }
}
