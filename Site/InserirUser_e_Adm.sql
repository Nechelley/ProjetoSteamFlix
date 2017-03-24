<<<<<<< HEAD
#PROCEDURE QUE INSERE USUARIO COMUM
DELIMITER //
CREATE PROCEDURE INSERIR_USUARIO(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),StilPoints SMALLINT(3) UNSIGNED,
	FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,StilPoints,NOW(),FotoPerfil); 	
END //
DELIMITER ;


#PROCEDURE QUE INSERE ADMIN

DELIMITER //
CREATE PROCEDURE INSERIR_ADMIN(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),Salario SMALLINT(3) UNSIGNED,Cpf BIGINT(11),
	Root BOOLEAN,FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,NOW(),Salario,Cpf,Root,FotoPerfil); 	
END //
DELIMITER ;


#PROCEDURE QUE INSERE JOGO

DELIMITER //
CREATE PROCEDURE INSERIR_JOGO(
	CodigoJogo INT UNSIGNED,
	QtdVendida INT UNSIGNED,
	NotaUsuario TINYINT UNSIGNED,
	ClassificacaoEtaria TINYINT UNSIGNED,
	PrecoCusto FLOAT(5,2) UNSIGNED,
	PrecoVenda FLOAT(5,2) UNSIGNED,
	Genero ENUM('Acao', 'Comedia', 'Aventura', 'Romance', 'Drama', 'Terror', 'Suspense', 'Infantil', 'Outro'),
	Nome VARCHAR(45),
	DataLancamento VARCHAR(10),
	DataEntradaSistema DATE,
	IdiomaAudio VARCHAR(45),
	IdiomaLegenda VARCHAR(45),
	Descricao VARCHAR(500),
	QtdJogadores TINYINT,
	SistemasOperacionais SET('Windows', 'Linux', 'MacOS'),
	RequisitosMinimos VARCHAR(500),
	RequisitosRecomendados VARCHAR(500),
	FORNECEDOR_Nome VARCHAR(45),
	ADMINISTRADOR_Email VARCHAR(45))
BEGIN
	DECLARE dataLanc Date;
	SET dataLanc = date_format(str_to_date(DataLancamento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO JOGO
	 VALUES (
		CodigoJogo,
		QtdVendida,
		NotaUsuario,
		ClassificacaoEtaria,
		PrecoCusto,
		PrecoVenda,
		Genero,
		Nome,
		dataLanc,
		NOW(),
		IdiomaAudio,
		IdiomaLegenda,
		Descricao,
		QtdJogadores,
		SistemasOperacionais,
		RequisitosMinimos,
		RequisitosRecomendados,
		FORNECEDOR_Nome,
		ADMINISTRADOR_Email
		); 	
END //
=======
#PROCEDURE QUE INSERE USUARIO COMUM
DELIMITER //
CREATE PROCEDURE INSERIR_USUARIO(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),StilPoints SMALLINT(3) UNSIGNED,
	FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,StilPoints,NOW(),FotoPerfil); 	
END //
DELIMITER ;


#PROCEDURE QUE INSERE ADMIN

DELIMITER //
CREATE PROCEDURE INSERIR_ADMIN(Email VARCHAR(45),PNome VARCHAR(20),UNome VARCHAR(20),
	Senha VARCHAR(100), DataNascimento VARCHAR(10),Salario SMALLINT(3) UNSIGNED,Cpf BIGINT(11),
	Root BOOLEAN,FotoPerfil VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO USUARIO_COMUM
	 VALUES (Email,PNome,UNome, Senha, dataNasc,NOW(),Salario,Cpf,Root,FotoPerfil); 	
END //
DELIMITER ;


#PROCEDURE QUE INSERE JOGO

DELIMITER //
CREATE PROCEDURE INSERIR_JOGO(
	CodigoJogo INT UNSIGNED,
	QtdVendida INT UNSIGNED,
	NotaUsuario TINYINT UNSIGNED,
	ClassificacaoEtaria TINYINT UNSIGNED,
	PrecoCusto FLOAT(5,2) UNSIGNED,
	PrecoVenda FLOAT(5,2) UNSIGNED,
	Genero ENUM('Acao', 'Comedia', 'Aventura', 'Romance', 'Drama', 'Terror', 'Suspense', 'Infantil', 'Outro'),
	Nome VARCHAR(45),
	DataLancamento DATE,
	DataEntradaSistema DATE,
	IdiomaAudio VARCHAR(45),
	IdiomaLegenda VARCHAR(45),
	Descricao VARCHAR(500),
	QtdJogadores TINYINT,
	SistemasOperacionais SET('Windows', 'Linux', 'MacOS'),
	RequisitosMinimos VARCHAR(500),
	RequisitosRecomendados VARCHAR(500),
	FORNECEDOR_Nome VARCHAR(45),
	ADMINISTRADOR_Email VARCHAR(45))
BEGIN
	DECLARE dataLanc Date;
	SET dataLanc = date_format(str_to_date(DataLancamento,'%d/%m/%Y'),'%Y%m%d');
	INSERT INTO JOGO
	 VALUES (
		CodigoJogo,
		QtdVendida,
		NotaUsuario,
		ClassificacaoEtaria,
		PrecoCusto,
		PrecoVenda,
		Genero,
		Nome,
		dataLanc,
		NOW(),
		IdiomaAudio,
		IdiomaLegenda,
		Descricao,
		QtdJogadores,
		SistemasOperacionais,
		RequisitosMinimos,
		RequisitosRecomendados,
		FORNECEDOR_Nome,
		ADMINISTRADOR_Email
		); 	
END //
>>>>>>> 1d188b3a961f21bcd97ff7c274f3a217a0927451
DELIMITER ;