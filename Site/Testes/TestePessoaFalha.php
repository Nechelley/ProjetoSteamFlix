<?php 
	include_once("../Model/Pessoa.php");
	$pessoa = new Pessoa("diegosousa.st@gmail.com","Diego","Sousa","foto1.png","12345","17/08/1997");

	//testes do construtor
	echo "Teste Construtor<br/>";
	echo $pessoa->getEmail()."<br/>";
	if($pessoa->getEmail() == "diegosous.st@gmail.com"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getPNome()."<br/>";
	if($pessoa->getPNome() == "Dieg"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getUNome()."<br/>";
	if($pessoa->getUNome() == "Sous"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getFotoPerfil()."<br/>";
	if($pessoa->getFotoPerfil() == "foto.png"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getSenha()."<br/>";
	if($pessoa->getSenha() == "1234"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getDataNascimento()."<br/>";
	if($pessoa->getDataNascimento() == "17/08/199"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}


	//teste dos sets
	echo "Teste sets<br/>";
	$pessoa->setEmail("emailNovo");
	$pessoa->setPNome("novoPNome");
	$pessoa->setUNome("novoUNome");
	$pessoa->setFotoPerfil("novaFotoPerfil.png");
	$pessoa->setSenha("novaSenha");
	$pessoa->setDataNascimento("novaDataNascimento");
	echo $pessoa->getEmail()."<br/>";
	if($pessoa->getEmail() == "emailNov"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getPNome()."<br/>";
	if($pessoa->getPNome() == "novoPNom"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getUNome()."<br/>";
	if($pessoa->getUNome() == "novoUNom"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getFotoPerfil()."<br/>";
	if($pessoa->getFotoPerfil() == "novaFotoPerfi.png"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getSenha()."<br/>";
	if($pessoa->getSenha() == "novaSenh"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getDataNascimento()."<br/>";
	if($pessoa->getDataNascimento() == "novaDataNasciment"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
?>