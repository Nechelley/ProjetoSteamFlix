<?php
class Filme extends Produto{
	private $sinopse;
	private $duracao;
	private $codigoJogoRelacionado;


	//construtor da classe
	public function __construct($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$dataEntradaSistema,$idiomaAudio,$idiomaLegenda,$imagens,$fornecedorNome,$adiministradorEmail,$sinopse,$duracao,$codigoJogoRelacionado){
		parent::__construct($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$dataEntradaSistema,$idiomaAudio,$idiomaLegenda,$imagens,$fornecedorNome,$adiministradorEmail);
		$this->sinopse = $sinopse;
		$this->duracao = $duracao;
		$this->codigoJogoRelacionado = $codigoJogoRelacionado;
	}

	public function getSinopse(){
		return $this->sinopse;
	}

	public function getDuracao(){
		return $this->duracao;
	}

	public function getCodigoJogoRelacionado(){
		return $this->codigoJogoRelacionado;
	}
}

?>