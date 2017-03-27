USE STEAMFLIX;
DELIMITER //
CREATE PROCEDURE REMOVE_FORNECEDORES_INATIVOS()
BEGIN
	DECLARE done INT DEFAULT FALSE;
	DECLARE inativo varchar(45);
    DECLARE inativos CURSOR FOR
	SELECT FORNECEDOR.Nome FROM FORNECEDOR LEFT JOIN JOGO ON  FORNECEDOR.Nome = FORNECEDOR_Nome WHERE FORNECEDOR_Nome IS NULL;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	OPEN inativos;
	read_loop: LOOP
	FETCH inativos INTO inativo;
	IF done THEN
	LEAVE read_loop;
	END IF;
	DELETE FROM FORNECEDOR WHERE Nome = inativo;
	END LOOP;
	CLOSE inativos;
END//
DELIMITER ;