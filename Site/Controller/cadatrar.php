<?php	
	include("../Model/usuario.php");
	include("../Persist/conexao.php");
	include("../Persist/usuarioDAO.php");

	$email = $_POST["email"];
	$pNome = $_POST["pNome"];
	$uNome = $_POST["uNome"];
	$fotoPerfil = $_POST["fotoPerfil"];
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
	$dataNascimento = '$dia/$mes/$ano';


	if($contErros == 0){
		$usuario = new Usuario($email,$pNome,$uNome,$fotoPerfil,$senha,$dataNascimento,$stilPoints,$comunidadesSeguidas,$produtos);
		$conexao = new Conexao("localhost","root","toyotaeenaruguto","SteamFlix");
		$link = $conexao->conectar();

		$usuariodao = new UsuarioDAO();
		$usuariodao->cadastrar($usuario,$link);
	}
	else{
		//houve algum erro
		echo $erro;
	}
	
	$conexao->fechar();
?>

