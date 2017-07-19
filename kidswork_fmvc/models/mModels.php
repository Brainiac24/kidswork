<?php
namespace Kidswork;

class mModels
{
    protected $cKidswork;
    protected $cRouter;
    protected $ctrls;

    protected function __construct($cKidswork)
    {
        foreach ($this as $key => $value) {
            $this->$key = (new \Kidswork\fVariable($value));
        }
        $this->cKidswork->set($cKidswork);

    }

    function Init($controllers)
    {
        $this->ctrls->set($controllers->ctrls->get());
        foreach ($this->ctrls->get() as $controller) {
            foreach ($controller as $key => $value) {
                if (isset($key->fValidation)) {
                    echo "12";
                }
                
            }
            $controller->Init();
        }
        $this->cRouter = $this->ctrls->ext("cRouter");
        \var_dump($controllers->ctrls->get());
        return $this->cRouter->request->ext("ajax") === null ? $this->Init_Full() : $this->Init_Ajax();
    }
}
