<?php
namespace Kidswork\Backend;

use \Kidswork\mModels;

class mHtml
{
    public $fHtml;
    public $cKidswork;
    public $vHtml;

    public function __construct($cKidswork)
    {
        $this->cKidswork = $cKidswork;
        $this->fHtml = new fHtml();
        $this->vHtml = new vHtml();
        //$cKidswork->Import($this->fHtml);
    }
}