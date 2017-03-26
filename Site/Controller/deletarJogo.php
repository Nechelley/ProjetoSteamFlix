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

	//conecta
	$conexao = new Conexao("localhost","ADMINISTRADOR","12345","SteamFlix");
	$link = $conexao->conectar();

	//busco no banco
	$jogodao = new JogoDAO();
	$resultado = $jogodao->deletar($codigo,$link);

	header("Location: consultarUsuario.php");
?>