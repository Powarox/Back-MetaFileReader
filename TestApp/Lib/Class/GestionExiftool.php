<?php

namespace TestApp\Lib\Class;

class GestionExiftool {

    public function exiftoolExist(){
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
