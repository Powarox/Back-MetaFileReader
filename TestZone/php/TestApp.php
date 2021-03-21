<?php

// -------- Download --------

$file = 'll-document1.pdf';


function down($file){
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        echo 'ok';
        return true;
    }
    return false;
}


var_dump(down($file));

// -------- Modification --------

// $data = shell_exec("exiftool -g -json img.jpg");
// $meta = json_decode($data, true);
// var_dump($meta[0]);
//
// $meta[0]['EXIF']['Model'] = 'Xiaomi Mi 10';
// var_dump($meta);
// //
// $datajson = json_encode($meta);
// $metaTxt = fopen('test.json', 'w');
// fputs($metaTxt, $datajson);
// fclose($metaTxt);


// var_dump(shell_exec("exiftool -json=test.json img.jpg"));
//
// $data2 = shell_exec("exiftool -g -json img.jpg");
// $dataJson2 = json_decode($data2, true);
// var_dump($dataJson2[0]);
