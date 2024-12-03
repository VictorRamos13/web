<?php
require_once('../modelo/clsProduto.php');

$produto = new clsProduto();

if (isset($_POST['btnExcluir']))
{
	$produto->setIdProduto( $_POST['btnExcluir']);
	if ($produto->exclui() == true)
		header('location:frmListaProduto.php');
		
	else
	{
		echo 'Problema ao apagar o registro no banco de dados. <br>
			<a href="frmListaProduto.php"> VOLTAR </a>';
	}
}
else #alterar
{
	$produto->setIdProduto($_POST['btnAlterar']);
	$produto->setNomeProduto($_POST['txtNomeProduto_' . $_POST['btnAlterar']]);
	$produto->setPrecoProduto($_POST['txtPrecoProduto_' . $_POST['btnAlterar']]);
	$produto->setFkIdCategoria($_POST['slcCategoria_' . $_POST['btnAlterar']]);
	if (isset($_FILES['txtFoto_' . $_POST['btnAlterar']])) {
		$produto->setFoto($_FILES['txtFoto_' . $_POST['btnAlterar']]);
	}
	if ($produto->salvar(false) == true)
		header('location:frmListaProduto.php');
	else
	{
		echo 'Problema ao alterar o registro no banco de dados. <br>
			  <a href="frmListaProduto.php"> VOLTAR </a>';
	}
}
?>
