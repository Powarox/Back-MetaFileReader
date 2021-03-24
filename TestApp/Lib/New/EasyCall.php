<?php

namespace Metadata\Fun;

class EasyCall {
    protected $form;

    public function __construct(){

    }

// ########## ------------- Extract | Save | Download ------------- ########## //
    // Extract meta from file
    // Save meta in jsonfile
    public function extractAndSaveMeta(){
        getMeta($filePath);
        saveMetaJsonFile($folder, $name, $meta);
    }

    // Extract meta from file
    // Save meta in jsonfile
    // Download meta jsonFile
    public function extractSaveAndDownloadMeta(){
        getMeta($filePath);
        saveMetaJsonFile($folder, $name, $meta);
        downloadFile($filePath);
    }

    // Extract meta by type from file
    // Save meta in jsonfile
    public function extractByTypeAndSaveMeta(){
        getMetaByType($filePath);
        saveMetaJsonFile($folder, $name, $meta);
    }

    // Extract meta by type from file
    // Save meta in jsonfile
    // Download meta jsonFile
    public function extractByTypeSaveAndDownloadMeta(){
        getMetaByType($filePath);
        saveMetaJsonFile($folder, $name, $meta);
        downloadFile($filePath);
    }



// ########## ------------- Import | Save | Download ------------- ########## //
    // Transforme arrayByType
    // Save in jsonFile
    // Modify orignal doc with newMeta
    public function transformSaveAndImportMeta(){
        transformMetaArray($newData);
        saveMetaJsonFile('App/Out/', 'newJsonData', $metaTransform);
        importNewMetaFromJsonFile();
    }

    // Transforme arrayByType
    // Save in jsonFile
    // Modify orignal doc with newMeta
    // Download meta jsonFile
    public function transformSaveImportAndDownloadMeta(){
        transformMetaArray($newData);
        saveMetaJsonFile('App/Out/', 'newJsonData', $metaTransform);
        importNewMetaFromJsonFile();
    }

    // Save meta in jsonFile
    // Modify origianl doc with newMeta
    public function saveAndImportMeta(){
        saveMetaJsonFile('App/Out/', 'newJsonData', $metaTransform);
        importNewMetaFromJsonFile();
    }

    // Save meta in jsonFile
    // Modify origianl doc with newMeta
    // Download meta jsonFile
    public function saveImportAndDownloadMeta(){
        saveMetaJsonFile('App/Out/', 'newJsonData', $metaTransform);
        importNewMetaFromJsonFile();
    }


// ########## ------------- Open | Import | Download ------------- ########## //


}
