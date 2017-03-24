<<<<<<< HEAD
#CRIACAO PROCEDURA QUE ALTERA USUARIO COMUM

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

#CRIACAO PROCEDURE ALTERACAO ADMIN


DELIMITER //
CREATE PROCEDURE ATT_ADMINISTRADOR(EmailN VARCHAR(45),PNomeN VARCHAR(20),UNomeN VARCHAR(20),
	SenhaN VARCHAR(100), DataNascimentoN VARCHAR(10),SalarioN SMALLINT(3),CpfN BIGINT(11),RootN BOOLEAN,
	FotoPerfilN VARCHAR(100))
BEGIN
	DECLARE dataNasc Date;
	SET dataNasc = date_format(str_to_date(DataNascimento,'%d/%m/%Y'),'%Y%m%d');
	UPDATE USUARIO_COMUM 
	SET Email = EmailN,
		PNome = PNomeN,
		UNome = UNomeN,
		Senha = SenhaN,
		DataNascimento = dataNasc,
		ImagemPerfil = FotoPerfilN,
		Salario = SalarioN,
		Cpf = CpfN,
		Root = RootN,
		FotoPerfil = FotoPerfilN
	WHERE PEmail = Email; 	
END //
DELIMITER ;

#CRIACAO PROCEDURE ALTERACAO JOGO

DELIMITER //
CREATE PROCEDURE ATT_JOGO(
	CodigoJogoN INT UNSIGNED,
	QtdVendidaN INT UNSIGNED,
	NotaUsuarioN TINYINT UNSIGNED,
	ClassificacaoEtariaN TINYINT UNSIGNED,
	PrecoCustoN FLOAT(5,2) UNSIGNED,
	PrecoVendaN FLOAT(5,2) UNSIGNED,
	GeneroN ENUM('Acao', 'Comedia', 'Aventura', 'Romance', 'Drama', 'Terror', 'Suspense', 'Infantil', 'Outro'),
	NomeN VARCHAR(45),
	DataLancamentoN VARCHAR(10),
	IdiomaAudioN VARCHAR(45),
	IdiomaLegendaN VARCHAR(45),
	DescricaoN VARCHAR(500),
	QtdJogadoresN TINYINT,
	SistemasOperacionaisN SET('Windows', 'Linux', 'MacOS'),
	RequisitosMinimosN VARCHAR(500),
	RequisitosRecomendadosN VARCHAR(500),
	FORNECEDOR_NomeN VARCHAR(45),
	ADMINISTRADOR_EmailN VARCHAR(45))
BEGIN
	DECLARE dataLanc Date;
	SET dataLanc = date_format(str_to_date(DataLancamentoN,'%d/%m/%Y'),'%Y%m%d');
	UPDATE JOGO
	SET CodigoJogo = CodigoJogoN,
		QtdVendida = QtdVendidaN,
		NotaUsuario = NotaUsuarioN,
		ClassificacaoEtaria = ClassificacaoEtariaN,
		PrecoCusto = PrecoCustoN,
		PrecoVenda = PrecoVendaN,
		Genero = GeneroN,
		Nome = NomeN,
		DataLancamento = dataLanc,		
		IdiomaAudio = IdiomaAudioN,
		IdiomaLegenda = IdiomaLegendaN,
		Descricao = DescricaoN,
		QtdJogadores = QtdJogadoresN,
		SistemasOperacionais = SistemasOperacionaisN,
		RequisitosMinimos = RequisitosMinimosN,
		RequisitosRecomendados = RequisitosRecomendadosN,
		FORNECEDOR_Nome = FORNECEDOR_NomeN,
		ADMINISTRADOR_Email = ADMINISTRADOR_EmailN
	WHERE CodigoJogo = CodigoJogoN;
END //
=======
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
>>>>>>> 1d188b3a961f21bcd97ff7c274f3a217a0927451
DELIMITER ;