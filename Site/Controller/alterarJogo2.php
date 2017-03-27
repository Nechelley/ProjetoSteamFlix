 <?php
	include_once("verificarLogado.php");
	if($nivelAcesso != 1){
		//redireciono
	    header("Location: ../index.php");
	}

	include_once("../Model/jogo.php");
	include_once("../Persist/conexao.php");
	include_once("../Persist/jogoDAO.php");
	include_once("../Model/fornecedor.php");
	include_once("../Persist/fornecedorDAO.php");

	$codigo = $_POST["codigo"];
	$qtdVendida = 0;
	$notaUsuario = 0;
	$classificacaoEtaria = $_POST["classificacaoEtaria"];
	$precoCusto = $_POST["precoCusto"];
	$precoVenda = $_POST["precoVenda"];
	$genero = $_POST["genero"];
	$nome = $_POST["nome"];
	$dataLancamento = $_POST["dataLancamento"];
	$idiomaAudio = $_POST["idiomaAudio"];
	$idiomaLegenda = $_POST["idiomaLegenda"];

	$fornecedorNome = $_POST["fornecedorNome"];

	$administradorEmail = $_POST["AdmEmail"];

	$descricao = $_POST["descricao"];
	$qtdJogadores = $_POST["qtdJogadores"];

	$so[0] = ( isset($_POST['w']) ) ? true : null;
	$so[1] = ( isset($_POST['l']) ) ? true : null;
	$so[2] = ( isset($_POST['m']) ) ? true : null;

	$requisitosMinimos = $_POST["requisitosMinimos"];
	$requisitosRecomendados = $_POST["requisitosRecomendados"];
	$img[0] = $_FILES["img0"];
	$img[1] = $_FILES["img1"];
	$img[2] = $_FILES["img2"];
	$img[3] = $_FILES["img3"];
	$img[4] = $_FILES["img4"];
	
	$contErros = 0;
	$erro[$contErros] = 'Erros:<br>';
	
	if(!(($so[0] || $so[1]) || $so[2])){
		$erro[$contErros] = 'Selecione um SO.';
		$contErros++;
	}
	//garantindo data de nascimento valida
	$dia = substr($dataLancamento, 0,2);
	$mes = substr($dataLancamento, 3,2);
	$ano = substr($dataLancamento, 6,4);
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
	$dataLancamento = "'".$dia."/".$mes."/".$ano."'";

	
	for($i = 0;$i < count($img);$i++) {
		$nome_imagem[$i]="noimage".$i.".png";
		//testando se há arquivo
		if(!empty($img[$i]['name'])){
			//tamanho
			$tamanho = 3000000;
			//verifica se o arquivo é uma imagem
			if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img[$i]['type'])){
				$erro[$contErros] = 'Isso não é uma imagem.';
				$contErros++;
			}
			if($img[$i]['size']>$tamanho){
				$erro[$contErros] = 'A imagem tem que ter no máximo 3MB.';
				$contErros++;
			}
			//Se nao houver erro
			if($contErros == 0){
				//pega a extenção da imagem
				preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$img[$i]['name'], $ext);
				//gera nome da imagem
				$nome_imagem[$i] = time()."_".rand(1,50000).".".$ext[1];
				//caminho
				$caminho_imagem = "../Arquivos/FotosPerfil/".$nome_imagem[$i];
				//Faz upload
				move_uploaded_file($img[$i]['tmp_name'], $caminho_imagem);
			}
		}
	}
	

	if($contErros == 0){
		//conecta
		$conexao = new Conexao("localhost","ADMINISTRADOR","12345","SteamFlix");
		$link = $conexao->conectar();

		//verifico se fornecedor existe
		$fornecedordao = new FornecedorDAO();
		$resultado = $fornecedordao->consultar($fornecedorNome,$link);

		while ($row = mysqli_fetch_assoc($resultado)) {
		    $nomeF = $row['Nome'];
		}

		if(!isset($_POST["fornecedorEmail"])){//se n passou email
			if(!isset($nomeF)){//significa q o adm achou q um fornecedor ja estava cadastrado
				$erro[$contErros] = 'Fornecedor ainda não cadastrado.';
				$contErros++;
			}
		}else{//se passou email
			if(!isset($nomeF)){//cadastro o fornecedor
				$fornecedor = new Fornecedor($fornecedorNome,$_POST["fornecedorEmail"]);
				$fornecedordao->cadastrar($fornecedor,$link);
			}
		}
		if($contErros == 0){
			//cria Jogo
			$jogo = new Jogo($codigo,$qtdVendida,$notaUsuario,$classificacaoEtaria,$precoCusto,$precoVenda,$genero,$nome,$dataLancamento,$idiomaAudio,$idiomaLegenda,$nome_imagem,$descricao,$qtdJogadores,$so,$requisitosMinimos,$requisitosRecomendados,$fornecedorNome,$administradorEmail);

			$jogodao = new JogoDAO();
			$jogodao->alterar($jogo,$link);

			$conexao->fechar();
	        //redireciono
	        header("Location: ../index.php");
        }
		else{
			//houve algum erro
			$quemChamou = "../View/telaAlteraJogo.php";
			include_once("../View/telaFalha.php");		
		}
	}
	else{
		//houve algum erro
		$quemChamou = "../View/telaBuscaJogoParaAlterar.php";
		include_once("../View/telaFalha.php");		
	}	
?>

