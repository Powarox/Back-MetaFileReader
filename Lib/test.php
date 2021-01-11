<?php

namespace Lib;

require_once('Metadata.php');

// Files
$img = 'Files/img1.png';
$file = 'Files/file1.pdf';


// Test Local


// Instance Lib
$lib = new Metadata($file);

// Test Methodes Lib
$res = $lib->getMeta($file);
$lib->setMeta("testFile", $res);


// Resultats
var_dump($res);
