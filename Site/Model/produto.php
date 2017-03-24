<?php
class Produto{
	private $codigo;
	private $qtdVendida;
	private $notaUsuario;
	private $classificacaoEtaria;
	private $precoCusto;
	private $precoVenda;
	private $genero;
	private $nome;
	private $dataLancamento;
	private $dataEntradaSistema;
	private $idiomaAudio;
	private $idiomaLegenda;
	private $imagens;
	private $fornecedorNome;
	private $adiministradorEmail;

	//construtor da classe
	public function __construct($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$dataEntradaSistema,$idiomaAudio,$idiomaLegenda,$imagens,$fornecedorNome,$adiministradorEmail){
		$this->codigo = $codigo;
		$this->qtdVendida = $qtdVendida;
		$this->notaUsuario = $notaUsuario;
		$this->classificacaoEtaria = $classificacaoEtaria;
		$this->precoCusto = $precoCusto;
		$this->precoVenda = $precoVenda;
		$this->genero = $genero;
		$this->nome = $nome;
		$this->dataLancamento = $dataLancamento;
		$this->dataEntradaSistema = $dataEntradaSistema;
		$this->idiomaAudio = $idiomaAudio;
		$this->idiomaLegenda = $idiomaLegenda;
		$this->imagens = $imagens;
		$this->fornecedorNome = $fornecedorNome;
		$this->adiministradorEmail = $adiministradorEmail;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function getQtdVendida(){
		return $this->qtdVendida;
	}

	public function getNotaUsuario(){
		return $this->notaUsuario;
	}

	public function getClassificaoEtaria(){
		return $this->classificacaoEtaria;
	}

	public function getPrecoCusto(){
		return $this->precoCusto;
	}

	public function getPrecoVenda(){
		return $this->precoVenda;
	}

	public function getGenero(){
		return $this->genero;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getDataLancamento(){
		return $this->dataLancamento;
	}

	public function getDataEntradaSistema(){
		return $this->dataEntradaSistema;
	}

	public function getIdiomaAudio(){
		return $this->idiomaAudio;
	}

	public function getIdiomaLegenda(){
		return $this->idiomaLegenda;
	}

	public function getImagens(){
		return $this->imagens;
	}

	public function getFornecedorNome(){
		return $this->fornecedorNome;
	}

	public function getAdministradorEmail(){
		return $this->adiministradorEmail;
	}

	//sets

	public function setCodigo($valor){
		$this->codigo = $valor;
	}

	public function setQtdVendida($valor){
		$this->qtdVendida = $valor;

	public function setNotaUsuario($valor){
		$this->notaUsuario = $valor;
	}

	public function setClassificaoEtaria($valor){
		$this->classificacaoEtaria = $valor;
	}

	public function setPrecoCusto($valor){
		$this->precoCusto = $valor;
	}

	public function setPrecoVenda($valor){
		$this->precoVenda = $valor;
	}

	public function setGenero($valor){
		$this->genero = $valor;
	}

	public function setNome($valor){
		$this->nome = $valor;
	}

	public function setDataLancamento($valor){
		$this->dataLancamento = $valor;
	}

	public function setDataEntradaSistema($valor){
		$this->dataEntradaSistema = $valor;
	}

	public function setIdiomaAudio($valor){
		$this->idiomaAudio = $valor;
	}

	public function setIdiomaLegenda($valor){
		$this->idiomaLegenda = $valor;
	}

	public function setImagens($valor){
		$this->imagens = $valor;
	}

	public function setFornecedorNome($valor){
		$this->fornecedorNome = $valor;
	}

	public function setAdministradorEmail($valor){
		$this->adiministradorEmail = $valor;
	}
}

?>