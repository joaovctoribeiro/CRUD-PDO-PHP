<?php 

	include_once("../Config/Database.php");

	if($_SERVER['REQUEST_METHOD'] === 'POST') {

		$productName = $_POST['productName'];
		$productDescription = $_POST['productDescription'];
		$productPrice = $_POST['productPrice'];

		if(!empty($productName) && !empty($productDescription) && !empty($productPrice)) {

			/**
			 * Se as variaveis não estiverem vazias, é realizado a inserção
			 * dos dados dentro do Banco de Dados.
			 * 
			 * If the variables are not empty, the data is inserted into the
			 * Database.
			 */

			$sql = "INSERT INTO products (product_name, product_description, product_price) VALUES (:productName, :productDescription, :productPrice)";
			$query = $pdo->prepare($sql);

			/**
			 * Ligando os parametros e fazendo relação entre a Variavel
			 * e o Parametro de valor da query de inserção.
			 * 
			 * Binding the parameters and making a relationship between the
			 * Variable and the Value Parameter of the insertion query.
			 */

			$query->bindParam(":productName", $productName);
			$query->bindParam(":productDescription", $productDescription);
			$query->bindParam(":productPrice", $productPrice);

			$query->execute();

			header('Location: ../');

		} else {
			
			/**
			 * Mensagem de erro.
			 * 
			 * Error message.
			 */

			print('É necessário preencher todos os campos corretamente.');

		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Adicione um produto</title>
</head>
<body>

	<form method="POST">

		<h1>Adicione um produto:</h1>
		
		<label>Nome do produto:</label>
		<input type="text" name="productName"><br>

		<label>Descrição do produto:</label>
		<input type="text" name="productDescription"><br>

		<label>Preço do produto:</label>
		<input type="number" name="productPrice"><br>

		<button>Adicionar produto</button>

	</form>

</body>
</html>