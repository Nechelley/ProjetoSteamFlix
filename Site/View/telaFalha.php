<?php 
	$ppb = "controller";
	$titulo = "Erro";
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
				<h1 class="erro"><?php foreach ($erro as $e) {echo $e."<br/>";}?></h1>
				<form action="<?php echo $quemChamou?>" method="POST" enctype="multipart/form-data">					
					<input type="submit" value="Voltar">
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