<?php

namespace TestApp\App;

class View {
    public function __construct(){
        $this->title = "Test Librairie PHP ...name...";
        $this->content = "content a definir";
    }

    public function makeHomePage(){
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
        $this->POSTredirect('index.php?');
    }

    public function displayUploadSucces(){
        $this->POSTredirect('index.php?action=affichageResult');
    }

    public function affichage($array, $nameImg){
        $this->content = '<a href="index.php">Retour Upload</a>';

        $this->content .= '
        <section class="previewInfo">
            <h2>Metada of file</h2>
            <section class="container1">';

        if (file_exists('App/Files/'.$nameImg)) {
            $this->content .= '<img src="App/Files/'.$nameImg.'" alt="Image doc pdf : '.$nameImg.'">';
        }
        else {
            $this->content .= '<img src="App/Img/default_pdf_image.jpg" alt="Une image">';
        }

        // $data = json_encode($array);
        // echo "<script> function(); </script>";
        // var data = JSON.parse(json);

        $this->content .= '
                <section class="cont1">
                    <div class="box elem1">
                        <h2>Exif</h2>
                    </div>
                    <div class="box elem2">
                        <h2>Location</h2>
                    </div>
                    <div class="box elem3">
                        <h2>File</h2>
                    </div>
                </section>
            </section>
            <section class="container2">
                <div class="box">
                    <h2>XMP</h2>
                </div>
                <div class="box">
                    <h2>Other</h2>
                </div>
                <div class="box">
                    <h2>Author</h2>
                </div>
            </section>
        </section>';

        $this->content .= '
            <section class="previewAction">
                <form class="modifyForm" action="index.html" method="post">
                    <label for="modifyInput">Choisir la métadonnées à modifier :
                        <button id="addElem" type="button" name="button">Ajouter</button>
                    </label>
                </form>
            </section>';
    }

    public function render(){
        include('Template.php');
    }

    public function POSTredirect($url){
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }
}
