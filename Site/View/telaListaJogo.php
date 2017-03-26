 <?php	
	$ppb = "controller";
	$titulo = "Cadastro Jogo";
	include_once("Templates/header.php");
	$nav = "Home";
	include_once("Templates/nav.php");
?>
<!-- Main -->
<div id="main-wrapper">
<div id="main" class="container">
<div class="row 200%">
<div class="12u">

<!-- Highlight -->
	<section class="box highlight">
		<h1 class="titulo">Listar Jogo</h1>
		<div class="formulario">
		<form action="../Controller/cadastrarJogo.php" method="POST" enctype="multipart/form-data">
			Código do Jogo: <input type="text" name="codigo" maxlength="20" required="true" value="<?php echo $codigo;?>" readonly> <br/>
			Classificacao Etária: <input type="text" name="classificaoEtaria" maxlength="20" required="true" value="<?php echo $classificacaoEtaria;?>" readonly> <br/>
			Preço de Custo: <input type="text" name="precoCusto" maxlength="10" required="true" value="<?php echo $precoCusto;?>" readonly> <br/>
			Preço de Venda: <input type="text" name="precoVenda" maxlength="10" required="true" value="<?php echo $precoVenda;?>" readonly> <br/>
			Gênero: <input type="text" name="Genero" value="<?php echo $genero;?>" readonly> <br/>
			Nome: <input type="text" name="nome" maxlength="20" required="true" value="<?php echo $nome;?>" readonly> <br/>
			Data de Lançamento: <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}"  name="dataLancamento" placeholder="dd/mm/aaaa" required="true" value="<?php echo $dataLancamento;?>" readonly> <br/>
			Idioma do Áudio: <input type="text" name="idiomaAudio" maxlength="20" required="true" value="<?php echo $idiomaAudio;?>" readonly> <br/>
			Idioma da Legenda: <input type="text" name="idiomaLegenda" maxlength="20" required="true" value="<?php echo $idiomaLegenda;?>" readonly> <br/>
			Descrição: <input type="text" name="descricao" maxlength="500" required="true" value="<?php echo $descricao;?>" readonly> <br/>			
			Qtd de Jogadores: <input type="text" name="qtdJogadores" maxlength="10" required="true" value="<?php echo $qtdJogadores;?>" readonly> <br/>
		
			Sistemas Operacionais: <input type="text" name="SistemasOperacionais" value="<?php echo $so;?>" readonly> <br/>
			

			Requisitos Mínimos: <input type="text" name="requisitosMinimos" maxlength="500" required="true" value="<?php echo $requisitosMinimos;?>" readonly> <br/>			
			Requisitos Recomendados: <input type="text" name="requisitosRecomendados" maxlength="500" required="true" value="<?php echo $requisitosRecomendados;?>" readonly> <br/>			
			Nome do Fornecedor: <input type="text" name="fornecedorNome" maxlength="20" required="true" value="<?php echo $fornecedorNome;?>" readonly> <br/>
			Email do Fornecedor: <input type="text" name="email" maxlength="45" value="<?php echo $administradorEmail;?>" readonly> <br/>
			


			//exibir as imagens aqui
			Imagens: <img class="fotoPerfil" src="../Arquivos/FotosPerfil/<?php echo $img[0];?>" alt="Foto perfil"> <br/><br/>
			Imagens: <img class="fotoPerfil" src="../Arquivos/FotosPerfil/<?php echo $img[1];?>" alt="Foto perfil"> <br/><br/>	
			Imagens: <img class="fotoPerfil" src="../Arquivos/FotosPerfil/<?php echo $img[2];?>" alt="Foto perfil"> <br/><br/>	
			Imagens: <img class="fotoPerfil" src="../Arquivos/FotosPerfil/<?php echo $img[3];?>" alt="Foto perfil"> <br/><br/>	
			Imagens: <img class="fotoPerfil" src="../Arquivos/FotosPerfil/<?php echo $img[4];?>" alt="Foto perfil"> <br/><br/>		
		</form>
		</div>
	</section>

</div>
</div>
</div>
</div>

<?php 
	include_once("Templates/footer.php");
?>