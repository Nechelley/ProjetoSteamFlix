 <?php
	$ppb = "controller";
	$titulo = "Perfil Altera Usuario";
	include_once("../View/Templates/header.php");
	$nav = "Perfil";
	include_once("../View/Templates/nav.php");
?>
<!-- Main -->
<div id="main-wrapper">
<div id="main" class="container">
<div class="row 200%">
<div class="12u">

<!-- Highlight -->
	<section class="box highlight">
		<div class="formulario">
		<form action="alterarUsuario2.php" method="POST" enctype="multipart/form-data">
			Primeiro Nome: <input type="text" name="pNome" value="<?php echo $pNome;?>" required> <br/>
			Segundo Nome: <input type="text" name="uNome"  value="<?php echo $uNome;?>" required> <br/>
			Data de Nascimento: <input type="text" name="dataNascimento"  value="<?php echo $data;?>" required> <br/>
			Nova Senha(opcional): <input type="password" name="senhaNova"> <br/>
			StilPoints: <input type="text" name="stilPoints"  value="<?php echo $stilPoints;?>" readonly> <br/>
			Nova Foto de Perfil(opcional): <input type="file" name='imgNova'/> <br/><br/>
			<input type="hidden" name="img" value="<?php echo $img;?>">
			<input type="hidden" name="senha" value="<?php echo $senha;?>">
			<input type="submit" value="Alterar">
		</form>
		</div>
	</section>

</div>
</div>
</div>
</div>

<?php 
	include_once("../View/Templates/footer.php");
?>