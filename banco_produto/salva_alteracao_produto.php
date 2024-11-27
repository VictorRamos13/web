<?php
	//verifica a existencia do usuario
	session_start();
	if (!isset($_SESSION['login']))
	{
		header('location:index.php');
	}
	
	//-------------------------------------------------------------------
	//captura os dados que o usuario inseriu na pagina de login
	$codigo = $_POST['hddCodigo'];
	$nome = $_POST['txtNome'];
	$preco = $_POST['txtPreco'];
	$categoria = $_POST['slcCategoria'];
	$foto = $_FILES['txtArquivo'];
	
	//executando a conexao
    require('conexao.php');
	
	//executando insercao de usuario no banco
	$sql = "UPDATE tb_produto SET nome_produto='".$nome."',
								  preco='".$preco."',
								  fk_id_categoria=".$categoria."
								  WHERE id_produto=".$codigo.";";
								  
	move_uploaded_file($foto["tmp_name"], 'imagens/'.$nome.'.jpg');
	
	$resultado = mysqli_query($conexao, $sql);

	//avaliando o resultado
	if ($resultado == true)
	{
		header('location:lista_produto.php');
	}
	else
	{
		echo 'Problema ao alterar o registro no banco de dados <br>';
		echo 'O erro que aconteceu foi este: ' . mysqli_error($conexao);
		echo '<a href="menu.php"> VOLTAR </a>';
	}
?>