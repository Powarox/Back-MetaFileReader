<?php

namespace TestApp\App;

class View {
    public function __construct(){
        $this->title = 'Test Librairie PHP ...name...';
        $this->content = '';
    }

    public function makeHomePage(){
        $this->content = '';
    }

    public function displayUploadFailure(){
        $this->POSTredirect('index.php?');
    }

    public function displayUploadSucces(){
        $this->POSTredirect('index.php?action=affichageResult#fileLabelText');
    }

    public function makeAffichagePage($data, $nameImg){
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


        // $this->content .= '
        //     <section class="previewAction">
        //         <form class="modifyForm" action="index.html" method="post">
        //             <label for="modifyInput">Choisir la métadonnées à modifier :
        //                 <button id="addElem" type="button" name="button">Ajouter</button>
        //             </label>
        //         </form>
        //     </section>';
    }

    public function makeActionPage($data){
        $this->content .= '<section class="previewInfo">';
            $this->content .= '<nav class="sectionMenu">';
                foreach($data as $key => $value){
                    $this->content .= '<a href="#'.$key.'_box">'.$key.'</a>';
                }
            $this->content .= '</nav>';
        $this->content .= '</section>';



        $this->content .= '<section class="previewMeta">';
            $this->content .= '<form id="modificationForm" action="index.php?action=modification" method="post">';
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
            $this->content .= '<input id="modifButton" type="submit" value="Modifier">';
            $this->content .= '<form>';
        $this->content .= '</section>';
    }

    public function render(){
        include('Template.php');
    }

    public function POSTredirect($url){
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }
}





// $this->content .= '
//         <section class="cont1">
//             <div class="box elem1">
//                 <h2>Exif</h2>
//             </div>
//             <div class="box elem2">
//                 <h2>Location</h2>
//             </div>
//             <div class="box elem3">
//                 <h2>File</h2>
//             </div>
//         </section>
//     </section>
//     <section class="container2">
//         <div class="box">
//             <h2>XMP</h2>
//         </div>
//         <div class="box">
//             <h2>Other</h2>
//         </div>
//         <div class="box">
//             <h2>Author</h2>
//         </div>
//     </section>
// </section>';
