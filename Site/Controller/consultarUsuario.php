<?php
	include_once("verificarLogado.php");
	if($nivelAcesso == -1){//nao logado
		//redireciono
	    header("Location: ../index.php");
	}

	include("../Model/usuario.php");
	include("../Persist/conexao.php");
	include("../Persist/usuarioDAO.php");

	//conecta
	$conexao = new Conexao("localhost","USUARIO_COMUM","12345","SteamFlix");
	$link = $conexao->conectar();

	$usuariodao = new UsuarioDAO();
	$resultado = $usuariodao->consultar($email,$link);	
	while ($row = mysqli_fetch_assoc($resultado)) {
	    $pNome = $row['Pnome'];
	    $uNome = $row['Unome'];
	    $stilPoints = $row['StilPoints'];
	    $img = $row['ImagemPerfil'];
	    $dataNascimento = $row['DataNascimento'];
	}
	$conexao->fechar();
	//arrumando data
	$data = substr($dataNascimento,8,2)."/".substr($dataNascimento,5,2)."/".substr($dataNascimento,0,4);
	include("../View/telaPerfil.php");
?>