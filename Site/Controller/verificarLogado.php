<?php
session_start();
if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
	$nivelAcesso=$_SESSION['nivelAcesso'];
}
else{
	$nivelAcesso=-1;//nao logado
}

?>