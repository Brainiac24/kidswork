<?php

namespace Kidswork;

require_once __DIR__."/mAutoloader.php";
require_once __DIR__."/fConfigs.php";
new fConfigs();
echo (new cKidswork())->Init();
