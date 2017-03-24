<?php
class JogoDAO{
	public function cadastrar($jogo,$link){
		$aux = '(';
		for($i = 0;$i < count($jogo->getSistemasOperacionais()-1;$i++){
			$aux .= '$jogo->getSistemasOperacionais()[$i],'
		}
		$aux .= '$jogo->getSistemasOperacionais()[count($jogo->getSistemasOperacionais()-1]);';

 		$query = "call INSERIR_JOGO(
 			$jogo->getCodigo(),$jogo->getQtdVendida(),
 			$jogo->getNotaUsuario(), $jogo->getClassificacaoEtaria(),
 			$jogo->getPrecoCusto(),$jogo->getPrecoVenda(),
 			'$jogo->getGenero()','$jogo->getNome()',
 			'$jogo->getDataLancamento()','$jogo->getIdiomaAudio()',
 			'$jogo->getIdiomaLegenda()','$jogo->getDescricao()',
 			$jogo->getQtdJogadores(),$aux,
 			'$jogo->getRequisitoMinimos()','$jogo->getRequisitosRecomendados()',
 			'$jogo->getFornecedorNome()','$jogo->getAdministradorEmail()'
 			);"; 
		echo($query);
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar bem sucedido';
	}

	public function consultar($jogo,$link){			
		$query = "SELECT * FROM JOGO WHERE CodigoJogo = $jogo->getCodigo();"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}					
		echo "<br/>Consulta bem sucedida!";
		return $result;
	}

	public function alterar($jogo,$link){
		$aux = '(';
		for($i = 0;$i < count($jogo->getSistemasOperacionais()-1;$i++){
			$aux .= '$jogo->getSistemasOperacionais()[$i],'
		}
		$aux .= '$jogo->getSistemasOperacionais()[count($jogo->getSistemasOperacionais()-1]);';

		$query = "CALL ATT_JOGO(
 			$jogo->getCodigo(),$jogo->getQtdVendida(),
 			$jogo->getNotaUsuario(), $jogo->getClassificacaoEtaria(),
 			$jogo->getPrecoCusto(),$jogo->getPrecoVenda(),
 			'$jogo->getGenero()','$jogo->getNome()',
 			'$jogo->getDataLancamento()','$jogo->getIdiomaAudio()',
 			'$jogo->getIdiomaLegenda()','$jogo->getDescricao()',
 			$jogo->getQtdJogadores(),$aux,
 			'$jogo->getRequisitoMinimos()','$jogo->getRequisitosRecomendados()',
 			'$jogo->getFornecedorNome()','$jogo->getAdministradorEmail()'
 			);"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível alterar: ".mysqli_error($link));
		}					
		echo "<br/>Alteração bem sucedida!";
	}

	public function deletar($jogo,$link){			
		$query = "DELETE JOGO 
			WHERE CodigoJogo = $jogo->getCodigo();"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}					
		echo "<br/>Exclusão bem sucedida!";
	}

}

?>