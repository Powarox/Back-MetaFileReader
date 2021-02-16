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

            // Appel de la Librairie Metadata
            $this->traitementOnUpload();

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
        $extension = $tabExt[1];
        $name = $tabExt[0];

        // Enregistre le pdf
        move_uploaded_file($file["tmp_name"], "App/Files/Upload/File/".$filename);

        // Créer une image du pdf et save dans Upload/Images
        exec('convert  App/Files/Upload/File/'.$filename.'[0]  App/Files/Upload/Img/'.$name.'.jpg');
    }

// --- Utilisation de la Librairie php ---
    public function traitementOnUpload(){

    }

    public function actionOnFile(){

    }
}
