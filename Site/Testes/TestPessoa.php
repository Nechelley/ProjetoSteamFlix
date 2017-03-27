<?php 
	include_once("../Model/Pessoa.php");
	$pessoa = new Pessoa("diegosousa.st@gmail.com","Diego","Sousa","foto1.png","12345","17/08/1997");

	//testes do construtor
	echo "Teste Construtor<br/>";
	echo $pessoa->getEmail()."<br/>";
	if($pessoa->getEmail() == "diegosousa.st@gmail.com"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getPNome()."<br/>";
	if($pessoa->getPNome() == "Diego"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getUNome()."<br/>";
	if($pessoa->getUNome() == "Sousa"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getFotoPerfil()."<br/>";
	if($pessoa->getFotoPerfil() == "foto1.png"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getSenha()."<br/>";
	if($pessoa->getSenha() == "12345"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getDataNascimento()."<br/>";
	if($pessoa->getDataNascimento() == "17/08/1997"){
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
	if($pessoa->getEmail() == "emailNovo"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getPNome()."<br/>";
	if($pessoa->getPNome() == "novoPNome"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getUNome()."<br/>";
	if($pessoa->getUNome() == "novoUNome"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getFotoPerfil()."<br/>";
	if($pessoa->getFotoPerfil() == "novaFotoPerfil.png"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}	
	echo $pessoa->getSenha()."<br/>";
	if($pessoa->getSenha() == "novaSenha"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
	echo $pessoa->getDataNascimento()."<br/>";
	if($pessoa->getDataNascimento() == "novaDataNascimento"){
		echo "OK<br/>";
	}
	else{
		echo "Erro<br/>";
	}
?>