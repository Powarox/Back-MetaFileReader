<?php

// require_once('View.php');

namespace TestApp\App;

class Control {
    public function __construct(){
        $this->view = new View();
    }

    public function execute(){
        $this->testApp($this->view);
        $this->view->render();
    }

    // Home page
    public function testApp(){
        $this->view->makeHomePage();
    }

    // Upload
    public function uplaod(){

    }

    // Use Lib to work
    public function actionOnFile(){
        
    }
}
