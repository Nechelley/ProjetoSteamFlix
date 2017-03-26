 <?php
 	include_once("../Controller/verificarLogado.php");
	if($nivelAcesso < 1){//logado
		//redireciono
	    header("Location: ../index.php");
	}
	
	$ppb = "view";
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
		<h1 class="titulo">Cadastro de Jogo</h1>
		<div class="formulario">
		<form action="../Controller/cadastrarJogo.php" method="POST" enctype="multipart/form-data">
			Código do Jogo: <input type="text" name="codigoJogo" maxlength="20" required="true"> <br/>
			Classificacao Etária: <input type="text" name="classificaoEtaria" maxlength="20" required="true"> <br/>
			Preço de Custo: <input type="text" name="crecoCusto" maxlength="10" required="true"> <br/>
			Preço de Venda: <input type="text" name="precoVenda" maxlength="10" required="true"> <br/>
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
			Nome: <input type="text" name="nome" maxlength="20" required="true"> <br/>
			Data de Lançamento: <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}"  name="dataLancamento" placeholder="dd/mm/aaaa" required="true"> <br/>
			Idioma do Áudio: <input type="text" name="idiomaAudio" maxlength="20" required="true"> <br/>
			Idioma da Legenda: <input type="text" name="idiomaLegenda" maxlength="20" required="true"> <br/>
			Descrição: <input type="text" name="descricao" maxlength="500" required="true"> <br/>			
			Sistemas Operacionais: <input type="radio" name="Windows">Windows
			<input type="radio" name="Linux">Linux
			<input type="radio" name="MacOS">MacOS<br/>
			Requisitos Mínimos: <input type="text" name="requisitosMinimos" maxlength="500" required="true"> <br/>			
			Requisitos Recomendados: <input type="text" name="requisitosRecomendados" maxlength="500" required="true"> <br/>			
			Nome do Fornecedor: <input type="text" name="nomeFornecedor" maxlength="20" required="true"> <br/>
			Email do Fornecedor: <input type="text" name="email" maxlength="45"> <br/>
			Imagem do Jogo: <input type='file' name='img'/> <br/><br/>
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