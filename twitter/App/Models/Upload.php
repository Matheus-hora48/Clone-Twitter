<?php

namespace App\Models;

use MF\Model\Model;

class Upload extends Model {

  private $id;
	private $id_usuario;
	private $arquivo;
	private $data;

  public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}

  //salvar foto
  
}

?>