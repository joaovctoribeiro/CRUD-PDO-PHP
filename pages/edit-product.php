<?php

	require '../Config/Database.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$idProduct = $_POST['id_product'];
		$productName = $_POST['productName'];
		$productDescription = $_POST['productDescription'];
		$productPrice = $_POST['productPrice'];

		if(!empty($productName) && !empty($productDescription) && !empty($productPrice)) {

			/**
			 * Se as variaveis não estiverem vazias, é realizado a edição
			 * dos dados dentro do Banco de Dados.
			 * 
			 * If the variables are not empty, the data is edited into the
			 * Database.
			 */

			$sql = "UPDATE products SET product_name = :productName, product_description = :productDescription, product_price = :productPrice WHERE id_product = :idProduct";
			$query = $pdo->prepare($sql);

			/**
			 * Ligando os parametros e fazendo relação entre a Variavel
			 * e o Parametro de valor da query de edição.
			 * 
			 * Binding the parameters and making a relationship between the
			 * Variable and the Value Parameter of the edit query.
			 */

			$query->bindParam(":idProduct", $idProduct);
			$query->bindParam(":productName", $productName);
			$query->bindParam(":productDescription", $productDescription);
			$query->bindParam(":productPrice", $productPrice);

			$query->execute();

			header('Location: ../');

		} else {
			
			print('É necessário preencher todos os campos corretamente.');

		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edtiar produto</title>
</head>
<body>

	<?php

		/**
		 * Pegando o Id na URL.
		 * 
		 * Collecting Id by URL.
		 */

		$idProduct = $_GET['id'];

		/**
		 * Query SQL para pegar os produtos pelo Id do Produto, enquanto existir dados dentro da Tabela Produto,
		 * eles são renderizados dentro dos Inputs.
		 * 
		 * SQL Query to get the products by the Product Id, as long as there is data inside the Product Table,
		 * it is rendered inside the Inputs.
		 */

		$sql = "SELECT * FROM products WHERE id_product = :idProduct";
		$query = $pdo->prepare($sql);
		$query->execute(array(':idProduct' => $idProduct));

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
			
			$productName = $row['product_name'];
			$productDescription = $row['product_description'];
			$productPrice = $row['product_price'];

		}

	?>

	<form method="POST">

		<h1>Editar um produto:</h1>
		
		<label>Nome do produto:</label>
		<input type="text" name="productName" value="<?php echo $productName; ?>"><br>

		<label>Descrição do produto:</label>
		<input type="text" name="productDescription" value="<?php echo $productDescription; ?>"><br>

		<label>Preço do produto:</label>
		<input type="number" name="productPrice" value="<?php echo $productPrice; ?>"><br>

		<td><input type="hidden" name="id_product" value=<?php echo $_GET['id'];?>></td>

		<button>Editar produto</button>

	</form>

</body>
</html>