<?php
	include_once("verificarLogado.php");
	if($nivelAcesso != -1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Model/usuario.php");
	include_once("../Persist/conexao.php");
	include_once("../Persist/usuarioDAO.php");

	$email = $_POST["email"];
	$pNome = $_POST["pNome"];
	$uNome = $_POST["uNome"];
	$foto = $_FILES["img"];
	$senha = $_POST["senha"];
	$dataNascimento = $_POST["dataNascimento"];
	$stilPoints = 0;
	
	$contErros = 0;
	$erro[$contErros] = 'Erros:<br>';
	

	if(strlen($email) < 0 || strlen($email) > 45){
		$erro[$contErros] = 'Email inválido.';
		$contErros++;
	}
	if(strlen($pNome) < 0 || strlen($pNome) > 20){
		$erro[$contErros] = 'Primeiro nome inválido.';
		$contErros++;
	}
	if(strlen($uNome) < 0 || strlen($uNome) > 20){
		$erro[$contErros] = 'Sobrenome inválido.';
		$contErros++;
	}
	if(strlen($senha) < 0 || strlen($senha) > 100){
		$erro[$contErros] = 'Senha inválida.';
		$contErros++;
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

	
	$nome_imagem='noimage.png';
	//testando se há arquivo
	if(!empty($foto['name'])){
		//tamanho
		$tamanho = 3000000;
		//verifica se o arquivo é uma imagem
		if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$foto['type'])){
			$erro[$contErros] = 'Isso não é uma imagem.';
			$contErros++;
		}
		if($foto['size']>$tamanho){
			$erro[$contErros] = 'A imagem tem que ter no máximo 3MB.';
			$contErros++;
		}
		//Se nao houver erro
		if($contErros == 0){
			//pega a extenção da imagem
			preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$foto['name'], $ext);
			//gera nome da imagem
			$nome_imagem = time()."_".rand(1,50000).".".$ext[1];
			//caminho
			$caminho_imagem = "../Arquivos/FotosPerfil/".$nome_imagem;
			//Faz upload
			move_uploaded_file($foto['tmp_name'], $caminho_imagem);
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
		$usuariodao->cadastrar($usuario,$link);

		$conexao->fechar();
		//seto session
		session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nivelAcesso'] = 0;        
        //redireciono
        header("Location: ../index.php");
	}
	else{
		//houve algum erro
		$quemChamou = "../View/telaCadastroUsuario.php";
		include_once("../View/telaFalha.php");		
	}		
?>

