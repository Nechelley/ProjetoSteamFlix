<?php
	include_once("verificarLogado.php");
	if($nivelAcesso != 1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Model/jogo.php");
	include_once("../Persist/conexao.php");
	include_once("../Persist/jogoDAO.php");

	$codigo = $_POST["codigo"];
	$qtdVendida = 0;
	$notaUsuario = 0;
	$classificacaoEtaria = $_POST["classificacaoEtaria"];
	$precoCusto = $_POST["precoCusto"];
	$precoVenda = $_POST["precoVenda"];
	$genero = $_POST["genero"];
	$nome = $_POST["nome"];
	$dataLancamento = $_POST["dataLancamento"];
	$idiomaAudio = $_POST["idiomaAudio"];
	$idiomaLegenda = $_POST["idiomaLegenda"];
	$fornecedorNome = $_POST["fornecedorNome"];
	$administradorEmail = $email;
	$descricao = $_POST["descricao"];
	$qtdJogadores = $_POST["qtdJogadores"];
	$sistemasOperacionais = $_POST["sistemasOperacionais"];
	$requisitosMinimos = $_POST["requisitosMinimos"];
	$requisitosRecomendados = $_POST["requisitosRecomendados"];
	$img[0] = $_FILES["img0"];
	$img[1] = $_FILES["img1"];
	$img[2] = $_FILES["img2"];
	$img[3] = $_FILES["img3"];
	$img[4] = $_FILES["img4"];
	
	$contErros = 0;
	$erro[$contErros] = 'Erros:<br>';
	
	//garantindo data de nascimento valida
	$dia = substr($dataLancamento, 0,2);
	$mes = substr($dataLancamento, 3,2);
	$ano = substr($dataLancamento, 6,4);
	if($dia < 0 || $dia > 31){
		$erro[$contErros] = 'Data inválida.';
		$contErros++;
	}
	else if($mes < 0 || $mes > 12){
		$erro[$contErros] = 'Data inválida.';
		$contErros++;
	}
	else if($ano < 0 || $ano > 2017){
		$erro[$contErros] = 'Data inválida.';
		$contErros++;
	}
	$dataLancamento = "'".$dia."/".$mes."/".$ano."'";

	
	for($i = 0;$i < count($img);$i++) {
		$nome_imagem[$i]='noimage.png';
		//testando se há arquivo
		if(!empty($img[$i]['name'])){
			//tamanho
			$tamanho = 3000000;
			//verifica se o arquivo é uma imagem
			if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img[$i]['type'])){
				$erro[$contErros] = 'Isso não é uma imagem.';
				$contErros++;
			}
			if($img[$i]['size']>$tamanho){
				$erro[$contErros] = 'A imagem tem que ter no máximo 3MB.';
				$contErros++;
			}
			//Se nao houver erro
			if($contErros == 0){
				//pega a extenção da imagem
				preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$img[$i]['name'], $ext);
				//gera nome da imagem
				$nome_imagem[$i] = time()."_".rand(1,50000).".".$ext[1];
				//caminho
				$caminho_imagem = "../Arquivos/FotosPerfil/".$nome_imagem[$i];
				//Faz upload
				move_uploaded_file($foto['tmp_name'], $caminho_imagem);
			}
		}
	}
	

	if($contErros == 0){
		//cria Jogo
		$jogo = new Jogo($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$idiomaAudio,$idiomaLegenda,$img,$descricao,$qtdJogadores,$sistemasOperacionais,$requisitosMinimos,$requisitosRecomendados,$fornecedorNome,$administradorEmail);
		//conecta
		$conexao = new Conexao("localhost","ADMNISTRADOR","12345","SteamFlix");
		$link = $conexao->conectar();

		$jogodao = new JogoDAO();
		$jogodao->cadastrar($jogo,$link);

		$conexao->fechar();
        //redireciono
        header("Location: ../index.php");
	}
	else{
		//houve algum erro
		foreach ($erro as $e) {
			echo $r."<br>";
		}
	}	
?>

