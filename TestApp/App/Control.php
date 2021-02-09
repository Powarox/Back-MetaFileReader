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

    public function testApp(){
        // TestApp

        // var_dump("action a def");

        $this->view->makeHomePage();
    }
}
