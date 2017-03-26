<?php
class FornecedorDAO{
	public function cadastrar($fornecedor,$link){
 		$query = "INSERT INTO FORNECEDOR VALUES('".$fornecedor->getNome()."','".$fornecedor->getEmail()."')"; 
		if(!mysqli_query($link, $query)) {
			die('Não foi possível salvarf: ' . mysqli_error($link));
		}
	}

	public function consultar($nome,$link){			
		$query = "SELECT * FROM FORNECEDOR WHERE Nome = '".$nome."';"; 
		$result = mysqli_query($link,$query);
		if (!$result) {
		    die("Não foi possível consultarf: ".mysqli_error($link));
		}					
		return $result;
	}
}

?>