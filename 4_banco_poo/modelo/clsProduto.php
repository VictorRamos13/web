<?php
require_once('../controle/clsConexao.php');
require_once('../controle/clsArquivo.php');
require_once('clsComum.php');

class clsProduto extends clsComum
{
	#VARIAVEIS PRIVADAS
	private $id_produto;
	private $nome_produto;
	private $preco_produto;
	private $fk_id_categoria;
	private $foto;
	
	#PROPRIEDADES
	#id_produto
	public function setIdProduto($valor)
	{
		$this->id_produto = $valor;
	}

	public function getIdProduto()
	{
		return $this->id_produto;
	}

	#nome_produto
	public function setNomeProduto($valor)
	{
		$this->nome_produto = $valor;
	}
	
	public function getNomeProduto()
	{
		return $this->nome_produto;
	}
	
	#preco_produto
	public function setPrecoProduto($valor)
	{
		$this->preco_produto = $valor;
	}
	
	public function getPrecoProduto()
	{
		return $this->preco_produto;
	}
	
	#fk_id_categoria
	public function setFkIdCategoria($valor)
	{
		$this->fk_id_categoria = $valor;
	}
	
	public function getFkIdCategoria()
	{
		return $this->fk_id_categoria;
	}
	
	#foto
	public function setFoto($valor)
	{
		$this->foto = $valor;
	}
	
	public function getFoto()
	{
		return $this->foto;
	}
	
	#METODOS
	public function existeProduto()
	{
		$conexao = new clsConexao();
		$sql = "SELECT * FROM tb_produto WHERE id_produto='" . $this->id_produto . "';";
		
		$resultado = false;
		if (mysqli_num_rows($conexao->executaSQL($sql)) >= 1)
			$resultado = true;
		
		return $resultado;
	}
	
	public function salvar($novoProduto = true)
	{
		#salva a foto
		$gravadorDeFoto = new clsArquivo();		
		$gravadorDeFoto->setNomeArquivo($this->nome_produto . '.jpg');
		$gravadorDeFoto->setDiretorio('../visao/imagens');
		$gravadorDeFoto->setArquivo($this->foto);
		$gravadorDeFoto->upload();
		
		if ($novoProduto == true)#salva
		{
			$sql = "INSERT INTO tb_produto(nome_produto, preco_produto, fk_id_categoria) 
				    VALUES ('".$this->nome_produto."','".$this->preco_produto."',
					".$this->fk_id_categoria.");";
		}
		else #alterar
		{
			$sql = "UPDATE tb_produto SET 
			        nome_produto='".$this->nome_produto."', 
					preco_produto='".$this->preco_produto."', 
					fk_id_categoria=".$this->fk_id_categoria." 
					WHERE id_produto=".$this->id_produto.";"; 
		}
		
		$conexao = new clsConexao();	
		return $conexao->executaSQL($sql);
	}
	
	public function pegaProdutos()
	{
		$conexao = new clsConexao();
		$sql = "SELECT * FROM tb_produto;";
		return $conexao->executaSQL($sql);
	}
	
	public function exclui()
	{
		if (!$this->id_produto) {
			return false;
		}
		#exclui foto
		$gravadorDeFoto = new clsArquivo();		
		$gravadorDeFoto->setNomeArquivo($this->id_produto . '.jpg');
		$gravadorDeFoto->setDiretorio('imagens');
		$gravadorDeFoto->excluiArquivo();
		
		#exclui dados
		$conexao = new clsConexao();
		$sql = "DELETE FROM tb_produto WHERE id_produto='" . $this->id_produto . "';";
		return $conexao->executaSQL($sql);
	}
}

?>
