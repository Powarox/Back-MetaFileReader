<?php

namespace TestApp\App;

class Control {
    protected $lib;

    public function __construct($lib){
        $this->view = new View();
        $this->lib = $lib;
    }

    public function execute(){
        if(key_exists('action', $_GET)  && $_GET['action'] != null){
            $action = $_GET['action'];
            if(method_exists($this->view, $action)){
                $this->view->$action();
            }
            else {
                $this->$action();
            }
        }
        else {
            $this->defaultAction();
        }
        $this->view->render();
    }

    // Home page
    public function defaultAction(){
        $this->cleanFolder();
        $this->view->makeHomePage();
    }

    // Upload : récup files
    public function upload(){
        // Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Upload vide
            if($_FILES['files']['error'] != 0){
                $this->view->displayUploadFailure();
            }

            $file = $_FILES['files'];
            $filename = $file['name'];
            $tabExt = explode('.', $filename);
            $extension = $tabExt[1];
            $name = $tabExt[0];

            // Enregistre le pdf & créer une image
            move_uploaded_file($file["tmp_name"], "App/Files/".$filename);
            exec('convert  App/Files/'.$filename.'[0]  App/Files/'.$name.'.jpg');


            $dir = 'App/Files/';
            $this->traitementOnUpload($dir, $filename, $name);


            $this->view->displayUploadSucces();
        }
        else {
            $this->view->displayUploadFailure();
        }
    }

    public function affichageResult(){
        $files = $this->getUploadDocuments();
        $folder = 'App/Files/';

        $filePath = $folder.$files[2];
        $filePathImg = $folder.$files[0];
        $filePathJson = $folder.$files[1];

        $meta = $this->lib->openMetaOnJsonFile($filePathJson);
        asort($meta);

        $this->view->affichage($meta, $files[0]);
    }

// --- Utilisation de la Librairie php ---
    public function traitementOnUpload($dir, $filename, $name){
        $filePath = $dir . $filename;

        // Extraction des métadonnées
        $meta = $this->lib->getMetaByType($filePath);

        // Sauvegarde des metadonnées dans fichier Json
        $this->lib->saveMetaJsonFile($dir, $name, $meta);
    }

    public function actionOnFile(){

    }

// ################ Utilitaire ################ //
    public function getUploadDocuments(){
        $files = scandir(__DIR__ .'/Files');
        if (!empty($files)) {
            $elemAutre = array_shift($files);
            $elemAutre = array_shift($files);
        }
        return $files;
    }

    // public function getFile($files, $type){
    //     foreach($files as $f){
    //         $array = explode('.', $f);
    //         if($array[1] == $type){
    //             return $f;
    //         }
    //     }
    // }
    //
    // public function findPreviewPdf($files){
    //     foreach($files as $f){
    //         $array = explode('.', $f);
    //         if($array[0] == 'previewPdf'){
    //             return true;
    //         }
    //         else{
    //             return false;
    //         }
    //     }
    // }
    //
    // // Upload File pdf or img
    // if($this->findPreviewPdf($files)){
    //     $filePath = 'App/Files/'.$files[1];
    //     $filePathImg = 'App/Files/'.$files[2];
    //     $filePathJson = 'App/Files/'.$files[0];
    // }
    // else{
    //     $filePath = 'App/Files/'.$files[0];
    //     $filePathImg = $filePath;
    //     $filePathJson = 'App/Files/'.$files[1];
    // }


    public function cleanFolder(){
        $files = $this->getUploadDocuments();
        foreach($files as $f){
            unlink(__DIR__.'//Files/'.$f);
        }
    }
}
