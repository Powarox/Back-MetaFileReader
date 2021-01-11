<?php

namespace Lib;

class Metadata {
    protected $file;

// Constructor
    public function __construct($file){
        $this->file = $file;
    }

// Return toutes les méta d'un fichier // Extraction Métadonnée
    public function getMeta($file){
        $data = shell_exec("exiftool -json ".$file);
        $metaData = json_decode($data, true);
        return $metaData;
    }

// Return les différent type de méta d'un fichier
    public function getMetadataType($file){
        return $typeMeta;
    }

// Return toutes les méta d'un certain type
    public function getMetaOfType($file, $type){
        return $meta;
    }

// Add meta dans un fichier // Créer un fichier contenant les métadata
    public function setMeta($file, $meta){
        $data = json_encode($meta);
        $metaTxt = fopen('Out/'.$file.'.json', 'w');
        fputs($metaTxt, $data);
        fclose($metaTxt);
    }

// Sort meta par type
    public function sortMeta($meta){
        return $sortedMeta;
    }

// Modifie les méta d'un fichier
    public function setMetaModify(){

    }

// Save meta dans un fichier json
    public function saveMetaJsonFile($folder, $name, $meta){

    }

// Put meta dans un fichier json
    public function putMetaJsonFile($file, $meta){

    }

// Suppre les meta en doublons
    public function suppressMetaDouble($meta){
        return $metaClean;
    }

}
