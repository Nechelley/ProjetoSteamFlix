<?php
	include_once("verificarLogado.php");
	if($nivelAcesso != -1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Persist/conexao.php");
	include_once("../Persist/usuarioDAO.php");
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	$contErros = 0;
	$erro[$contErros] = 'Erros:<br>';
	

	if(strlen($email) < 0 || strlen($email) > 45){
		$erro[$contErros] = 'Email inválido.';
		$contErros++;
	}
	if(strlen($senha) < 0 || strlen($senha) > 100){
		$erro[$contErros] = 'Senha inválida.';
		$contErros++;
	}

	
	//conecta
	$conexao = new Conexao("localhost","root","","SteamFlix");
	$link = $conexao->conectar();


	//leio do bd
	$usuariodao = new UsuarioDAO();
	$resultado = $usuariodao->consultar($email,$link);

	while ($row = mysqli_fetch_assoc($resultado)) {
		$senhaO = $row['Senha'];
	}

	$conexao->fechar();

	if($senha != $senhaO){
		$erro[$contErros] = 'Email ou Senha incorretos.';
		$contErros++;
	}

	if($contErros != 0){
		//seto session
		session_start();
	    $_SESSION['email'] = $email;
	    $_SESSION['nivelAcesso'] = 0;

	    //redireciono
	    header("Location: ../index.php");
	}
	
?>