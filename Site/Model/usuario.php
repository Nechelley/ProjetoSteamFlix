<?php
include("pessoa.php");
class Usuario extends Pessoa{
	private $stilPoints;
	private $comunidadesSeguidas;
	private $produtos;

	//construtor da classe
	public function __construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$stilPoints,$comunidadesSeguidas,$produtos){
		parent::__construct($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento);
		$this->stilPoints = $stilPoints;
		$this->comunidadesSeguidas = $comunidadesSeguidas;
		$this->produtos = $produtos;
	}

	public function getStilPoints(){
		return $this->stilPoints;
	}

	public function getComunidadesSeguidas(){
		return $this->comunidadesSeguidas;
	}

	public function getProdutos(){
		return $this->produtos;
	}

	public function setStilPoints($valor){
		$this->stilPoints = $valor;
	}

	public function setComunidadesSeguidas($valor){
		$this->comunidadesSeguidas = $valor;
	}

	public function setProdutos($valor){
		$this->produtos = $valor;
	}

	public function seguirComunidade($comunidade){
		foreach ($comunidadesSeguidas as $c) {
			if($c->getNome() == $comunidade->getNome()){
				return FALSE;
			}
		}
		$cont = count($comunidadesSeguidas);
		$comunidadesSeguidas[$cont] = $comunidade;
		return TRUE;
	}

	public function desSeguirComunidade($nome){
		$cont = 0;
		foreach ($comunidadesSeguidas as $c) {
			if($c->getNome() == $nome){
				break;
			}
			$cont+=1;
		}

		if(count($comunidadesSeguidas) == $cont){
			return FALSE;
		}

		for($i=$cont;$i<count($comunidadesSeguidas) -1;$i++){
			$comunidadesSeguidas[$i] = $comunidadesSeguidas[$i+1]
		}

		pop($comunidadesSeguidas);
		return TRUE;
	}

	public function comprarProduto($codigo){
		$numProdutos = count($produtos);
		$produtos[$numProdutos] = $codigo;
	}

	public function requisitarSuporte($email,$mensagem){
		// Compo E-mail
	  	$arquivo = "
	  	<style type='text/css'>
	  	body {
	  		margin:0px;
	  		font-family:Verdane;
	  		font-size:12px;
	  		color: #666666;
	  	}
	  	a{
	  		color: #666666;
	  		text-decoration: none;
	  	}
	  	a:hover {
	  		color: #FF0000;
	  		text-decoration: none;
	  	}
	  	</style>
	    <html>
	        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
	            <tr>
	              <td>
	                <tr>
	                  	<td width='320'>E-mail:<b>$email</b></td>
	     			</tr>
	                <tr>
	                  	<td width='320'>Mensagem:$mensagem</td>
	                </tr>
	            </td>
	          </tr>  
	          <tr>
	            <td>Este e-mail foi enviado em <b>".date("r")."</b></td>
	          </tr>
	        </table>
	    </html>
	  ";

		// emails para quem será enviado o formulário
  		$destino = "MrNechelley@gmail.com";
  		$assunto = "Suporte";

 		// É necessário indicar que o formato do e-mail é html
  		$headers  = 'MIME-Version: 1.0' . "\r\n";
      	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      	$headers .= 'From: Site SteamFlix';
  
	  	$enviaremail = mail($destino, $assunto, $arquivo, $headers);
	  	if($enviaremail){
	  		$mgm = "E-MAIL ENVIADO COM SUCESSO! <br>";
	  		echo " <meta http-equiv='refresh' content='10;URL=<MUDAR AQUI DEPOIS>.php'>";
	  	} else {
	  		$mgm = "ERRO AO ENVIAR E-MAIL AO SUPORTE!";
	  		echo "";
	  	}
	}

	public function excluirComunidade($nome){

	}
}

?>