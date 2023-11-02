<?php

	/**
	 * Configuração das credenciais do Banco de Dados.
	 * 
	 * Configuration of Database credentials.
	 */

	$db_host = 'localhost';
	$db_name = 'crud-project-php';
	$db_username = 'root';
	$db_pass = '';

	try {
		
		$pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_username, $db_pass);
		
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {

		echo $e->getMessage();

	}