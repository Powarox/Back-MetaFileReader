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


// $this->content .= '<form id="modifyForm" action="index.php?action=modification" method="post">';
// foreach($data as $key => $value){
//     $this->content .= '<div class="card" id="'.$key.'_box">';
//         $this->content .= '<h2>'.$key.'</h2>';
//         $this->content .= '<ul>';
//             if(is_array($value)){
//                 $index = 0;
//                 foreach($value as $k => $v){
//                     if($index % 2 == 0){
//                         $this->content .= '<li id="elemP">';
//                     }
//                     else {
//                         $this->content .= '<li id="elemI">';
//                     }
//                     $this->content .= '<p><strong>'.$k.'</strong></p>';
//                     if(is_array($v)){
//                         $this->content .= '<div>';
//                         foreach ($v as $newValue) {
//                             $this->content .= '<input type="text" name="'.$key.'['.$k.'][]" value="'.$newValue.'">';
//                         }
//                         $this->content .= '</div>';
//                     }
//                     else {
//                         if(strlen($v) > 30){
//                             $this->content .= '<textarea name="'.$key.'['.$k.']" rows="8">'.$v.'</textarea>';
//                         }
//                         else {
//                             $this->content .= '<input type="text" name="'.$key.'['.$k.']" value="'.$v.'">';
//                         }
//
//                     }
//                     $this->content .= '</li>';
//                     $index++;
//                 }
//             }
//             else {
//                 $this->content .= '<li id="elemP">';
//                 $this->content .= '<p><strong>'.$key.'</strong></p>';
//                 $this->content .= '<input type="text" name="'.$key.'" value="'.$value.'">';
//                 $this->content .= '</li>';
//             }
//
//         $this->content .= '</ul>';
//     $this->content .= '</div>';
// }
// $this->content .= '</form>';
// $this->content .= '<input id="modifyButton" type="submit" form="modifyForm" value="Modifier">';
