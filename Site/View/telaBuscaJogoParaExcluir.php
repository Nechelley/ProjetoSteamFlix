 <?php
 	include_once("../Controller/verificarLogado.php");
	if($nivelAcesso < 1){//logado
		//redireciono
	    header("Location: ../index.php");
	}
	
	$ppb = "view";
	$titulo = "Buscar Jogo";
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
		<h1 class="titulo">Buscar Jogo a ser Excluído</h1>
		<div class="formulario">
		<form action="../Controller/excluirJogo.php" method="POST" enctype="multipart/form-data">
			Código do Jogo: <input type="text" name="codigo" maxlength="20" required="true"> <br/>			
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