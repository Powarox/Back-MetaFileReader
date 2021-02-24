<?php

namespace TestApp;

require_once('Loader/Autoload.php');
require './vendor/autoload.php';

spl_autoload_register('TestApp\Loader\Autoload::monAutoload');

$onlineLib = new \Metadata\Metadata();


use TestApp\App\Control;
use TestApp\Lib\Metadata;

$lib = new Lib\Metadata();

$control = new App\Control($lib);
$control->execute();
