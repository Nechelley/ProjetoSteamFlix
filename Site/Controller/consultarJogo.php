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
	$resultado = $jogodao->consultar($codigo,$link);

	$cont = 0;
	while ($row = mysqli_fetch_assoc($resultado)) {
	    $qtdVendida = $row['QtdVendida'];
		$notaUsuario = $row['NotaUsuario'];
		$classificacaoEtaria = $row['ClassificacaoEtaria'];
		$precoCusto = $row['PrecoCusto'];
		$precoVenda = $row['PrecoVenda'];
		$genero = $row['Genero'];
		$nome = $row['Nome'];
		$dataLancamento = $row['DataLancamento'];
		$dataEntradaSistema = $row['DataEntradaSistema'];
		$idiomaAudio = $row['IdiomaAudio'];
		$idiomaLegenda = $row['IdiomaLegenda'];

		$fornecedorNome = $row['FORNECEDOR_Nome'];

		$administradorEmail = $row['ADMINISTRADOR_Email'];

		$descricao = $row['Descricao'];
		$qtdJogadores = $row['QtdJogadores'];

		$so = $row['SistemasOperacionais'];

		$requisitosMinimos = $row['RequisitosMinimos'];
		$requisitosRecomendados = $row['RequisitosRecomendados'];
		$img[$cont] = $row['CaminhoImagem'];
		$cont++;
	}

	include_once("../View/telaListaJogo.php");