 <?php
	$ppb = "controller";
	$titulo = "Perfil Usuario";
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
		<h1 class="titulo">Perfil</h1>
		<div clas="formulario">
			<form class="formularioBotao" action="../Controller/alterarUsuario.php" method="post">
			<input type="submit" value="Alterar Dados">
			</form>
			<form class="formularioBotao"action="../Controller/deletarUsuario.php" method="post">
				<input type="submit" value="Deletar Perfil">
			</form>
		</div>		
		<form action="NADA.php" method="POST">
			Primeiro Nome: <input type="text" name="pNome" value="<?php echo $pNome;?>" readonly> <br/>
			Segundo Nome: <input type="text" name="uNome"  value="<?php echo $uNome;?>" readonly> <br/>
			Email: <input type="text" name="email" value="<?php echo $email;?>" readonly> <br/>
			Data de Nascimento: <input type="text" name="dataNascimento"  value="<?php echo $data;?>" readonly> <br/>
			Foto de Perfil: <img class="fotoPerfil"src="../Arquivos/FotosPerfil/<?php echo $img; ?>" alt="Foto perfil"> <br/><br/>
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