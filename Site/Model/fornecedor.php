<?php
class Fornecedor{
	private $nome;
	private $email;

	//construtor da classe
	public function __construct($nome,$email){
		$this->nome = $nome;
		$this->email = $email;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setNome($valor){
		$this->nome = $valor;
	}

	public function setEmail(){
		$this->email = $valor;
	}
}

?>