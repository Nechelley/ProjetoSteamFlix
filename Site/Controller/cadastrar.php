<?php	
	include("../Model/usuario.php");
	include("../Persist/conexao.php");
	include("../Persist/usuarioDAO.php");

	$email = $_POST["email"];
	$pNome = $_POST["pNome"];
	$uNome = $_POST["uNome"];
	$foto = $_FILES["img"];
	$senha = $_POST["senha"];
	$dataNascimento = $_POST["dataNascimento"];
	$stilPoints = 0;
	$comunidadesSeguidas = 'Nada...';
	$produtos = 'Nada...';
	
	$erro = '';
	$contErros = 0;

	if(strlen($email) < 0 || strlen($email) > 45){
		$erro .= '<br>Email inválido.';
		$contErros++;
	}
	if(strlen($pNome) < 0 || strlen($pNome) > 20){
		$erro .= '<br>Primeiro nome inválido.';
		$contErros++;
	}
	if(strlen($uNome) < 0 || strlen($uNome) > 20){
		$erro .= '<br>Sobrenome inválido.';
		$contErros++;
	}
	if(strlen($senha) < 0 || strlen($senha) > 100){
		$erro .= '<br>Senha inválido.';
		$contErros++;
	}
	//garantindo data de nascimento valida
	$dia = substr($dataNascimento, 0,2);
	$mes = substr($dataNascimento, 3,2);
	$ano = substr($dataNascimento, 6,4);
	if($dia < 0 || $dia > 31){
		$erro .= '<br>Data inválido.';
		$contErros++;
	}
	else if($mes < 0 || $mes > 12){
		$erro .= '<br>Data inválido.';
		$contErros++;
	}
	else if($ano < 0 || $ano > 2017){
		$erro .= '<br>Data inválido.';
		$contErros++;
	}
	$dataNascimento = "'".$dia."/".$mes."/".$ano."'";

	
	$nome_imagem='no-image.jpg';
	//testando se há arquivo
	if(!empty($foto['name'])){
		//tamanho
		$tamanho = 3000000;
		//verifica se o arquivo é uma imagem
		if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$foto['type'])){
			$erro .= '<br>Isso não é imagem.';
			$contErros++;
		}
		if($foto['size']>$tamanho){
			$erro .= '<br>A imagem tem q ter no máximo 3MB.';
			$contErros++;
		}
		//Se nao houver erro
		if($contErros == 0){
			//pega a extenção da imagem
			preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$foto['name'], $ext);
			//gera nome da imagem
			$nome_imagem = time()."_".rand(1,50000).".".$ext[1];
			$fotoPerfil = $nome_imagem;
			//caminho
			$caminho_imagem = "../Arquivos/FotosPerfil/".$nome_imagem;
			//Faz upload
			move_uploaded_file($foto['tmp_name'], $caminho_imagem);
		}
	}

	if($contErros == 0){
		$usuario = new Usuario($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$stilPoints,$comunidadesSeguidas,$produtos);
		$conexao = new Conexao("localhost","root","","SteamFlix");
		$link = $conexao->conectar();

		$usuariodao = new UsuarioDAO();
		$usuariodao->cadastrar($usuario,$link);
		echo "<h1>OK</h1>";
	}
	else{
		//houve algum erro
		echo $erro;
	}
	
	$conexao->fechar();
?>

