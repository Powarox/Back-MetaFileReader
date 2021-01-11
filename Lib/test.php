<?php

namespace Lib;

require_once('Metadata.php');

// Files
$img = 'Files/img1.png';
$file = 'Files/file1.pdf';

$lib = new Metadata($file);


// Test Local




// Test Methodes Lib
$res = $lib->getMeta($file);
$lib->saveMetaJsonFile("Out","testFile", $res);


// Resultats
var_dump($res);
