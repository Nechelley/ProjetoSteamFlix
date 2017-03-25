<?php
	include_once("verificarLogado.php");
	if($nivelAcesso != -1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Persist/conexao.php");
	include_once("../Persist/usuarioDAO.php");

	//conecta
	$conexao = new Conexao("localhost","USUARIO_COMUM","12345","SteamFlix");
	$link = $conexao->conectar();

	//cria o dao e deleto
	$usuariodao = new UsuarioDAO();
	$usuariodao->deletar($email,$link);

	//deslogo
	include_once("deslogarUsuario.php");