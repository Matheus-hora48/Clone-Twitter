<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

  public function timeline(){

    session_start();

    $this->validaAutenticacao();

    //Recuperação do tweets
    $tweet = Container::getModel('Tweet');

    $tweet->__set('id_usuario', $_SESSION['id']);

    $tweets = $tweet->getAll();

    $this->view->tweets = $tweets;

    $this->render('timeline');
    

    
    
  }

  public function tweet(){

    session_start();

    $this->validaAutenticacao();

    $tweet = Container::getModel('tweet');

    $tweet->__set('tweet', $_POST['tweet']);
    $tweet->__set('id_usuario', $_SESSION['id']);

    $tweet->salvar();

    header('location: /timeline');
      

  }

  public function validaAutenticacao(){

    session_start();

    if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '' ){
      header('location: /?login=erro');
    } 
  }

  public function quemSeguir(){
    
    $this->validaAutenticacao();

    $pesquisarPor = isset($_GET['pesquisarPor']) ? ($_GET['pesquisarPor']) : '';

    $usuarios = array();

    if($pesquisarPor != ''){
      $usuario = Container::getModel('Usuario');
      $usuario->__set('nome', $pesquisarPor);
      $usuario->__set('id', $_SESSION['id']);
      $usuarios = $usuario->getAll();
      

    }
    
    $this->view->usuarios = $usuarios;

    $this->render('quemSeguir');
    
  }
}
