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
            else if(method_exists($this, $action)){
                $this->$action();
            }
            else {
                $this->defaultAction();
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
        $this->cleanFolder();

        // Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Upload vide
            if($_FILES['files']['error'] != 0){
                $this->view->displayUploadFailure();
            }

            $file = $_FILES['files'];
            $filename = $file['name'];
            $fileType = $file['type'];
            $tabExt = explode('.', $filename);
            $tabType = explode('/', $fileType);

            move_uploaded_file($file["tmp_name"], "App/Files/".$filename);

            if($tabType[0] == 'application'){
                exec('convert  App/Files/'.$filename.'[0]  App/Files/'.$tabExt[0].'.jpg');
            }

            $dir = 'App/Files/';
            $this->traitementOnUpload($dir, $filename, $tabExt[0]);

            $this->view->displayUploadSucces();
        }
        else {
            $this->view->displayUploadFailure();
        }
    }

    public function affichageResult(){
        $files = $this->getUploadDocuments();
        $folder = 'App/Files/';

        $filePathImg = $files['image'];
        $filePathJson = $folder.$files['text'];

        $meta = $this->lib->openMetaOnJsonFile($filePathJson);
        asort($meta);

        $this->view->affichage($meta, $filePathImg);
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
        $result = $this->getTypeFiles($files);
        return $result;
    }

    public function getTypeFiles($array){
        $result = [];
        foreach($array as $elem){
            $tab = mime_content_type('App/Files/'.$elem);
            $res = explode('/', $tab);
            $result[$res[0]] = $elem;
        }
        return $result;
    }

    public function cleanFolder(){
        $files = $this->getUploadDocuments();
        foreach($files as $f){
            unlink(__DIR__.'//Files/'.$f);
        }
    }
}
