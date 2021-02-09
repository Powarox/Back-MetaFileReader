<?php

namespace TestApp\App;

class View {
    public function __construct(){
        $this->title = "Test Librairie PHP ...name...";
        $this->content = "content a definir";
    }

    public function makeHomePage(){
        $this->content = "";
    }

    public function displayUploadFailure(){
        $this->POSTredirect('index.php?');
    }

    public function displayUploadSucces(){
        var_dump('succes');
    }

    public function render(){
        include('Template.php');
    }

    public function POSTredirect($url){
        header("Location: ".htmlspecialchars_decode($url), true, 303);
        die;
    }
}
