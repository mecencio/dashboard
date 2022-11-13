<?php 
	Include("conexion.php");

	$link = conectar();

	if (isset($_GET['id'])) {

		// Guardo el valor id que recibo por GET
		$id = $_GET['id'];

		// se recupera la información de la imagen
		$consulta="SELECT foto FROM items_menu WHERE id=$id";
	
		$resultado=mysqli_query($link,$consulta);
		$row = mysqli_fetch_array($resultado); 
	
		$foto = $row['foto'];
	
		// se imprime la imagen y se le avisa al navegador que lo que se está 
		// enviando no es texto, sino que es una imagen de un tipo en particular
		header("content-type: image/jpg"); 
		echo $foto; 
	
		mysqli_close($link); 
	} else {
		echo "Error!";
	};

?>