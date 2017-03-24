DELIMITER //
CREATE PROCEDURE ATT_USER(EmailN VARCHAR(45),PNomeN VARCHAR(20),UNomeN VARCHAR(20),
	SenhaN VARCHAR(100), DataNascimentoN VARCHAR(10),StilPointsN SMALLINT(3),FotoPerfilN VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimentoN,'%d/%m/%Y'),'%Y%m%d');
	UPDATE USUARIO_COMUM 
	SET Email = EmailN,
		PNome = PNomeN,
		UNome = UNomeN,
		Senha = SenhaN,
		DataNascimento = dataNasc,
		ImagemPerfil = FotoPerfilN 	
	WHERE PEmail = Email;	 
END //
DELIMITER ;




DELIMITER //
CREATE PROCEDURE ATT_USUARIO(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),Salario SMALLINT(3),Cpf BIGINT(11),Root BOOLEAN,
	FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,NOW(),Salario,Cpf,Root,FotoPerfil); 	
END //
DELIMITER ;