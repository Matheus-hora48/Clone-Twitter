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
  public function guardarFoto(){
		$query = "insert into arquivo(id_usuario, tweet)values(:id_usuario, :arquivo)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
		$stmt->bindValue(':tweet', $this->__get('arquivo'));
		$stmt->execute();
	}
	
}

?>