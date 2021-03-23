<?php

namespace TestApp\App;

class View {
    public function __construct(){
        $this->title = 'Test Librairie PHP ...name...';
        $this->content = '';
    }

// ################ Home Page ################ //
    public function makeHomePage($feedback){
        $this->feedback = $feedback;
        $this->title = 'Home page : Upload your document';
        $this->content = '
        <section class="upload">
            <form id="dropFileForm" action="index.php?action=upload" method="post" onsubmit="uploadFiles(event)" enctype="multipart/form-data">
                <div id="dropFileDiv"
                ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
                      addFiles(event);">
                    <label for="fileInput" id="fileLabel">
                        <i class="fas fa-upload"></i>
                        <span id="fileLabelText">
                          Choose a file
                        </span>
                        <span id="uploadStatus"></span>
                        <i class="fas fa-upload"></i>
                    </label>
                    <input type="file" name="files" id="fileInput" onchange="addFiles(event)">
                </div>
                <progress id="progressBar"></progress>
                <input id="uploadButton" type="submit" value="Upload">
            </form>
        </section>';
    }

    public function displayUploadFailure(){
        $this->POSTredirect('index.php?', '<p class="feedback">L\'upload à échoué :(</p>');
    }

    public function displayUploadSucces(){
        $this->POSTredirect('index.php?action=affichageResult#fileLabelText', '<p class="feedback">Upload réussi !</p>');
    }

    public function displayUploadNecessary(){
        $this->POSTredirect('index.php?', '<p class="feedback">Vous devez upload un document avant cette action</p>');
    }



// ################ Affichage Métadonnées ################ //
    public function makeAffichagePage($data, $nameImg, $feedback){
        $this->feedback = $feedback;
        $this->title = 'Affichage page : Métadonnées';
        $this->content .= '<section class="previewInfo">';
            $this->content .= '<nav class="sectionMenu">';
                foreach($data as $key => $value){
                    $this->content .= '<a href="#'.$key.'_box">'.$key.'</a>';
                }
            $this->content .= '</nav>';
        $this->content .= '</section>';

        $this->content .= '<section class="previewMeta">';
            $this->content .= '<div class="card" id="image">';
                $this->content .= '<h2>Preview image</h2>';
                $this->content .= '<div class="img">';
                    if (file_exists('App/Files/'.$nameImg)) {
                        $this->content .= '<img src="App/Files/'.$nameImg.'" alt="Image doc pdf : '.$nameImg.'">';
                    }
                    else {
                        $this->content .= '<img src="App/Img/default_pdf_image.jpg" alt="Une image">';
                    }
                $this->content .= '</div>';
            $this->content .= '</div>';

            foreach($data as $key => $value){
                $this->content .= '<div class="card" id="'.$key.'_box">';
                    $this->content .= '<h2>'.$key.'</h2>';

                    $this->content .= '<ul>';
                        if(is_array($value)){
                            $index = 0;
                            foreach($value as $k => $v){
                                if($index % 2 == 0){
                                    $this->content .= '<li id="elemP">';
                                }
                                else {
                                    $this->content .= '<li id="elemI">';
                                }
                                $this->content .= '<p><strong>'.$k.'</strong></p>';
                                if(is_array($v)){
                                    $this->content .= '<p>| ';
                                    foreach ($v as $newValue) {
                                        $this->content .= $newValue.' | ';
                                    }
                                    $this->content .= '</p>';
                                }
                                else {
                                    $this->content .= '<p>'.$v.'</p>';
                                }
                                $this->content .= '</li>';
                                $index++;
                            }
                        }
                        else {
                            $this->content .= '<li id="elemP">';
                            $this->content .= '<p><strong>'.$key.'</strong></p>';
                            $this->content .= '<p>'.$value.'</p>';
                            $this->content .= '</li>';
                        }

                    $this->content .= '</ul>';
                $this->content .= '</div>';
            }
        $this->content .= '</section>';
        $this->content .= '<a id="modifyButton" href="index.php?action=askModification">Modifier les métadonnées</a>';
    }



// ################ Modification Page ################ //
    public function makeActionPage($data, $feedback){
        $this->feedback = $feedback;
        $this->title = 'Modification page : Modifier les métadonnées';
        $this->content .= '<section class="previewInfo">';
            $this->content .= '<nav class="sectionMenu">';
                foreach($data as $key => $value){
                    $this->content .= '<a href="#'.$key.'_box">'.$key.'</a>';
                }
            $this->content .= '</nav>';
        $this->content .= '</section>';

        $this->content .= '<section class="previewActionMeta">';
            $this->content .= '<form id="modifyForm" action="index.php?action=modification" method="post">';
            foreach($data as $key => $value){
                $this->content .= '<div class="card" id="'.$key.'_box">';
                    $this->content .= '<h2>'.$key.'</h2>';
                    $this->content .= '<ul>';
                        if(is_array($value)){
                            $index = 0;
                            foreach($value as $k => $v){
                                if($index % 2 == 0){
                                    $this->content .= '<li id="elemP">';
                                }
                                else {
                                    $this->content .= '<li id="elemI">';
                                }
                                $this->content .= '<p><strong>'.$k.'</strong></p>';
                                if(is_array($v)){
                                    $this->content .= '<input type="text" name="'.$key.'['.$k.']" value="';
                                    foreach ($v as $newValue) {
                                        $this->content .= $newValue.' | ';
                                    }
                                    $this->content .= '">';
                                }
                                else {
                                    $this->content .= '<input type="text" name="'.$key.'['.$k.']" value="'.$v.'">';
                                }
                                $this->content .= '</li>';
                                $index++;
                            }
                        }
                        else {
                            $this->content .= '<li id="elemP">';
                            $this->content .= '<p><strong>'.$key.'</strong></p>';
                            $this->content .= '<input type="text" name="'.$key.'[]" value="'.$value.'">';
                            $this->content .= '</li>';
                        }

                    $this->content .= '</ul>';
                $this->content .= '</div>';
            }
            $this->content .= '</form>';
            $this->content .= '<input id="modifyButton" type="submit" form="modifyForm" value="Modifier">';
        $this->content .= '</section>';
    }

