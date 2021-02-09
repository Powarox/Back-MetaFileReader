<?php

namespace TestApp;

require_once('Loader/Autoload.php');

spl_autoload_register('TestApp\Loader\Autoload::monAutoload');

use TestApp\App\Control;
use TestApp\Lib\Metadata;

$control = new App\Control();
$control->execute();
