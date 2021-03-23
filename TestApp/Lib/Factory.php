<?php

namespace TestApp\Lib;

class Factory {
    protected $exiftool;
    protected $exception;
    protected $utilitaire;

    public function __construct(){
        $this->utilitaire = new \Class\Utilitaire();
        $this->exiftool = new \Class\GestionExiftool();
        $this->exception = new \Class\GestionException();
    }

    // ...
}
