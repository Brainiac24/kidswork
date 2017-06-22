<?php

namespace Kidswork;

require_once __DIR__."/kidswork_fmvc/configs/fKidswork.php";
require_once __DIR__."/kidswork_fmvc/models/mKidswork.php";
require_once __DIR__."/kidswork_fmvc/controllers/cKidswork.php";
require_once __DIR__."/kidswork_fmvc/views/vKidswork.php";

echo (new cKidswork())->Init();
