<?php

namespace Metadata\Fun;

class EasyCall {
    protected $form;

    public function __construct(){

    }

// ########## ------------- Extract | Save | Download ------------- ########## //
    // Extract meta from file
    // Save meta in jsonfile
    public function extractAndSaveMeta($filePath, $folder, $name){
        $meta = $this->getMeta($filePath);
        $this->saveMetaJsonFile($folder, $name, $meta);
    }

    // Extract meta from file
    // Save meta in jsonfile
    // Download meta jsonFile
    public function extractSaveAndDownloadMeta($filePath, $folder, $name){
        $meta = $this->getMeta($filePath);
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $meta);
        $this->utilitaire->downloadFile($jsonPath);
    }

    // Extract meta by type from file
    // Save meta in jsonfile
    public function extractByTypeAndSaveMeta($filePath, $folder, $name){
        $metaByType = $this->getMetaByType($filePath);
        $this->saveMetaJsonFile($folder, $name, $metaByType);
    }

    // Extract meta by type from file
    // Save meta in jsonfile
    // Download meta jsonFile
    public function extractByTypeSaveAndDownloadMeta($filePath, $folder, $name){
        $metaByType = $this->getMetaByType($filePath);
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $metaByType);
        $this->utilitaire->downloadFile($jsonPath);
    }



// ########## ------------- Import | Save | Download ------------- ########## //
    // Transforme arrayByType
    // Save in jsonFile
    // Modify orignal doc with newMeta
    public function transformSaveAndImportMeta($filePath, $folder, $name, $meta){
        $metaTransform = $this->transformMetaArray($meta);
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $metaTransform);
        $this->importNewMetaFromJsonFile($filePath, $jsonPath);
    }

    // Transforme arrayByType
    // Save in jsonFile
    // Modify orignal doc with newMeta
    // Download meta jsonFile
    public function transformSaveImportAndDownloadMeta($filePath, $folder, $name, $meta){
        $metaTransform = $this->transformMetaArray($meta);
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $metaTransform);
        $this->importNewMetaFromJsonFile($filePath, $jsonPath);
        $this->utilitaire->downloadFile($filePath)
    }

    // Save meta in jsonFile
    // Modify origianl doc with newMeta
    public function saveAndImportMeta($filePath, $folder, $name, $meta){
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $meta);
        $this->importNewMetaFromJsonFile($filePath, $jsonPath);
    }

    // Save meta in jsonFile
    // Modify origianl doc with newMeta
    // Download meta jsonFile
    public function saveImportAndDownloadMeta($filePath, $folder, $name, $meta){
        $jsonPath = $this->saveMetaJsonFile($folder, $name, $meta);
        $this->importNewMetaFromJsonFile($filePath, $jsonPath);
        $this->utilitaire->downloadFile($filePath)
    }
}
