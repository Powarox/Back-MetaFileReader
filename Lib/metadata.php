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

// Add meta dans un fichier
    public function setMeta($file, $meta){

    }

// Sort meta par type
    public function sortMeta($meta){
        return $sortedMeta;
    }

// Modifie les méta d'un fichier
    public function setMetaModify(){

    }

// Save meta dans un fichier json // Créer un fichier contenant les métadata
    public function saveMetaJsonFile($folder, $name, $meta){
        $data = json_encode($meta);
        $metaTxt = fopen($folder.'/'.$name.'.json', 'w');
        fputs($metaTxt, $data);
        fclose($metaTxt);
    }

// Put meta dans un fichier json
    public function putMetaJsonFile($file, $meta){

    }

// Suppre les meta en doublons
    public function suppressMetaDouble($meta){
        return $metaClean;
    }


// Gestion des erreurs
    public function getErr1(){
        throw new \Exception("Error ... Message", 1);
    }

}