    public function displayModificationSucces(){
        $this->POSTredirect('index.php?action=downloadFile', '<p class="feedback">Modifications prises en comptes !</p>');
    }

    public function displayModificationFailed(){
        $this->POSTredirect('index.php?action=askModification', '<p class="feedback">La modification à échoué :(</p>');
    }



// ################ Download Page ################ //
    public function makeDownloadPage($feedback){
        $this->feedback = $feedback;
        $this->title = 'Download page : Télécharger votre document';
        $this->content .= '<section class="download">';
            $this->content .= '<h2>Souhaitez-vous télécharger votre document ?</h2>';

            $this->content .= '<div>';
                $this->content .= '<h3>Document initial : </h3>';
                $this->content .= '<a id="downloadButton" href="index.php?action=downloadFileInitial">Download File</a>';
            $this->content .= '</div>';

            $this->content .= '<div>';
                $this->content .= '<h3>Document modifier : </h3>';
                $this->content .= '<a id="downloadButton" href="index.php?action=downloadFileUpdate">Download File</a>';
            $this->content .= '</div>';

            $this->content .= '<div>';
                $this->content .= '<h3>Télécharger une archive : </h3>';
                $this->content .= '<a id="downloadButton" href="index.php?action=downloadArchive">Download Files</a>';
            $this->content .= '</div>';
        $this->content .= '</section>';
    }

    public function displayDownloadFailed(){
        $this->POSTredirect('index.php?action=downloadFile', '<p class="feedback">Le téléchargement à échoué :(</p>');
    }



// ################ About Project ################ //
    public function makeAboutPage(){
        $this->feedback = '';
        $this->title = 'About page : Description du projet';
        $this->content .= 'Readme + explication';
    }



// ################ Utilitaire ################ //
    public function render(){
        include('Template.php');
    }

    public function POSTredirect($url, $feedback){
        $_SESSION['feedback'] = $feedback;
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }
}
