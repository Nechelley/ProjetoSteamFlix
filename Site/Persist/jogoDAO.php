<?php
class JogoDAO{
	public function cadastrar($jogo,$link){
		$aux = "(";
		if(($jogo->getSistemasOperacionais()[0] && $jogo->getSistemasOperacionais()[1]) && $jogo->getSistemasOperacionais()[2]){//wlm
			$aux .= "'Windows','Linux','MacOS'";
		}else if($jogo->getSistemasOperacionais()[0] && $jogo->getSistemasOperacionais()[1]){//wl
			$aux .= "'Windows','Linux'";
		}else if($jogo->getSistemasOperacionais()[1] && $jogo->getSistemasOperacionais()[2]){//lm
			$aux .= "'Linux','MacOS'";
		}else if($jogo->getSistemasOperacionais()[0] && $jogo->getSistemasOperacionais()[2]){//wm
			$aux .= "'Windows','MacOS'";
		}else if($jogo->getSistemasOperacionais()[0]){//w
			$aux .= "'Windows'";
		}else if($jogo->getSistemasOperacionais()[1]){//l
			$aux .= "'Linux'";
		}else if($jogo->getSistemasOperacionais()[2]){//m
			$aux .= "'MacOS'";
		}
		$aux .= ")";

		$query = "CALL INSERIR_JOGO(
 			".$jogo->getCodigo().",".$jogo->getQtdVendida().",
 			".$jogo->getNotaUsuario().", ".$jogo->getClassificacaoEtaria().",
 			".$jogo->getPrecoCusto().",".$jogo->getPrecoVenda().",
 			'".$jogo->getGenero()."','".$jogo->getNome()."',
 			".$jogo->getDataLancamento().",'".$jogo->getIdiomaAudio()."',
 			'".$jogo->getIdiomaLegenda()."','".$jogo->getDescricao()."',
 			".$jogo->getQtdJogadores().",".$aux.",
 			'".$jogo->getRequisitosMinimos()."','".$jogo->getRequisitosRecomendados()."',
 			'".$jogo->getFornecedorNome()."','".$jogo->getAdministradorEmail()."'
 			);"; 
		echo($query);
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar jogo bem sucedido';

		$aux = "INSERT INTO Imagens_Jogo VALUES ";
		for($i = 0;$i < count($jogo->getImagens())-1;$i++){
			$aux .= "('".$jogo->getImagens()[$i]."',".$jogo->getCodigo()."),";
		}
		$aux .= "('".$jogo->getImagens()[count($jogo->getImagens())-1]."',".$jogo->getCodigo().");";
		echo($query);
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar: ' . mysqli_error($link));
		}
		echo 'Salvar jogo bem sucedido2';
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
		for($i = 0;$i < count($jogo->getSistemasOperacionais())-1;$i++){
			$aux .= '$jogo->getSistemasOperacionais()[$i],';
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