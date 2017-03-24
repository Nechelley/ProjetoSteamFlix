<?php
class Pessoa{
	private $email;
	private $pNome;
	private $uNome;
	private $fotoPerfil;
	private $senha;
	private $dataNascimento;
	private $dataEntradaSistema;

	//construtor da classe
	public function __construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,){
		$this->email = $email;
		$this->pNome = $pNome;
		$this->uNome = $uNome;
		$this->fotoPerfil = $fotoPerfil;
		$this->senha = $senha;
		$this->dataNascimento = $dataNascimento;
		$this->dataEntradaSistema = 'Nada...';
	}

	public function getEmail(){
		return $this->email;
	}

	public function getPNome(){
		return $this->pNome;
	}

	public function getUNome(){
		return $this->uNome;
	}

	public function getFotoPerfil(){
		return $this->fotoPerfil;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function getDataNascimento(){
		return $this->dataNascimento;
	}

	public function getDataEntradaSistema(){
		return $this->dataEntradaSistema;
	}

	public function setEmail($valor){
		$this->email = $valor;
	}

	public function setPNome($valor){
		$this->pNome = $valor;
	}

	public function setUNome($valor){
		$this->uNome = $valor;
	}

	public function setFotoPerfil($valor){
		$this->fotoPerfil = $valor;
	}

	public function setSenha($valor){
		$this->senha = $valor;
	}

	public function setDataNascimento($valor){
		$this->dataNascimento = $valor;
	}

	public function setDataEntradaSistema($valor){
		$this->dataEntradaSistema = $valor;
	}
}

?>