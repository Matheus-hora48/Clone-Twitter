<?php

namespace App\Controllers;


use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

  public function authUpload() {
     
    if(isset($_POST['acao'])){
      $arquivo = $_FILES['file'];

      $arquivo = explode('.',$arquivo['name']);

      if($arquivo[sizeof($arquivo)-1] != 'png'){
        die('Você não pode fazer upload deste tipo de arquivo');

      } else {
        echo 'Upload foi feito com sucesso!';
      }
    }
  }
}

?>