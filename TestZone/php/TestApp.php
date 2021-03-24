<?php


// -------- Exiftool.exe --------

// Extraction
echo '<h2>Meta de base</h2>';
$data = shell_exec("exiftool -g -json xmp-document2.pdf");
$meta = json_decode($data, true);
$meta = $meta[0];
var_dump($meta);



echo '<h2>Meta de base</h2>';
$data = shell_exec("bin/exiftool(-k).exe -g1 -json xmp-document2.pdf");
$meta = json_decode($data, true);
$meta = $meta[0];
var_dump($meta);

// path on server
// echo getcwd();
echo dirname(__DIR__);










// -------- Modification --------
// Extraction                                   OK
// echo '<h2>Meta de base</h2>';
// $data = shell_exec("exiftool -g -json xmp-document2.pdf");
// $meta = json_decode($data, true);
// $meta = $meta[0];
// var_dump($meta);

// throw new \Exception("Error ... Message : Ce type de fichier n'est pas pris en charge", 1);

// // Modif                                        OK
// echo '<h2>Meta modifié</h2>';
// // $meta['IPTC']['By-line'] = 'Captain tttttttttttttttttttttttttttttttttt Jack Morgan Moriniere';
// $meta['XMP']['Creator'] = 'Captain tttttttttttttttttttttttttttttttttt Jack Morgan Moriniere';
//
// $metaRandom = [];
// foreach($meta as $key => $value){
//     if(is_array($value)){
//         foreach ($value as $k => $v) {
//             $metaRandom[$k] = $v;
//         }
//     }
//     else{
//         $metaRandom[$key] = $value;
//     }
// }
// var_dump($metaRandom);
//
// // Save in json file                            OK
// $datajson = json_encode($metaRandom);
// $metaTxt = fopen('test.json', 'w');
// fputs($metaTxt, $datajson);
// fclose($metaTxt);
//
// // Import meta from json file to file upload    not OK
// shell_exec("exiftool -json=test.json doc.pdf");
//
// // Extraction
// echo '<h2>File apres sauvegarde des modification</h2>';
// $data2 = shell_exec("exiftool -json doc.pdf");
// $dataJson2 = json_decode($data2, true);
// var_dump($dataJson2[0]);



// /users/21606393/www-dev/M1/ProjetLibPhp/TestZone/TestApp.php:36:
// array (size=3)
//   'SourceFile' => string 'img2.jpg' (length=8)
//   'ExifTool' =>
//     array (size=2)
//       'ExifToolVersion' => float 10.4
//       'Error' => string 'File format error' (length=17)
//   'File' =>
//     array (size=7)
//       'FileName' => string 'img2.jpg' (length=8)
//       'Directory' => string '.' (length=1)
//       'FileSize' => string '0 bytes' (length=7)
//       'FileModifyDate' => string '2021:03:23 11:34:22+01:00' (length=25)
//       'FileAccessDate' => string '2021:03:23 11:34:22+01:00' (length=25)
//       'FileInodeChangeDate' => string '2021:03:23 11:34:22+01:00' (length=25)
//       'FilePermissions' => string 'rw-r--r--' (length=9)




// -------- Voir extension sur serveur --------
// echo '<h2>Extension Serveur</h2>';
// $extentions = get_loaded_extensions();
// var_dump($extentions);



// -------- Download --------

// $file = 'll-document1.pdf';
//
//
// function down($file){
//     if (file_exists($file)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename="'.basename($file).'"');
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Length: ' . filesize($file));
//         readfile($file);
//         echo 'ok';
//         return true;
//     }
//     return false;
// }
//
//
// var_dump(down($file));
