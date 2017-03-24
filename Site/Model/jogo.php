<?php
include("produto.php");
class Jogo extends Produto{
	private $descricao;
	private $qtdJogadores;
	private $sistemasOperacionais;
	private $requisitosMinimos;
	private $requisitosRecomendados;
	private $fornecedorNome;
	private $administradorEmail;


	//construtor da classe
	public function __construct($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$dataEntradaSistema,$idiomaAudio,$idiomaLegenda,$imagens,$fornecedorNome,$administradorEmail,$descricao,$qtdJogadores,$sistemasOperacionais,$requisitosMinimos,$requisitosRecomendados,$fornecedorNome,$administradorEmail){
		parent::__construct($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$dataEntradaSistema,$idiomaAudio,$idiomaLegenda,$imagens,$fornecedorNome,$administradorEmail);
		$this->descricao = $descricao;
		$this->qtdJogadores = $qtdJogadores;
		$this->sistemasOperacionais = $sistemasOperacionais;
		$this->requisitosMinimos = $requisitosMinimos;
		$this->requisitosRecomendados = $requisitosRecomendados;
		$this->fornecedorNome = $fornecedorNome;
		$this->administradorEmail = $administradorEmail;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function getQtdJogadores(){
		return $this->qtdJogadores;
	}

	public function getSistemasOperacionais(){
		return $this->sistemasOperacionais;
	}

	public function getRequisitosMinimos(){
		return $this->requisitosMinimos;
	}

	public function getRequisitosRecomendados(){
		return $this->requisitosRecomendados;
	}

	public function getFornecedorNome(){
		return $this->fornecedorNome;
	}

	public function getAdmininistradorEmail(){
		return $this->administradorEmail;
	}

	//sets

	public function setDescricao($valor){
		$this->descricao = $valor;
	}

	public function getQtdJogadores($valor){
		$this->qtdJogadores = $valor;
	}

	public function setSistemasOperacionais($valor){
		$this->sistemasOperacionais = $valor;
	}

	public function setRequisitosMinimos($valor){
		$this->requisitosMinimos = $valor;
	}

	public function setRequisitosRecomendados($valor){
		$this->requisitosRecomendados = $valor;
	}

	public function setFornecedorNome($valor){
		$this->fornecedorNome = $valor;
	}

	public function setAdmininistradorEmail($valor){
		$this->administradorEmail = $valor;
	}
}

?>