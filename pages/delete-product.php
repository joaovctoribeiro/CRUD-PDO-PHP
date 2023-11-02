<?php

	include '../Config/Database.php';

	/**
	* Pegando o Id na URL.
	* 
	* Collecting Id by URL.
	*/

	$idProduct = $_GET['id'];

	/**
	 * Query para Deletar um produto pelo Id, assim que deletado, retorna para a página index.
	 * 
	 * Query to Delete a product by Id, as soon as deleted, returns to the index page.
	 */

	$sql = "DELETE FROM products WHERE id_product = :idProduct";
	$query = $pdo->prepare($sql);
	$query->execute(array(':idProduct' => $idProduct));

	header('Location: ../');