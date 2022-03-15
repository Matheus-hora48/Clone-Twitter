<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

  public function timeline(){

    if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
      
    }

    session_start();
    
  }
}

?>