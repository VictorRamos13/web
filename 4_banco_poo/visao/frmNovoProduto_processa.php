<?php
require('../modelo/clsProduto.php');

$produto = new clsProduto();
$produto->setNomeProduto($_POST['txtNomeProduto']);
$produto->setPrecoProduto($_POST['txtPrecoProduto']);
$produto->setFkIdCategoria($_POST['slcCategoria']);
$produto->setFoto($_FILES['txtArquivo']);

if ($produto->existeProduto() == false)
	if ($produto->salvar() == true)
	{
		#header('location:lista_produto.php');
		echo 'Salvo!';
	}
	else
	{
		echo 'Problema ao inserir o registro no banco de dados <br>';
	}
else
{
	echo 'Esse produto já existe!';
}

echo '<a href="frmNovoProduto.php"> VOLTAR </a>';

?>
