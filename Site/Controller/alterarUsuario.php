<?php	
	include("../Model/usuario.php");
	include("../Persist/conexao.php");
	include("../Persist/usuarioDAO.php");

	$email = $_POST["email"];
	$pNome = $_POST["pNome"];
	$uNome = $_POST["uNome"];
	$senha = $_POST["senha"];

	$conexao = new Conexao("localhost","root","","SteamFlix");
	$link = $conexao->conectar();

	$usuariodao = new UsuarioDAO();
	$resultado = $usuariodao->consultarUm($email,$link);
	while ($row = mysqli_fetch_assoc($resultado)) {
		$foto = $row['ImagemPerfil'];
		$senha2 = $row['Senha'];
		$dataNascimento= $row['DataNascimento'];
		$stilPoints = $row['StilPoints'];
	}

	
	
	$erro = '';
	$contErros = 0;

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
	$data = "'".substr($dataNascimento,8,2)."/".substr($dataNascimento,5,2)."/".substr($dataNascimento,0,4)."'";
	if($contErros == 0){
		$usuario = new Usuario($email,$pNome,$uNome,$foto,$senha,$data,$stilPoints,"Nada...","Nada...");
		$usuariodao->alterar($usuario,$link);
		echo "<h1>OK</h1>";
	}
	else{
		//houve algum erro
		echo $erro;
	}
	
	$conexao->fechar();
?>

