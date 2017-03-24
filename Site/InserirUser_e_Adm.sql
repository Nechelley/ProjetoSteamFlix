DELIMITER //
CREATE PROCEDURE INSERIR_USUARIO(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),StilPoints SMALLINT(3),FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,StilPoints,NOW(),FotoPerfil); 	
END //
DELIMITER ;




DELIMITER //
CREATE PROCEDURE INSERIR_ADMIN(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),Salario SMALLINT(3),Cpf BIGINT(11),Root BOOLEAN,
	FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,NOW(),Salario,Cpf,Root,FotoPerfil); 	
END //
DELIMITER ;