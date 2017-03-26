<?php
	include_once("verificarLogado.php");
	if($nivelAcesso != -1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Model/usuario.php");
	include_once("../Persist/conexao.php");
	include_once("../Persist/usuarioDAO.php");

	$pNome = $_POST["pNome"];
	$uNome = $_POST["uNome"];
	$img = $_POST["img"];
	$senha = $_POST["senha"];
	$imgNova = $_FILES["imgNova"];
	$senhaNova = $_POST["senhaNova"];
	$dataNascimento = $_POST["dataNascimento"];
	$stilPoints = $_POST["stilPoints"];
	
	$contErros = 0;
	$erro[$contErros] = 'Erros:<br>';
	
	if(strlen($pNome) < 0 || strlen($pNome) > 20){
		$erro[$contErros] = 'Primeiro nome inválido.';
		$contErros++;
	}
	if(strlen($uNome) < 0 || strlen($uNome) > 20){
		$erro[$contErros] = 'Sobrenome inválido.';
		$contErros++;
	}

	//verificando senhas
	if(!empty($senhaNova)){
		if(strlen($senhaNova) < 0 || strlen($senhaNova) > 100){
			$erro[$contErros] = 'Nova senha inválida.';
			$contErros++;
		}
		else{
			$senha = $senhaNova;
		}
	}
	
	//garantindo data de nascimento valida
	$dia = substr($dataNascimento, 0,2);
	$mes = substr($dataNascimento, 3,2);
	$ano = substr($dataNascimento, 6,4);
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
	$dataNascimento = "'".$dia."/".$mes."/".$ano."'";

	
	$nome_imagem=$img;
	//testando se há arquivo
	if(!empty($imgNova['name'])){
		//tamanho
		$tamanho = 3000000;
		//verifica se o arquivo é uma imagem
		if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$imgNova['type'])){
			$erro[$contErros] = 'Isso não é uma imagem.';
			$contErros++;
		}
		if($imgNova['size']>$tamanho){
			$erro[$contErros] = 'A imagem tem que ter no máximo 3MB.';
			$contErros++;
		}
		//Se nao houver erro
		if($contErros == 0){
			//pega a extenção da imagem
			preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$imgNova['name'], $ext);
			//gera nome da imagem
			$nome_imagem = time()."_".rand(1,50000).".".$ext[1];
			//caminho
			$caminho_imagem = "../Arquivos/FotosPerfil/".$nome_imagem;
			//Faz upload
			move_uploaded_file($imgNova['tmp_name'], $caminho_imagem);
		}
	}

	if($contErros == 0){
		//cria o usuario
		$usuario = new Usuario($email,$pNome,$uNome,$nome_imagem,$senha,$dataNascimento,$stilPoints);
		//conecta
		$conexao = new Conexao("localhost","USUARIO_COMUM","12345","SteamFlix");
		$link = $conexao->conectar();

		//cria o dao e salva
		$usuariodao = new UsuarioDAO();
		$usuariodao->alterar($usuario,$link);
		$conexao->fechar();
        //redireciono
        header("Location: consultarUsuario.php");
	}
	else{
		//houve algum erro
		$quemChamou = "../View/telaAlteraPerfil.php";
		include_once("../View/telaFalha.php");
	}
?>

