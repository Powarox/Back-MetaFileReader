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

    public function render(){
        include('Template.php');
    }
}
