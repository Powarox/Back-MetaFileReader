<?php

namespace TestApp\App;

class Control {
    protected $lib;
    protected $feedback;

    public function __construct($lib){
        $this->view = new View();
        $this->lib = $lib;

        $feedback = key_exists('feedback', $_SESSION) ? $_SESSION['feedback'] : '';
        $this->feedback = $feedback;
        $_SESSION['feedback'] = '';
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

// ################ Default Action ################ //
    public function defaultAction(){
        $this->view->makeHomePage($this->feedback);
    }



// ################ Upload ################ //
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

            $_SESSION['upload'] = 'fileUpload';
            $_SESSION['filename'] = $filename;

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

    public function traitementOnUpload($dir, $filename, $name){
        $filePath = $dir . $filename;
        $meta = $this->lib->getMetaByType($filePath);
        $this->lib->saveMetaJsonFile($dir, $name, $meta);
    }



// ################ Affichage ################ //
    public function affichageResult(){
        if(empty($_SESSION['upload'])){
            $this->view->displayUploadNecessary();
        }

        $files = $this->getUploadDocuments();
        $folder = 'App/Files/';

        $filePathImg = $files['image'];
        $filePathJson = $folder.$files['text'];

        $meta = $this->lib->openMetaOnJsonFile($filePathJson);
        asort($meta);

        $this->view->makeAffichagePage($meta, $filePathImg, $this->feedback);
    }



// ################ Modification ################ //
    public function askModification(){
        if(empty($_SESSION['upload'])){
            $this->view->displayUploadNecessary();
        }

        $files = $this->getUploadDocuments();
        $folder = 'App/Files/';

        $filePathJson = $folder.$files['text'];

        $meta = $this->lib->openMetaOnJsonFile($filePathJson);
        asort($meta);

        $this->view->makeActionPage($meta, $this->feedback);
    }

    public function modification(){
        try {
            $newData = $_POST;
            $this->lib->saveMetaJsonFile('App/Out/', 'newJsonData', $newData);
            $this->view->displayModificationSucces();
        }
        catch (Exception $e) {
            $this->view->displayModificationFailed();
        }
    }



// ################ Download File ################ //
    public function downloadFile(){
        $this->view->makeDownloadPage($this->feedback);
    }

    public function downloadFileInitial(){
        if(key_exists('filename', $_SESSION)){
            $name = $_SESSION['filename'];
        }

        $file = 'App/Files/'.$name;

        if(file_exists($file)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            $this->view->makeDownloadPage($this->feedback);
        }
        else{
            $this->view->displayDownloadFailed();
        }
    }

    public function downloadFileUpdate(){
        $this->view->makeDownloadPage($this->feedback);
    }

    public function downloadArchive(){
        $this->view->makeDownloadPage($this->feedback);
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
