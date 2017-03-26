<?php
class JogoDAO{
	public function cadastrar($jogo,$link){
		//ajustando o sistema de SO
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

		//inserindo o jogo
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

		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar1: ' . mysqli_error($link));
		}

		//inserindo as imagens do jogo
		$aux = "INSERT INTO Imagens_Jogo VALUES ";
		for($i = 0;$i < count($jogo->getImagens())-1;$i++){
			$aux .= "('".$jogo->getImagens()[$i]."',".$jogo->getCodigo()."),";
		}
		$aux .= "('".$jogo->getImagens()[count($jogo->getImagens())-1]."',".$jogo->getCodigo().");";
		if(!mysqli_query($link, $aux)) {
			die('Não foi possível salvar2: ' . mysqli_error($link));
		}
	}

	public function consultar($codigo,$link){			
		$query = "SELECT * FROM JOGO inner join imagens_jogo ON CodigoJogo = JOGO_CodigoJogo WHERE CodigoJogo = ".$codigo.";"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultar: ".mysqli_error($link));
		}
		return $result;
	}

	public function alterar($jogo,$link){
		//ajustando o sistema de SO
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

		//inserindo o jogo
		$query = "CALL ATT_JOGO(
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
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvar1: ' . mysqli_error($link));
		}


		$query = "delete from Imagens_jogo where ".$jogo->getCodigo().";";
		if(!mysqli_query($link, $query)) {
			die('Não foi possível ex1: ' . mysqli_error($link));
		}

		//alterando as imagens do jogo
		$aux = "INSERT INTO Imagens_Jogo VALUES ";
		for($i = 0;$i < count($jogo->getImagens())-1;$i++){
			$aux .= "('".$jogo->getImagens()[$i]."',".$jogo->getCodigo()."),";
		}
		$aux .= "('".$jogo->getImagens()[count($jogo->getImagens())-1]."',".$jogo->getCodigo().");";
		if(!mysqli_query($link, $aux)) {
			die('Não foi possível salvar2: ' . mysqli_error($link));
		}
	}

	public function deletar($codigo,$link){	
		$query = "DELETE from Imagens_Jogo 
			WHERE JOGO_CodigoJogo = ".$codigo.";"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}

		$query = "DELETE from JOGO 
			WHERE CodigoJogo = ".$codigo.";"; 
		if (!mysqli_query($link,$query)) {
		    die("Não foi possível deletar: ".mysqli_error($link));
		}
	}

}

?>