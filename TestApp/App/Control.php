<?php

namespace TestApp\App;

class Control {
    public function __construct(){
        $this->view = new View();
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
        $this->view->makeHomePage();
    }

    // Upload : récup files
    public function upload(){
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Upload vide
            if ($_FILES['files']['error'] != 0) {
                $this->view->displayUploadFailure();
            }

            // Traitement du fichier
            $this->traitementFile($_FILES['files']);

            $this->view->displayUploadSucces();
        }
        else {
            $this->view->displayUploadFailure();
        }
    }

    public function affichage(){
        $this->view->affichage();
    }

    // Rendu
    public function traitementFile($file){
        $filename = $file['name'];
        $tabExt = explode('.', $filename);
        $extension = $ext[1];
        $name = $tabExt[0];

        // Enregistre le pdf
        move_uploaded_file($file["tmp_name"], "App/Files/Upload/File/".$filename);

// -- Warning Img and file not save -- //

        // Créer une image du pdf et save dans Upload/Images
        exec('convert  App/Files/Upload/File/'.$filename.'[0]  App/Files/Upload/Img/'.$name.'.jpg');
    }

    // Use Lib to work
    public function actionOnFile(){

    }
}
