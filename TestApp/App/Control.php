<?php

namespace TestApp\App;

class Control {
    public function __construct(){
        $this->view = new View();
    }

    public function execute(){
        if(key_exists('action', $_GET)  && $_GET['action'] != null){
            $action = $_GET['action'];
            $this->$action();
        }
        else {
            $this->testApp();
        }

        $this->view->render();
    }

    // Home page
    public function testApp(){
        $this->view->makeHomePage();
    }

    // Upload : récup files
    public function upload(){
        // traintement file upload

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Upload vide
            if ($_FILES['files']['error'] != 0) {
                $this->view->displayUploadFailure();
            }

            foreach ($_FILES as $file) {
                $filename = $file['name'];
                $_SESSION[$filename] = $file;

                // Enregistre le pdf dans Upload/Documents
                move_uploaded_file($file["tmp_name"], "DevoirApp/Model/Upload/Documents/".$filename);

                // Enleve l'extension fichier .pdf
                $name = $this->getFileWithoutExtention($filename);

                // Créer une image du pdf et save dans Upload/Images
                exec('convert  DevoirApp/Model/Upload/Documents/'.$filename.'[0]  DevoirApp/Model/Upload/FirstPages/'.$name.'.jpg');

                // Metadata Lib
            }
            $this->view->displayUploadSucces();
        }
        else {
            $this->view->displayUploadFailure();
        }
    }

    public function uploadAjaxSucces(){
        $this->view->displayUploadSucces();
    }

    public function affichage(){
        $this->view->affichage();
    }

    // Rendu
    public function traitement(){

    }

    // Use Lib to work
    public function actionOnFile(){

    }
}
