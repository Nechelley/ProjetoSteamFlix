<?php 
class Conexao{
	private $servidor;
	private $user;
	private $password;
	private $bd;
	private $link;
	
	public function __construct($servidor,$user,$password,$bd){
		$this->servidor = $servidor;
		$this->user = $user;
		$this->password = $password;
		$this->bd = $bd;
	}

	function conectar(){
		if (!$this->link) {
    		$this->link = mysqli_connect($this->servidor, $this->user, $this->password, $this->bd);
			if (!$this->link) {
    			die('Não foi possível conectar: '.mysqli_error());
			}	
		}
		return $this->link;
	}	

	function fechar(){
		mysqli_close($this->link);
	}
}
	
 ?>