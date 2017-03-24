<?php	
	include("../Model/usuario.php");
	include("../Persist/conexao.php");
	include("../Persist/usuarioDAO.php");		
	
	$conexao = new Conexao("localhost","root","","SteamFlix");
	$link = $conexao->conectar();

	$usuariodao = new UsuarioDAO();
	$resultado = $usuariodao->consultar($link);
	$cont = 0;	
	while ($row = mysqli_fetch_assoc($resultado)) {
	    $email[$cont] = $row['Email'];
		$pNome[$cont] = $row['Pnome'];
		$uNome[$cont] = $row['Unome'];
		$foto[$cont] = $row['ImagemPerfil'];
		$senha[$cont] = $row['Senha'];
		$dataNascimento[$cont] = $row['DataNascimento'];
		$stilPoints[$cont] = $row['StilPoints'];
		$cont++;
	}		
	include("../View/telaConsultaUsuario.php");
	$conexao->fechar();

?>

