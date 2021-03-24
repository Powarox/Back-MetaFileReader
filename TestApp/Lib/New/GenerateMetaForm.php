<?php

namespace Metadata\Tools;

class GenerateMetaForm {
    protected $form;

    public function __construct($form = ''){
        $this->form = $form;
    }

    public function initForm($class, $id, $action, $methode){
        $this->form = '<form class="'.$class.'" id="'.$id.'" action="'.$action.'" methode="'.$methode.'">';
    }

    public function prepareFormByType($metaByType){

    }

    public function prepareForm($meta){

    }

    public function createForm($class, $id, $action, $methode){
        $this->form = '
            <form class="'.$class.'" id="'.$id.'" action="'.$action.'" methode="'.$methode.'">

            </form>'
        ;
    }
}
