<?php

namespace TestApp;

require './vendor/autoload.php';

$lib = new \Metadata\Metadata();



$filePath = 'TestUnit/file.pdf';
$folder = 'TestUnit/';
$name = 'jsonFile';

$meta = $lib->getMetaByType($filePath);
$lib->saveMetaJsonFile('TestUnit/', 'jsonFile', $meta);
$meta2 = $lib->getMeta($filePath);

$jsonFile = $lib->openMetaOnJsonFile('TestUnit/jsonFile.json');

$jsonFile['XMP-dc']['Creator'] = 'robin captain jack';



$lib->transformSaveAndImportMeta($filePath, $folder, $name, $meta);

$lib->transformSaveImportAndDownloadMeta($filePath, $folder, $name, $meta);

$lib->saveAndImportMeta($filePath, $folder, $name, $meta);

$lib->saveImportAndDownloadMeta($filePath, $folder, $name, $meta);

$form1 = $lib->createMetaFormByType($jsonFile, "index.php", "post");

$form2 = $lib->createForm($meta2, "index.php", "post");

var_dump($jsonFile);

echo $form1;
echo $form2;
