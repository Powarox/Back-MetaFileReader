<?php

require_once('View.php');

namespace TestApp\App;

class Control {
    public function __construct(){
        $this->view = new View();
    }

    public function execute(){
        $this->testApp($view);
        $this->view->render();
    }

    public function testApp(){
        $this->view->makeTestPage();
    }
}
