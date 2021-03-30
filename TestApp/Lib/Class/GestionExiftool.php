<?php

namespace TestApp\Lib\Class;

class GestionExiftool {

    public function exiftoolExist(){
        $extentions = get_loaded_extensions();
        var_dump($extentions);
        return true;
    }

    public function pathExitftoolOnServer(){
        $exifPath = '';
        return $exifPath;
    }

    public function installExiftool(){
        return true;
    }



}

// Verifier si exiftool est installé sur le serveur
// si oui alors l'utiliser et trouver son path
// sinon l'intégrer depuis notre lib / ou use online

// Trouver moyen de configurer systeme pour que la lib use soit
    // version fournis dans la lib
    // version dispo sur serv


// https://github.com/exiftool/exiftool

// Composer.json
    // {
    //     ...
    //     "repositories": [
    //         ...
    //         {
    //             "type": "package",
    //             "package": {
    //                 "name": "philharvey/exiftool",
    //                 "version": "10.75",
    //                 "dist": {
    //                     "url": "https://sno.phy.queensu.ca/~phil/exiftool/Image-ExifTool-10.75.tar.gz",
    //                     "type": "tar"
    //                 }
    //             }
    //         }
    //     ],
    //     "require": {
    //         ...
    //         "philharvey/exiftool": "10.*"
    //     }
    // }
