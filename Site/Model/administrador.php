<?php
class Administrador extends Pessoa{
	private $salario;
	private $cpf;
	private $root;

	//construtor da classe
	public function __construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$dataEntradaSistema,$salario,$cpf,$root){
		parent::__construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$dataEntradaSistema);
		$this->salario = $salario;
		$this->cpf = $cpf;
		$this->root = $root;
	}

	public function getSalario(){
		return $this->salario;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function getRoot(){
		return $this->root;
	}

	public function setSalario($valor){
		$this->salario = $valor;
	}

	public function setCpf($valor){
		$this->cpf = $valor;
	}

	public function setRoot($valor){
		$this->root = $valor;
	}
}

?>