 <?php
 	include_once("../Controller/verificarLogado.php");
	if($nivelAcesso != -1){//logado
		//redireciono
	    header("Location: ../index.php");
	}
	include_once("../Controller/verificarLogado.php");
	$ppb = "view";
	$titulo = "Login";
	include_once("Templates/header.php");
	$nav = "Login";
	include_once("Templates/nav.php");
?>
<!-- Main -->
<div id="main-wrapper">
<div id="main" class="container">
<div class="row 200%">
<div class="12u">

	<!-- Highlight -->

		<section class="box highlight">		
		<div class="formulario">		
			<h1 class="titulo">Login</h1>	
			<form action="../Controller/logarUsuario.php" method="POST">
				Email: <input type="text" name="email" maxlength="45" required="true" autofocus="true"> <br/>
				Senha: <input type="password" name="senha" maxlength="100" required="true"> <br/>
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