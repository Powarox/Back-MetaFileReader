<?php

namespace TestApp\App;

class View {
    public function __construct(){
        $this->title = "Test App Page";
        $this->content = "";
    }

    public function makeTestPage(){
        $this->content = "";
    }

    public function render(){
        include('Template.php');
    }
}
