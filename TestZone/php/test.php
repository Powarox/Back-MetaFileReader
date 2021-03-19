<?php




// $data = shell_exec("exiftool -g -json all-document1.pdf");
// $dataJson = json_decode($data, true);
// var_dump($dataJson[0]);
//
// $dataJson[0]['XMP']['Title'] = 'I\'m here nigger';
// var_dump($dataJson);
//
// $dataT = json_encode($dataJson);
// $metaTxt = fopen('test.json', 'w');
// fputs($metaTxt, $dataT);
// fclose($metaTxt);


shell_exec("exiftool -json = test.json");

$data2 = shell_exec("exiftool -g -json all-document1.pdf");
$dataJson2 = json_decode($data2, true);
var_dump($dataJson2[0]);
