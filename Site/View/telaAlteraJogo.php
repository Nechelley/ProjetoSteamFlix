 <?php
 	include_once("../Controller/verificarLogado.php");
	if($nivelAcesso < 1){//logado
		//redireciono
	    header("Location: ../index.php");
	}
	
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
		<h1 class="titulo">Alterar Jogo</h1>
		<div class="formulario">
		<form action="../Controller/alterarJogo2.php" method="POST" enctype="multipart/form-data">
			Código do Jogo: <input type="text" name="codigo" maxlength="20" required="true" value="<?php echo $codigo;?>" readonly> <br/>
			Classificacao Etária: <input type="text" name="classificacaoEtaria" maxlength="20" required="true" value="<?php echo $classificacaoEtaria;?>" > <br/>
			Preço de Custo: <input type="text" name="precoCusto" maxlength="10" required="true" value="<?php echo $precoCusto;?>" > <br/>
			Preço de Venda: <input type="text" name="precoVenda" maxlength="10" required="true" value="<?php echo $precoVenda;?>" > <br/>
			Gênero:<select name="genero"  required="true" multiple>
				<option value="Acao">Ação</option>				
				<option value="Comedia">Comédia</option>
				<option value="Aventura">Aventura</option>
				<option value="Romance">Romance</option>
				<option value="Drama">Drama</option>
				<option value="Terror">Terror</option>
				<option value="Suspense">Suspense</option>
				<option value="Infantil">Infantil</option>
				<option value="Outro">Outro</option>				
			</select> <br/>
			Nome: <input type="text" name="nome" maxlength="20" required="true" value="<?php echo $nome;?>" > <br/>
			Data de Lançamento: <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}"  name="dataLancamento" placeholder="dd/mm/aaaa" required="true" value="<?php echo $dataLancamento;?>" > <br/>
			Idioma do Áudio: <input type="text" name="idiomaAudio" maxlength="20" required="true" value="<?php echo $idiomaAudio;?>" > <br/>
			Idioma da Legenda: <input type="text" name="idiomaLegenda" maxlength="20" required="true" value="<?php echo $idiomaLegenda;?>" > <br/>
			Descrição: <input type="text" name="descricao" maxlength="500" required="true" value="<?php echo $descricao;?>" > <br/>
			Qtd de Jogadores: <input type="text" name="qtdJogadores" maxlength="10" required="true" value="<?php echo $qtdJogadores;?>" > <br/>

			Sistemas Operacionais:
			<input type="checkbox" name="w" value="Windows">Windows
			<input type="checkbox" name="l" value="Linux">Linux
			<input type="checkbox" name="m" value="MacOS">MacOS<br/>

			Requisitos Mínimos: <input type="text" name="requisitosMinimos" maxlength="500" required="true" value="<?php echo $requisitosMinimos;?>" > <br/>			
			Requisitos Recomendados: <input type="text" name="requisitosRecomendados" maxlength="500" required="true" value="<?php echo $requisitosRecomendados;?>" > <br/>			
			Nome do Fornecedor: <input type="text" name="fornecedorNome" maxlength="20" required="true" value="<?php echo $fornecedorNome;?>" readonly> <br/>
			Email do Fornecedor: <input type="text" name="email" maxlength="45" value="<?php echo $administradorEmail;?>" readonly> <br/>
			<?php 
				for($position = 0; $position < 5; $position++){
					echo "Imagem".$position.": <input type='file' name='img".$position."'/> <br/>";
				}
			?>
			<br/>
			<input type="submit" value="Enviar">
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