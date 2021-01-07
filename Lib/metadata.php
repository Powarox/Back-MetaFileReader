<?php

namespace Robin\Lib;

class metadata {
    protected $file;

    // Constructor
    public function __construct($file){
        $this->file = $file;
    }

// Return toutes les méta d'un fichier
    public function getMeta($file){
        return $meta;
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
