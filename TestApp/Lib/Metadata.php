<?php

namespace TestApp\Lib;

class Metadata {

// Constructor
    public function __construct(){

    }


// Return toutes les méta d'un fichier // Extraction Métadonnée
    public function getMeta($file){
        $data = shell_exec("exiftool -json ".$file);
        $metaData = json_decode($data, true);
        return $metaData[0];
    }


// Return les différent type de méta d'un fichier
    public function getMetadataType($meta){
        $typeMeta = array_keys($meta);
        return $typeMeta;
    }


// Return toutes les méta d'un certain type
    public function getMetaOfType($meta, $type){
        $metaTypeOf = [];
        foreach($meta as $key => $value){
            if($key === $type){
                echo 'je suis dedans';
            }
        }
        return $meta;
    }


// Return toutes les méta trié par type
    public function getMetaSortType(){
        // Warning need moyen de classer les types
        $arrayMetaType = array(
            'type1' => array('file' => 'test', 'source' => 'test'),
            'type2' => array('XMP' => 'test', 'XMPLoc' => 'test'),
        );
        return $arrayMetaType;
    }


// Add meta dans un fichier
    public function setMeta($file, $meta){

    }


// Sort meta par type
    public function sortMetaByKey($meta){
        ksort($meta);
        return $meta;
    }


// Suppre les meta en doublons
    public function suppressMetaDouble($meta){
        $metaClean = [];
        foreach($meta as $key => $value){
            if(!key_exists($key, $metaClean)){
                $metaClean[$key] = $value;
            }
            else if($metaClean[$key] != $value){
                $metaClean[$key] = $value;
            }
        }
        return array_unique($meta);
    }


// Modifie les méta d'un fichier
    public function setMetaModify(){

    }


// Modifie les méta d'un fichier json
    public function modifyMetaJsonFile($foler, $name, $meta){
        $this->saveMetaJsonFile($foler, $name, $meta);
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


// Clean meta selon les normes
    public function cleanMeta($meta){

    }


// Gestion des erreurs
    public function getErr1(){
        throw new \Exception("Error ... Message", 1);
    }

    public function getErr2(){
        throw new \Exception("Error ... Message", 1);
    }

    public function getErr3(){
        throw new \Exception("Error ... Message", 1);
    }

    // try {
    //
    // } catch(e) {
    //
    // } finally {
    //
    // }
}
