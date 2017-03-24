<?php
include_once("pessoa.php");
class Usuario extends Pessoa{
	private $stilPoints;

	//construtor da classe
	public function __construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$stilPoints){
		parent::__construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento);
		$this->stilPoints = $stilPoints;
	}

	public function getStilPoints(){
		return $this->stilPoints;
	}

	public function setStilPoints($valor){
		$this->stilPoints = $valor;
	}
}

?>