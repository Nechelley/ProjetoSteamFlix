 <?php
 	include_once("../Controller/verificarLogado.php");
	if($nivelAcesso != -1){//logado
		//redireciono
	    header("Location: ../index.php");
	}
	
	$ppb = "view";
	$titulo = "Cadastro Usuario";
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
		<div class="formulario">
		<h1 class="titulo">Cadastro</h1>
		<form action="../Controller/cadastrarUsuario.php" method="POST" enctype="multipart/form-data">
			Primeiro Nome: <input type="text" name="pNome" maxlength="20" required="true"> <br/>
			Segundo Nome: <input type="text" name="uNome" maxlength="20" required="true"> <br/>
			Email: <input type="text" name="email" maxlength="45" required="true"> <br/>
			Senha: <input type="password" name="senha" maxlength="100" required="true"> <br/>
			Data de Nascimento: <input type="text" pattern="\d{1,2}/\d{1,2}/\d{4}"  name="dataNascimento" placeholder="dd/mm/aaaa" required="true"> <br/>
			Foto de Perfil: <input type='file' name='img'/> <br/><br/>
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